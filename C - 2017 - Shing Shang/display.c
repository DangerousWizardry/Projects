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

//Vide le terminal courant
void clearboard(){
	printf("\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n");
}
//Affiche le logo
void displaylogo(){
	printf("------------------------------------------------------------------------------\n");
	printf("  ____    _       _                     ____    _                             \n");
	printf(" / ___|  | |__   (_)  _ __     __ _    / ___|  | |__     __ _   _ __     __ _ \n");
	printf(" \\___ \\  | '_ \\  | | | '_ \\   / _` |   \\___ \\  | '_ \\   / _` | | '_ \\   / _` |\n");
	printf("  ___) | | | | | | | | | | | | (_| |    ___) | | | | | | (_| | | | | | | (_| |\n");
	printf(" |____/  |_| |_| |_| |_| |_|  \\__, |   |____/  |_| |_|  \\__,_| |_| |_|  \\__, |\n");
	printf("                              |___/                                     |___/ \n");
	printf("------------------------------------------------------------------------------\n");
	printf("\n\n");
}
//Affiche le message courant, si aucun paramètre n'est passé, affiche le n° de joueur
void displaycurrent(int joueur,char msg[]) {
	if (msg[0] != '#') {
		printf("%s\n",msg);
	}
	else{
		printf("                          C'est à Joueur %d de jouer                          \n", joueur);
	}
	printf("\n");
}
//Affiche le footer
void displayfooter(){
	printf("\n& : quitter |  ←↕→ : se déplacer  |  Entrée (↵) : sélectionner une case  \n");
}
//Affiche la confirmation
void displayconf(){
	printf("\nq : quitter sans sauvegarder |  w : sauvegarder et quitter | ! : annuler \n");
}
//Affiche le menu principal (2 type : avec ou sans sauvegarde existante)
void displayintro(int type) {
	printf("------------------------------------------------------------------------------\n");
	printf("  ____    _       _                     ____    _                             \n");
	printf(" / ___|  | |__   (_)  _ __     __ _    / ___|  | |__     __ _   _ __     __ _ \n");
	printf(" \\___ \\  | '_ \\  | | | '_ \\   / _` |   \\___ \\  | '_ \\   / _` | | '_ \\   / _` |\n");
	printf("  ___) | | | | | | | | | | | | (_| |    ___) | | | | | | (_| | | | | | | (_| |\n");
	printf(" |____/  |_| |_| |_| |_| |_|  \\__, |   |____/  |_| |_|  \\__,_| |_| |_|  \\__, |\n");
	printf("                              |___/                                     |___/ \n");
	printf("______________________________________________________________________________\n");
	printf("\n\n");
	printf("                          DUVAL Lucas - MEURDRAC Téo                          \n");
	printf("                       2017 - Université Caen Normandie                       \n");
	printf("\n\n\n\n\n\n");
	if (type) {
		printf("              ──────────────────────────────────────────────                  \n");
		printf("             Press Enter to Continue | Press W to load a game                 \n");
		printf("              ──────────────────────────────────────────────                  \n");
	}
	else{
		printf("                         ─────────────────────────                            \n");
		printf("                          Press Enter to Continue                             \n");
		printf("                         ─────────────────────────                            \n");
	}
	printf("\n\n");
}

void displayvictory(int player) {
	printf("------------------------------------------------------------------------------\n");
	printf("  ____    _       _                     ____    _                             \n");
	printf(" / ___|  | |__   (_)  _ __     __ _    / ___|  | |__     __ _   _ __     __ _ \n");
	printf(" \\___ \\  | '_ \\  | | | '_ \\   / _` |   \\___ \\  | '_ \\   / _` | | '_ \\   / _` |\n");
	printf("  ___) | | | | | | | | | | | | (_| |    ___) | | | | | | (_| | | | | | | (_| |\n");
	printf(" |____/  |_| |_| |_| |_| |_|  \\__, |   |____/  |_| |_|  \\__,_| |_| |_|  \\__, |\n");
	printf("                              |___/                                     |___/ \n");
	printf("______________________________________________________________________________\n");
	printf("\n\n");
	printf("                              Fin de la partie                                \n");
	printf("                               Victoire de J%d                                \n",player);
	printf("\n\n\n");
	printf("                             Merci d'avoir joué                               \n");
	printf("               Appuyer sur n'importe quel touche pour terminer                \n");
	printf("                                                                              \n");
}

//Affiche le caractère correspondant au type et à l'équipe transmise
void affichecase(int team, int type,int colored){
	char * tabaff[3][5];
	tabaff[0][0]="·";
	tabaff[0][1]="▒";

	tabaff[1][1]="◇";
	tabaff[1][2]="△";
	tabaff[1][3]="○";
	tabaff[1][4]="П";

	tabaff[2][1]="◆";
	tabaff[2][2]="▲";
	tabaff[2][3]="●";
	tabaff[2][4]="П";
	switch (colored) {
		case 2 :
		printf("\x1b[31m%s\x1b[0m ",tabaff[team][type]);
		break;
		case 1 :
		printf("\x1b[33m%s\x1b[0m ",tabaff[team][type]);
		break;
		default:
		printf("%s ",tabaff[team][type]);
		break;
	}
}
