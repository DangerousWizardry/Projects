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

//Permet de vider un tableau de taille index
void clearcoordtable(coord table[], int index){
  for (int i = 0; i <= index; i++) {
    table[i].x = 0;
    table[i].y = 0;
  }
}
//Retourne la valeur absolue de x
int abs(int x){
  if (x <0 ){
    x=-x;
  }
  return x;
}
//Vide la case aux coordonnées "killcoord"
void kill(pion * plateau[][10],coord killcoord){
  plateau[killcoord.x][killcoord.y] = NULL;
}
//Déplace un pion de la coordonnées movefrom vers moveto
void move(pion * plateau[][10],coord movefrom,coord moveto){
  plateau[moveto.x][moveto.y] = plateau[movefrom.x][movefrom.y];
  kill(plateau,movefrom);
}
//Fonction gérant le délacement du singe (Vérification du déplacement et déplacement)
int movesinge(pion * plateau[][10],coord movefrom,coord moveto, int isplaying, int mustBeJump){
  int val = 0;
  coord coordcheck;
  if(abs(movefrom.x-moveto.x) <=2 && abs(movefrom.y-moveto.y) <= 2){
    //test si déplacement de 1 ou de 2
    if(abs(movefrom.x-moveto.x) == 2 || abs(movefrom.y-moveto.y) == 2){
      //si déplacement de 2 alors
      //test si coord = une case du carré 5x5 impossible a atteindre
      if(!(abs(movefrom.x-moveto.x) == 2 && abs(movefrom.y-moveto.y)==1) && (!(abs(movefrom.x-moveto.x) == 1 && abs(movefrom.y-moveto.y)==2))){
        //calcul de la case "de passage"
        coordcheck.x = movefrom.x+(moveto.x-movefrom.x)/2;
        coordcheck.y = movefrom.y+(moveto.y-movefrom.y)/2;
        if(plateau[coordcheck.x][coordcheck.y] == NULL && mustBeJump==0){
          move(plateau,movefrom,moveto);
          val = 1; //return normal move value
        }
        else{
          if(plateau[coordcheck.x][coordcheck.y]->team == isplaying && plateau[coordcheck.x][coordcheck.y]->type <= plateau[movefrom.x][movefrom.y]->type){
            //if same team && type1>=type2
            move(plateau,movefrom,moveto);
            val = 2;
          }
          else if(plateau[coordcheck.x][coordcheck.y]->type <= plateau[movefrom.x][movefrom.y]->type){
            move(plateau,movefrom,moveto);
            kill(plateau,coordcheck);
            val = 9; //return kill value
          }
        }
      }
    }
    else if (mustBeJump==0){
      //si déplacement de 1
      if(plateau[moveto.x][moveto.y] == NULL){//test si occupé
        plateau[moveto.x][moveto.y] = plateau[movefrom.x][movefrom.y];
        plateau[movefrom.x][movefrom.y] = NULL;
        val = 1;//return normal move value
      }
    }
  }
  return val;
}


int movelion(pion * plateau[][10],coord movefrom,coord moveto, int isplaying, int mustBeJump){
  int val = 0;
  coord coordcheck;
  if(abs(movefrom.x-moveto.x) <=2 && abs(movefrom.y-moveto.y) <= 2){
    //test si déplacement de 1 ou de 2
    if(abs(movefrom.x-moveto.x) == 2 || abs(movefrom.y-moveto.y) == 2){
      //si déplacement de 2 alors
      //test si coord = une case du carré 5x5 impossible a atteindre
      if(!(abs(movefrom.x-moveto.x) == 2 && abs(movefrom.y-moveto.y)==1) && (!(abs(movefrom.x-moveto.x) == 1 && abs(movefrom.y-moveto.y)==2))){
        //calcul de la case "de passage"
        coordcheck.x = movefrom.x+(moveto.x-movefrom.x)/2;
        coordcheck.y = movefrom.y+(moveto.y-movefrom.y)/2;
        if (plateau[coordcheck.x][coordcheck.y]!=NULL) {
          if(plateau[coordcheck.x][coordcheck.y]->team == isplaying && plateau[coordcheck.x][coordcheck.y]->type <= plateau[movefrom.x][movefrom.y]->type){
            move(plateau,movefrom,moveto);
            val = 2;
          }
          else if(plateau[coordcheck.x][coordcheck.y]->type <= plateau[movefrom.x][movefrom.y]->type){
            //If ennemy team && type1>=type2
            move(plateau,movefrom,moveto);
            kill(plateau,coordcheck);
            val = 9; //return kill value
          }
        }
      }
    }
    else if (mustBeJump == 0){
      //si déplacement de 1
      if(plateau[moveto.x][moveto.y] == NULL){//test si occupé
        plateau[moveto.x][moveto.y] = plateau[movefrom.x][movefrom.y];
        plateau[movefrom.x][movefrom.y] = NULL;
        val = 1;//return normal move value
      }
    }
  }
  return val;
}

