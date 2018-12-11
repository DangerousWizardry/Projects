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

/*
La fonction encryptdata lit le plateau et retourne une chaine de caractères attribuant un caractère par type de pion/case rencontrée

*/
void encryptdata(pion * plateau[][10], int isplaying, char str[]){
	str[0] = isplaying;
	int inc = 1;
	for (int i = 0; i < 10; i++) {
		for (int j = 0; j < 10; j++) {
			if (plateau[j][i] != NULL) {
				switch (plateau[j][i]->team) {
					case 1:
					switch (plateau[j][i]->type) {
						case 1:
						str[inc] = 'A';
						break;
						case 2:
						str[inc] = 'B';
						break;
						case 3:
						str[inc] = 'C';
						break;
						case 4:
						str[inc] = 'D';
						break;
					}
					break;
					case 2:
					switch (plateau[j][i]->type) {
						case 1:
						str[inc] = 'E';
						break;
						case 2:
						str[inc] = 'F';
						break;
						case 3:
						str[inc] = 'G';
						break;
						case 4:
						str[inc] = 'H';
						break;
					}
					break;
					default :
					str[inc] = 'M';
					break;
				}
			}
			else{
				str[inc] = 'V';
			}
			inc++;
		}
	}
}
/*La fonction save écrit la chaine de caractère obtenue par encryptdata dans un fichier.
Elle y ajoute le numéro du joueur du tour courant
*/
void save(pion * plateau[][10],int isplaying){
	FILE * datafile;
	char str[100];
	char path[1024];
	char g;
	if (mkdir("save", 0777)==0 || errno == EEXIST) {
		getcwd(path,sizeof(path));
		datafile = fopen("save/data.tl", "w");
			if (datafile != NULL) {
				encryptdata(plateau,isplaying,str);
				fwrite(str, 1, strlen(str), datafile);
				fclose(datafile);
			}
			else{
				printf("Impossible de sauvegarder (CAN'T SAVE : %s ERROR)\n",strerror(errno));
				while (g != '\n') {
					printf("Appuyer sur Entrée pour quitter\n");
					g = getchar();
				}
			}
	}
	else{
		printf("Impossible de sauvegarder la partie (CAN'T SAVE : %s ERROR)\n",strerror(errno));
		while (g != '\n') {
			printf("Appuyer sur Entrée pour quitter\n");
			g = getchar();
		}
	}
}
/*
La fonction loadsave lis le fichier save si il existe, dans le cas contraire, elle retourne 0
loadsave utilise le premier caractère du fichier save.tl pour connaitre le numéro du joueur qui doit jouer et le reste des caractères pour 
restituer le plateau précédemment enregistré.
*/
int loadsave(pion * plateau[][10], pion * tcase,int * isplaying){
	FILE * datafile;
	char strget[100];
	int inc = 1;
	char path[1024];
	int ret = 0;
	getcwd(path,sizeof(path));
	if (access(strcat(path, "save/data.tl"), F_OK)) {
		datafile = fopen("save/data.tl", "r");
		fread(strget, 1, 101, datafile);
		*isplaying = strget[0];
		for (int i = 0; i < 10; i++) {
			for (int j = 0; j < 10; j++) {
				printf("%c", strget[inc]);
				switch (strget[inc]) {
					case 'A' :
					plateau[j][i] = tcase+1;
					break;
					case 'B' :
					plateau[j][i] = tcase+2;
					break;
					case 'C' :
					plateau[j][i] = tcase+3;
					break;
					case 'D' :
					plateau[j][i] = tcase+4;
					break;
					case 'E' :
					plateau[j][i] = tcase+5;
					break;
					case 'F' :
					plateau[j][i] = tcase+6;
					break;
					case 'G' :
					plateau[j][i] = tcase+7;
					break;
					case 'H' :
					plateau[j][i] = tcase+8;
					break;
					case 'M' :
					plateau[j][i] = tcase;
					break;
					case 'V' :
					plateau[j][i] = NULL;
					break;
				}
				inc++;
			}
		}
		ret++;
	}
	return ret;
}
