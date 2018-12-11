//Public Structure Definition
typedef struct{
	int type;
	int team;
} pion ;
typedef struct{
	int x;
	int y;
} coord ;
//Game Engine
void clearcoordtable(coord table[], int index);
int abs(int x);
void kill(pion * plateau[][10],coord killcoord);
void move(pion * plateau[][10],coord movefrom,coord moveto);
int movesinge(pion * plateau[][10],coord movefrom,coord moveto, int isplaying, int mustBeJump);
int movelion(pion * plateau[][10],coord movefrom,coord moveto, int isplaying, int mustBeJump);
int movedragon(pion * plateau[][10],coord movefrom,coord moveto, int isplaying);
int requestmove(pion * plateau[][10],coord movefrom,coord moveto,int isplaying,int mustBeJump);
void nextplayer(int * isp);
int isgamewon(int cptdrag[]);
int affichageplateau(pion * plateau[][10],coord focused, coord selected,int isplaying,char * msg);
void arrowtocoord(coord * focused);
char standbymenu();
void erasesaveask(pion * plateau[][10],int isplaying);
void selectmanager(pion * plateau[][10],coord * focused, coord * coordselect, char msg[],int isplaying);
//Starter
void loadtcase(pion * tcase);
void generetable(pion * plateau[][10], pion * tcase);
//File Engine
void encryptdata(pion * plateau[][10], int isplaying, char str[]);
void save(pion * plateau[][10],int isplaying);
int loadsave(pion * plateau[][10], pion * tcase,int * isplaying);
//Display
void clearboard();
void displaylogo();
void displaycurrent(int joueur,char msg[]);
void displayfooter();
void displayconf();
void displayintro(int type);
void displayvictory(int player);
void affichecase(int team, int type,int colored);