int movedragon(pion * plateau[][10],coord movefrom,coord moveto, int isplaying){
  int val = 0;
  coord coordcheck;
  if(abs(movefrom.x-moveto.x) <=2 && abs(movefrom.y-moveto.y) <= 2){
    //test si déplacement de 1 ou de 2
    if(abs(movefrom.x-moveto.x) == 2 || abs(movefrom.y-moveto.y) == 2){
      //si déplacement de 2 alors
      //test si coord = une case du carré 5x5 impossible a atteindre
      if(!(abs(movefrom.x-moveto.x) == 2 && abs(movefrom.y-moveto.y)==1) && (!(abs(movefrom.x-moveto.x) == 1 && abs(movefrom.y-moveto.y)==2))){
        //calcul de la case "de passage"
        coordcheck.x = movefrom.x+(moveto.x-movefrom.x)/2;
        coordcheck.y = movefrom.y+(moveto.y-movefrom.y)/2;
        if (plateau[coordcheck.x][coordcheck.y]!=NULL) {
          if(plateau[coordcheck.x][coordcheck.y]->team == isplaying && plateau[coordcheck.x][coordcheck.y]->type <= plateau[movefrom.x][movefrom.y]->type){
            //if same team && type1>=type2
            if (plateau[moveto.x][moveto.y] != NULL && plateau[moveto.x][moveto.y]->type == 4 && plateau[movefrom.x][movefrom.y]->team != plateau[moveto.x][moveto.y]->team) {
              val = 2 + isplaying;
            }
            else{
              val = 2;
            }
            move(plateau,movefrom,moveto);
          }
          else if(plateau[coordcheck.x][coordcheck.y]->type <= plateau[movefrom.x][movefrom.y]->type){
            //If ennemy team && type1>=type2
            if (plateau[moveto.x][moveto.y] != NULL && plateau[moveto.x][moveto.y]->type == 4 && plateau[movefrom.x][movefrom.y]->team != plateau[moveto.x][moveto.y]->team) {
              val = 2 + isplaying; //return victory value
            }
            else{
              val = 9; //return kill value
            }
            move(plateau,movefrom,moveto);
            kill(plateau,coordcheck);
          }
        }
      }
    }
  }
  return val;
}

//Fonction de répartition des déplacements, qui appelle la bonne fonction en fonction du type de pion

int requestmove(pion * plateau[][10],coord movefrom,coord moveto,int isplaying,int mustBeJump){
  int val = 0;
  switch (plateau[movefrom.x][movefrom.y]->type) {
    case 1:
    val = movesinge(plateau,movefrom,moveto,isplaying,mustBeJump);
    break;
    case 2:
    val = movelion(plateau,movefrom,moveto,isplaying,mustBeJump);
    break;
    case 3:
    val = movedragon(plateau,movefrom,moveto,isplaying);
    break;
  }
  return val;
}

//Passe le tour du joueur courant

void nextplayer(int * isp){
  if (*isp==1)
  *isp=2;
  else
  *isp=1;
}

