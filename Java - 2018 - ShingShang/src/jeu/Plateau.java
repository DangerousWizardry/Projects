package jeu;
import java.util.LinkedList;

import javafx.beans.property.BooleanProperty;
import javafx.beans.property.ObjectProperty;
import javafx.beans.property.SimpleBooleanProperty;
import javafx.beans.property.SimpleObjectProperty;
import javafx.scene.control.TableColumn.CellEditEvent;

public class Plateau {
	private Case [][] damier;
	private ObjectProperty<Case> caseselectionee;
	private LinkedList<Case> marquage;
	private boolean derniereAction;
	private BooleanProperty shingShang;
	private boolean dernierDeplacementSaut;
	private BooleanProperty actionVictorieuse;
	public Plateau() {
		damier = new Case[10][10];
		for(int i = 0;i<10;i++) {
			for(int j = 0;j<10;j++) {
				if ((i != 4 && i != 5) && (j==0 || j==9)) {
					damier[i][j] = new CaseMaudite(j,i);
				}
				else if ((j == 4 || j == 5) && (i==1 || i==8)) {
					if (i==2) {
						damier[i][j] = new CasePortail(j,i,Couleur.NOIR);
					}
					else {
						damier[i][j] = new CasePortail(j,i,Couleur.ROUGE);
					}
				}
				else {
					damier[i][j] = new Case(j,i);
				}
			}
		}
		caseselectionee = new SimpleObjectProperty<Case>(damier[0][0]);
		marquage = new LinkedList<Case>();
		shingShang = new SimpleBooleanProperty(false);
		actionVictorieuse = new SimpleBooleanProperty(false);
	}
	/*
	 * GETTER + SETTER
	 */
	public BooleanProperty getActionVictorieuseProperty() {
		return actionVictorieuse;
	}
	public boolean getActionVictorieuse() {
		return actionVictorieuse.get();
	}
	public BooleanProperty getShingShangProperty() {
		return shingShang;
	}
	public boolean isShingShang() {
		return shingShang.get();
	}
	public void setShingShang(boolean shingShang) {
		this.shingShang.set(shingShang);
	}
	public boolean isDernierDeplacementSaut() {
		return dernierDeplacementSaut;
	}
	public void setDernierDeplacementSaut(boolean dernierDeplacementSaut) {
		this.dernierDeplacementSaut = dernierDeplacementSaut;
	}
	public Case getCase(int x,int y) {
		return damier[y][x];
	}
	public ObjectProperty<Case> getCaseSelectionnee(){
		return caseselectionee;
	}
	public void setCaseSelectionnee(int x,int y) {
		caseselectionee.set(damier[y][x]);
	}
	public Case[][] getDamier(){
		return damier;
	}
	/*
	 * METHODE D'OBJET
	 */
	public void clicPlateau(Partie partie, int x, int y) {
		if (!getCase(x, y).estMaudite() && (getCase(x, y).getElement() == null || getCase(x, y).getElement().getCouleur() == partie.getJoueurCourant().getCouleur())) {
			if ((getCase(caseselectionee.get().getX(), caseselectionee.get().getY()).getElement() == null || getCase(x, y).getElement() != null)&& !getCase(x, y).getElement().isLocked()) {
	    		setCaseSelectionnee(x, y);
			}
	    	else if (derniereAction != true){
	    		System.out.println("Déplacement ? "+getCase(x, y).isHighLighted());
	    		if (getCase(x, y).isHighLighted()) {
	    			deplace(x, y,partie.getJoueurCourant());
	    			setCaseSelectionnee(x, y);
				}
	    	}
		}
	}
	public void resetTour(boolean isCompleted) {
		for (Case[] row : damier) {
			for (Case cell : row) {
				if (cell.getElement() != null) {
					cell.getElement().unlock();
				}
			}
		}
		if (!isCompleted) {
			caseselectionee.get().getElement().lock();
			testTestDeplacement(caseselectionee.get().getElement());
		}
		derniereAction = false;
		setShingShang(false);
		dernierDeplacementSaut = false;
	}
	public void marquerCase(Case ca) {
		marquage.add(ca);
	}
	public LinkedList<Bushi> clearMarquage(boolean isDeleted) {
		if (isDeleted) {
			LinkedList<Bushi> bushilist = new LinkedList<>();
			for (Case ca:marquage) {
				bushilist.add(ca.getElement());
				ca.setElement(null);
			}
			marquage.clear();
			return bushilist;
		}
		else {
			marquage.clear();
			return null;
		}
	}
	public void testMarquage(Case cell,Joueur joueurCourant){
		if (cell.getElement().getCouleur() != joueurCourant.getCouleur()) {
			marquerCase(cell);
			System.out.println("Marqué");
		}
	}
	public void deplace(int x, int y, Joueur joueurCourant) {
		if (Math.abs(caseselectionee.get().getX()-x)<2 && Math.abs(caseselectionee.get().getY()-y)<2) {
			derniereAction = true;
		}
		else {
			int coordcheckx = x+(caseselectionee.get().getX()-x)/2;
		    int coordchecky = y+(caseselectionee.get().getY()-y)/2;
		    if (getCase(coordcheckx,coordchecky).getElement() != null ) {
		    	testMarquage(getCase(coordcheckx,coordchecky),joueurCourant);
		    	for (Case[] row : damier) {
		    		for (Case cell : row) {
		    			if (cell != caseselectionee.get() && cell.getElement() != null) {
							cell.getElement().lock();
						}
					}
				}
		    	if (dernierDeplacementSaut) {
					setShingShang(true);
				}
		    	setDernierDeplacementSaut(true);
		     }
		    else {
		    	derniereAction = true;
		    }
		}
		if (getCase(x, y).estPortail()) {
			actionVictorieuse.set(true);
		}
		getCase(x, y).setElement(getCase(caseselectionee.get().getX(),caseselectionee.get().getY()).getElement());
		getCase(x, y).getElement().setDalle(getCase(x, y));
		getCase(caseselectionee.get().getX(),caseselectionee.get().getY()).setElement(null);
	}
	public void poseArmee(LinkedList<Bushi> list) {
		Case dalle;
		for(Bushi b : list) {
			dalle = b.getDalle();
			dalle.setElement(b);
		}
	}
	//PLUS UTILISE AFFICHAIT ANCIENNEMENT LE PLATEAU EN CONSOLE
	public void affiche() {
		for(int i = 0;i<10;i++) {
			for(int j = 0;j<10;j++) {
				damier[i][j].afficher();
			}
			System.out.println();
		}
	}
	//GESTION DES CASES MISES EN SURBRILLANCE
	public void testTestDeplacement(Bushi bushi) {
		System.out.println(bushi);
		for(Case[] row : damier) {
			for (Case case1 : row) {
				case1.highlightOff();
			}
		}
		if (bushi != null && derniereAction != true && !bushi.isLocked()) {
			if (bushi instanceof Dragon){
				LinkedList<Case> caseToHighlight = testDeplacementDragon(bushi.getDalle().getX(),bushi.getDalle().getY());
				for (Case case1 : caseToHighlight) {
					case1.highlightOn();
				}
			}
			if (bushi instanceof Lion){
				LinkedList<Case> caseToHighlight = testDeplacementLion(bushi.getDalle().getX(),bushi.getDalle().getY());
				for (Case case1 : caseToHighlight) {
					case1.highlightOn();
				}
			}
			if (bushi instanceof Singe){
				LinkedList<Case> caseToHighlight = testDeplacementSinge(bushi.getDalle().getX(),bushi.getDalle().getY());
				for (Case case1 : caseToHighlight) {
					case1.highlightOn();
				}
			}
		}
	}
	
	
	private LinkedList<Case> testDeplacementDragon(int x, int y) {
		LinkedList<Case> listePossibles = new LinkedList<Case>();
		for(int i=x-2; i<=x+2;i++) {
			for(int j=y-2; j<=y+2; j++) {
				if (i>=0 && i<=9 && j>=0 && j<=9 && !getCase(i,j).estMaudite()) {
					if(estDeplacementDragonPossible(x,y,i,j)) {
						listePossibles.add(getCase(i,j));
					}
				}
			}
		}
		return listePossibles;
	}
	
