#include <stdio.h>
#include <stdlib.h>
#include <termios.h>
#include <sys/stat.h>
#include <sys/types.h>
#include <unistd.h>
#include <string.h>
#include <dirent.h>
#include <string.h>
#include <errno.h>
#include "shingshang.h"

//Retester la sauvegarde si ficheir existe/ oui / non / affichage à l'intro

int main(){
	int g;
	int val = 0;
	int isplaying = 1;
	int brek = 0;
	int win = 0;
	char * msg = " ";
	static struct termios oldt, newt;
	coord movememory[20];
	coord coordselect,focused,locked;
	int countmemory = 0;
	int allowAllMove = 0;
	int mustBeTheSameBushi = 0;
	int cptdrag[2];
	cptdrag[1]=2;
	cptdrag[2]=2;
	/*tcgetattr récupère les paramètres du terminal courant
	le paramètre STDIN_FILENO permet de récupérer la valeur du paramètre stdin responsable de la gestion des envois des inputs au processus courant
	il stocke la valeur de ces paramètres dans la structure oldt*/
	tcgetattr( STDIN_FILENO, &oldt);
	/*On copie oldt dans newt pour pouvoir modifier le paramètre stdin tout en conservant l'ancien pour pouvoir le rétablir plus tard*/
	newt = oldt;

	/*On ajoute le flag ICANON afin de passer le terminal en mode canonique, cela permet de gérer chaque charactère indépendament et plus ligne par ligne comme en mode non canonique*/
	newt.c_lflag &= ~(ICANON);

	/*On insère le paramètre (flag) nouvellement défini sur le terminal
	TCSANOW fait en sorte que ces modifications soit immédiates */
	tcsetattr( STDIN_FILENO, TCSANOW, &newt);

	//Initialisation du tableau de pointeurs
	pion * plateau[10][10];
	//Initialisation du tableau de tmsgype de cases
	pion * tcase = (pion *) malloc(9*sizeof(coord));
	do {
		clearboard();
		//On vérifie qu'il existe une sauvegarde si oui, affichage du menu 1
		if (access("save/data.tl", F_OK) != -1) {
			displayintro(1);
			g = getchar();
			if (g == 'W' || g == 'w') {
				val = 1;
			}
			else if (g == '\n') {
				val = 1;
			}
		}
		//Sinon affichage du menu 0
		else{
			displayintro(0);
			g = getchar();
			if (g == '\n') {
				val = 1;
			}
		}
	}
	while(val != 1);
	//Si chargement de la partie
	if (g == 'W' || g == 'w') {
		loadtcase(tcase);
		if (!loadsave(plateau,tcase,&isplaying)) {
			//Si le fichier de sauvegarde contient une erreur ou est illisible
			generetable(plateau,tcase);
			msg = "        Partie introuvable ! Une nouvelle partie a été générée           ";
		}
	}
	//Sinon création d'une nouvelle partie
	else if (g == '\n') {
		loadtcase(tcase);
		generetable(plateau,tcase);
	}

	clearboard();

	//On initialise les variables de sélections de pion
	coordselect.x = -1;
	coordselect.y = -1;

	focused.x = 0;
	focused.y = 0;

	affichageplateau(plateau,focused,coordselect,isplaying,msg);

	while(brek != 1 && win == 0 && (g=getchar())){

		clearboard();
		//Si l'input commence par le méta charactères "\033" lance le système de gestion des flèches pour le déplacement
		if (g == '\033') {
			arrowtocoord(&focused);
			win = affichageplateau(plateau,focused,coordselect,isplaying,msg);
		}
		else if(g=='\n'){
			//Si l'input est la touche entrée, test si la sélection est valide
			//On vérifie si l'utilisateur a déjà selectionné un pion, si oui, c'est qu'il essaie d'effectuer un déplacement, on vérifie également qu'il essaie de se déplacer sur une case valide (vide ou un portail)
			if (coordselect.x != -1 && coordselect.y != -1 && (plateau[focused.x][focused.y] == NULL || plateau[focused.x][focused.y]->type == 4)) {

				allowAllMove = 1;

				//On vérifie si le pion n'a pas déjà effectué un mouvement dans le tour, si oui, on lui attribue le flag allowAllMove à 0
				//Ses mouvements autorisés seront seulement le saut
				for (int i = 0; i < countmemory; i++) {
					if (movememory[i].x == coordselect.x && movememory[i].y == coordselect.y) {
						allowAllMove--;
					}
				}
				//On transmet la requête de déplacement et stocke le résultat dans val
				if ((coordselect.x == locked.x && coordselect.y == locked.y) || mustBeTheSameBushi == 0) {
					if (allowAllMove) {
						val = requestmove(plateau,coordselect,focused,isplaying,0);
					}
					else{
						val = requestmove(plateau,coordselect,focused,isplaying,1);
					}
				}
				else{
					val = -1;
				}
				//Si val = 1 c'est un déplacement simple, on change le tour et réinitialise les coordonnées selectionnées et les coordonnées des pions à déplacements restreints
				if (val == 1) {
					nextplayer(&isplaying);
					clearcoordtable(movememory,countmemory);
					countmemory = 0;
					mustBeTheSameBushi = 0;
					msg = "#";
					coordselect.x = -1;
					coordselect.y = -1;
					locked.x = -1;
					locked.y = -1;
				}
				else if(val == 2 || val == 9){
					//Si val = 2, c'est un saut, on demande si le joueur veux faire un autre déplacement
					msg = "                Voulez-vous continuer a jouer ? (O/N)                    ";
					while(g != 'o' && g != 'O' && g != 'n' && g != 'N'){
						clearboard();
						win = affichageplateau(plateau,focused,coordselect,isplaying,msg);
						g = getchar();
					}
					//Si non, on termine le tour comme un déplacement simple
					if (g == 'n' || g == 'N') {
						nextplayer(&isplaying);
						clearcoordtable(movememory,countmemory);
						countmemory = 0;
						coordselect.x = -1;
						coordselect.y = -1;
						locked.x = -1;
						locked.y = -1;
						msg = "#";
						mustBeTheSameBushi = 0;
					}
					else{
						//Si oui, on enregistre l'endroit ou se trouve le pion déplacé afin de restreindre ses mouvements et on réinitialise les coordonnées selectionnées
						msg = "#";
						movememory[countmemory] = focused;
						countmemory++;
						if (val == 2) {
							mustBeTheSameBushi = 1;
							locked = focused;
						}
						else if (val == 9) {
							mustBeTheSameBushi = 0;
							locked.x = -1;
							locked.y = -1;
						}
						coordselect.x = -1;
						coordselect.y = -1;
					}
				}
				else if (val == 3) {
					//Si val = 3, un dragon du joueur 1 se trouve sur un portail du joueur 2
					win = 1;
				}
				else if (val == 4) {
					//Si val = 4, un dragon du joueur 2 se trouve sur un portail du joueur 1
					win = 2;
				}
				else if (val <=0) {
					//Si val <= 0, le déplacement est impossible
					if (mustBeTheSameBushi) {
						msg = "     Vous ne pouvez pas faire ça !  Voulez-vous essayer autre chose ? (O/N)     ";
						while(g != 'o' && g != 'O' && g != 'n' && g != 'N'){
							clearboard();
							win = affichageplateau(plateau,focused,coordselect,isplaying,msg);
							g = getchar();
						}
						//Si non, on termine le tour comme un déplacement simple
						if (g == 'n' || g == 'N') {
							nextplayer(&isplaying);
							clearcoordtable(movememory,countmemory);
							countmemory = 0;
							coordselect.x = -1;
							coordselect.y = -1;
							locked.x = -1;
							locked.y = -1;
							msg = "#";
							mustBeTheSameBushi = 0;
						}
						else{
							msg = "            Vous pouvez seulement déplacer le bushi en surbrillance             ";
							coordselect = locked;
						}
					}
					else{
						msg = "                          Déplacement impossible !                              ";
						coordselect.x = -1;
						coordselect.y = -1;
					}
				}
			}
			else{
				//Si aucune case n'était selectionée alors on essaie de selectionner la case courante
				selectmanager(plateau,&focused,&coordselect,msg,isplaying);
				affichageplateau(plateau,focused,coordselect,isplaying,msg);
			}
			affichageplateau(plateau,focused,coordselect,isplaying,msg);
		}
		else if (g == '&') {
			//Si la touche pressée est &
			//Affichage du menu
			brek = 1;
			g = standbymenu();
		}
		else{
			//Si la touche entrée au clavier n'est pas utile au jeu, on rafraichis juste le plateau
			affichageplateau(plateau,focused,coordselect,isplaying,msg);
		}
		//Si sauvegarde
		if (g == 'w' && brek == 1) {
			//On regarde si il existe déjà une sauvegarde
			if (access("save/data.tl", F_OK) != -1) {
				//Si oui, on demande si on souhaite l'écraser
				erasesaveask(plateau,isplaying);
			}
			else{
				save(plateau,isplaying);
			}
		}
		else if (g == '!' && brek == 1)
		{
			//Si retour au jeu
			brek = 0;
			affichageplateau(plateau,focused,coordselect,isplaying,msg);
		}
	}
	if (win!=0) {
		clearboard();
		displayvictory(win);
		if (getchar()) {
			clearboard();
			clearboard();
		}
	}
	else{
		clearboard();
		clearboard();
	}
	/*Avant de sortir du programme, on remets le terminal en mode non canonique*/
	tcsetattr( STDIN_FILENO, TCSANOW, &oldt);
	//On libère la mémoire utilisée
	free(tcase);

	return 1;
}