/*
Parcours le plateau et affiche appelle la fonction d'affichage case par case
En parcourant le plateau, la fonction compte le nombre de dragons/de pions restants
Si une équipe ne possède plus de pions/de dragons, une valeur de victoire correspondante est retournée...
*/

int affichageplateau(pion * plateau[][10],coord focused, coord selected,int isplaying,char * msg){
  int testtype, testteam;
  int returnval = 0;
  int countdrag[2] = {0};
  int countpion[2] = {0};
  displaylogo();
  displaycurrent(isplaying,msg);
  for (int i=0; i<10; i++){
    for (int k = 0; k < 28; k++) {
      printf(" ");
    }
    for (int j=0; j<10; j++){
      if (plateau[j][i] != NULL) {
        testtype = plateau[j][i]->type;
        testteam = plateau[j][i]->team;
        if (testtype == 3 && testteam) {
          countdrag[plateau[j][i]->team-1]++;
        }
        else if (testtype != 4) {
          countpion[plateau[j][i]->team-1]++;
        }
      }
      else{
        testtype = 0;
        testteam = 0;
      }
      if (j == selected.x && i == selected.y) {
        affichecase(testteam,testtype,2);
      }
      else if (j == focused.x && i == focused.y) {
        affichecase(testteam,testtype,1);
      }
      else{
        affichecase(testteam,testtype,0);
      }
    }
    printf("\n");
  }
  displayfooter();
  if (countdrag[0] == 0 || countpion[0] == 0) {
    returnval = 2;
  }
  else if(countdrag[1] == 0 || countpion[1] == 0) {
    returnval = 1;
  }
  return returnval;
}

//Transforme une pression sur une flèche en un déplacement
void arrowtocoord(coord * focused){
  if (getchar()) {//Permet de passer le premier caractère qui ne nous permets pas de déterminer le sens de la flèche
    switch (getchar()) {
      case 'A':
      if (focused->y > 0) {
        focused->y -= 1;
      }
      break;
      case 'B':
      if (focused->y < 9) {
        focused->y += 1;
      }
      break;
      case 'C':
      if (focused->x < 9) {
        focused->x += 1;
      }
      break;
      case 'D':
      if (focused->x > 0) {
        focused->x -= 1;
      }
      break;
    }
  }
}

//Affiche le menu de "pause" et retourne le choix de l'utilisateur
char standbymenu(){
  char g = '\n';
  int val = 0;
  do {
    clearboard();
    displaylogo();
    displayconf();
    if (g != 'w' && g != 'W' && g != 'q' && g != 'Q' && g != '!') {
      g = getchar();
    }
    else{
      val = -1;
    }
  }while (val != -1);
  return g;
}
//Affiche la confirmation de sauvegarde
void erasesaveask(pion * plateau[][10],int isplaying){
  char g;
  do {
    clearboard();
    displaylogo();
    printf("Il existe déjà une sauvegarde, l'écraser ? (O/N)\n");
    g = getchar();
    if (g == 'o' || g == 'O') {
      save(plateau,isplaying);
    }
  } while(g != 'o' && g != 'O' && g != 'n' && g != 'N');
}
//Vérifie si la case "focused" est selectionable
void selectmanager(pion * plateau[][10],coord * focused, coord * coordselect, char msg[], int isplaying){
  if (plateau[focused->x][focused->y]!=NULL) {
    if (plateau[focused->x][focused->y]->team == isplaying && plateau[focused->x][focused->y]->type != 4) {
      *coordselect = *focused;
      msg = "                               Sélectionné !                                  ";
    }
    else if (!plateau[focused->x][focused->y]->team) {//team 0 = case maudite
      msg = "             Vous ne pouvez pas sélectionner une case maudite !               ";

    }
    else if (plateau[focused->x][focused->y]->type == 4) {//type 4 = portail
      msg = "                  Vous ne pouvez pas déplacer un portail !                    ";
    }
    else{
      msg = "              Vous ne pouvez pas sélectionner un pion ennemi !                ";
    }
  }
  else{
    msg = "                 Vous ne pouvez pas sélectionner une case vide                  ";
  }
}
