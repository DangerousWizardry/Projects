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

void loadtcase(pion * tcase){
	//Case Inaccessible
	(tcase)->type = 1;
	(tcase)->team = 0;
	//Pions Blancs et portail blanc
	(tcase+1)->type = 1;
	(tcase+1)->team = 1;

	(tcase+2)->type = 2;
	(tcase+2)->team = 1;

	(tcase+3)->type = 3;
	(tcase+3)->team = 1;

	(tcase+4)->type = 4;
	(tcase+4)->team = 1;
	//Pions Noirs et portail noir
	(tcase+5)->type = 1;
	(tcase+5)->team = 2;

	(tcase+6)->type = 2;
	(tcase+6)->team = 2;

	(tcase+7)->type = 3;
	(tcase+7)->team = 2;

	(tcase+8)->type = 4;
	(tcase+8)->team = 2;
}
void generetable(pion * plateau[][10], pion * tcase){
	//Initialisation du tableau à la valeur NULL
	for (int i = 0; i < 10; i++) {
		for (int j = 0; j < 10; j++) {
			plateau[i][j] = NULL;
		}
	}
	//Portails Blancs
	plateau[4][1] = tcase+4;
	plateau[5][1] = tcase+4;
	//Portails Noirs
	plateau[4][8] = tcase+8;
	plateau[5][8] = tcase+8;

	//Triangle 1
	for (int i = 0; i < 4; i++) {
		for (int j = 0; j < 4-i; j++) {
			if (j==0) {
				plateau[j][i] = tcase;
			}
			else if((3-j)==i){
				plateau[j][i] = tcase+1;
			}
			else if (i==(j-1)) {
				plateau[j][i] = tcase+3;
			}
			else{
				plateau[j][i] = tcase+2;
			}
		}
	}
	//Triangle 2
	for (int i = 0; i < 4; i++) {
		for (int j = 9; j > 5+i; j--) {
			if (j==9) {
				plateau[j][i] = tcase;
			}
			else if(i==(j-6)){
				plateau[j][i] = tcase+1;
			}
			else if (i==(j-7)) {
				plateau[j][i] = tcase+2;
			}
			else{
				plateau[j][i] = tcase+3;
			}
		}
	}
	//Triangle 3
	for (int i = 6; i < 10; i++) {
		for (int j = 0; j < i-5; j++) {
			if (j==0) {
				plateau[j][i] = tcase;
			}
			else if((i-6)==j){
				plateau[j][i] = tcase+5;
			}
			else if ((i-7)==j) {
				plateau[j][i] = tcase+6;
			}
			else{
				plateau[j][i] = tcase+7;
			}
		}
	}
	//Triangle 4
	for (int i = 6; i < 10; i++) {
		for (int j = 9; j > 8+6-i; j--) {
			if (j==9) {
				plateau[j][i] = tcase;
			}
			else if(i==(15-j)){
				plateau[j][i] = tcase+5;
			}
			else if (i==(16-j)) {
				plateau[j][i] = tcase+6;
			}
			else{
				plateau[j][i] = tcase+7;
			}
		}
	}
}