	private LinkedList<Case> testDeplacementLion(int x, int y) {
		LinkedList<Case> listePossibles = new LinkedList<Case>();
		for(int i=x-2; i<=x+2;i++) {
			for(int j=y-2; j<=y+2; j++) {
				if (i>=0 && i<=9 && j>=0 && j<=9 && !getCase(i,j).estMaudite() && !getCase(i,j).estPortail()) {
					if(estDeplacementLionPossible(x,y,i,j)) {
						listePossibles.add(getCase(i,j));
					}
				}
			}
		}
		return listePossibles;
	}
	private LinkedList<Case> testDeplacementSinge(int x, int y) {
		LinkedList<Case> listePossibles = new LinkedList<Case>();
		for(int i=x-2; i<=x+2;i++) {
			for(int j=y-2; j<=y+2; j++) {
				if (i>=0 && i<=9 && j>=0 && j<=9 && !getCase(i,j).estMaudite() && !getCase(i,j).estPortail()) {
					if(estDeplacementSingePossible(x,y,i,j)) {
						listePossibles.add(getCase(i,j));
					}
				}
			}
		}
		return listePossibles;
		
	}
	private boolean estSautPossible(int x, int y, int i, int j) {
			//case du carré 5x5 interdite
			if(!(Math.abs(x-i) == 2 && Math.abs(y-j)==1) && !(Math.abs(x-i) == 1 && Math.abs(y-j)==2)){
			        //calcul de la case "de passage"
				int coordcheckx = x+(i-x)/2;
			    int coordchecky = y+(j-y)/2;
			    if (getCase(coordcheckx,coordchecky).getElement() != null ) {
			    	if(getCase(i,j).getElement() == null){
			    		if(getCase(coordcheckx,coordchecky).getElement().getHauteur() <= getCase(x,y).getElement().getHauteur()){
			    			//pour eviter le retour arrière en cas de ShingShang
			    			if (!marquage.contains(getCase(coordcheckx,coordchecky))) {
			    				return true; // sauter à 2
							}
				        }
					 }
			          
			     }
			 }
		return false;
	}
	private boolean estDeplacementDragonPossible(int x, int y, int i, int j) {
		if(Math.abs(x-i) == 2 || Math.abs(y-j) == 2){
			return estSautPossible(x, y, i, j);
		}
		return false;
	}

	private boolean estDeplacementLionPossible(int x, int y, int i, int j) {
		if(Math.abs(x-i) <= 2 || Math.abs(y-j) <= 2){
			//Si déplacement de 2 alors test validité du saut
			if(Math.abs(x-i) == 2 || Math.abs(y-j) == 2){
				return estSautPossible(x, y, i, j);
			}
			//sinon
			else {
					if(getCase(i,j).getElement() == null && !dernierDeplacementSaut){
						return true;
					}
			}
		}
		return false;
	}
	private boolean estDeplacementSingePossible(int x, int y, int i, int j) {
		if(Math.abs(x-i) <= 2 || Math.abs(y-j) <= 2){
			//Si déplacement de 2
			if(Math.abs(x-i) == 2 || Math.abs(y-j) == 2){
				//Case du carré de 5x5 non accessible par un déplacement de 2 case
				if(!(Math.abs(x-i) == 2 && Math.abs(y-j)==1) && !(Math.abs(x-i) == 1 && Math.abs(y-j)==2)){
			        //calcul de la case "de passage"
				int coordcheckx = x+(i-x)/2;
			    int coordchecky = y+(j-y)/2;
			    //Deplacement de 2 avec un saut
			    if (getCase(coordcheckx,coordchecky).getElement() != null ) {
			    	if(getCase(i,j).getElement() == null){
			    		if(getCase(coordcheckx,coordchecky).getElement().getHauteur() <= getCase(x,y).getElement().getHauteur()){
			    			if (!marquage.contains(getCase(coordcheckx,coordchecky))) {
			    				return true; // sauter à 2
							}
				        }
					 }
			          
			     }
			    //Deplacement de 2 sur un emplacement vide
			    else {
			    	if (!dernierDeplacementSaut && getCase(i, j).getElement() == null) {
			    		return true;
					}	
			    }
			 }
			}
			//Deplacement de 1 sur un emplacement vide
			else {
					if(getCase(i,j).getElement() == null && !dernierDeplacementSaut){
						return true;
					}
			}
		}
		return false;
	}

}