package jeu;

import java.util.*;

import javafx.beans.property.BooleanProperty;
import javafx.beans.property.ObjectProperty;
import javafx.beans.property.SimpleBooleanProperty;
import javafx.beans.property.SimpleObjectProperty;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;

public class Partie {
private ObjectProperty<Joueur> joueurCourant;
private Joueur joueur1;
private Joueur joueur2;
private LinkedList<Bushi> armeeJ1;
private LinkedList<Bushi> armeeJ2;
private Plateau plateau;
private BooleanProperty estPartieTerminee;
private int compteurTour;
	public Partie (Joueur joueur1, Joueur joueur2) {
		this.joueur1 = joueur1;
		this.joueur2 = joueur2;
		plateau = new Plateau(); 
		armeeJ1 = new LinkedList<Bushi>();
		armeeJ2 = new LinkedList<Bushi>();
		joueurCourant = new SimpleObjectProperty<Joueur>();
		armeeJ1.add((Bushi) new Dragon(plateau.getCase(1,0),joueur1.getCouleur()));
		armeeJ1.add(new Lion(plateau.getCase(2,0),joueur1.getCouleur()));
		armeeJ1.add(new Singe(plateau.getCase(3,0),joueur1.getCouleur()));
		armeeJ1.add(new Lion(plateau.getCase(1,1),joueur1.getCouleur()));
		armeeJ1.add(new Singe(plateau.getCase(2,1),joueur1.getCouleur()));
		armeeJ1.add(new Singe(plateau.getCase(1,2),joueur1.getCouleur()));
		
		armeeJ1.add(new Dragon(plateau.getCase(8,0),joueur1.getCouleur()));
		armeeJ1.add(new Lion(plateau.getCase(7,0),joueur1.getCouleur()));
		armeeJ1.add(new Singe(plateau.getCase(6,0),joueur1.getCouleur()));
		armeeJ1.add(new Lion(plateau.getCase(8,1),joueur1.getCouleur()));
		armeeJ1.add(new Singe(plateau.getCase(7,1),joueur1.getCouleur()));
		armeeJ1.add(new Singe(plateau.getCase(8,2),joueur1.getCouleur()));
		
		armeeJ2.add(new Dragon(plateau.getCase(1,9),joueur2.getCouleur()));
		armeeJ2.add(new Lion(plateau.getCase(2,9),joueur2.getCouleur()));
		armeeJ2.add(new Singe(plateau.getCase(3,9),joueur2.getCouleur()));
		armeeJ2.add(new Lion(plateau.getCase(1,8),joueur2.getCouleur()));
		armeeJ2.add(new Singe(plateau.getCase(2,8),joueur2.getCouleur()));
		armeeJ2.add(new Singe(plateau.getCase(1,7),joueur2.getCouleur()));
		
		armeeJ2.add(new Dragon(plateau.getCase(8,9),joueur2.getCouleur()));
		armeeJ2.add(new Lion(plateau.getCase(7,9),joueur2.getCouleur()));
		armeeJ2.add(new Singe(plateau.getCase(6,9),joueur2.getCouleur()));
		armeeJ2.add(new Lion(plateau.getCase(8,8),joueur2.getCouleur()));
		armeeJ2.add(new Singe(plateau.getCase(7,8),joueur2.getCouleur()));
		armeeJ2.add(new Singe(plateau.getCase(8,7),joueur2.getCouleur()));
		estPartieTerminee = new SimpleBooleanProperty();
		estPartieTerminee.set(false);
		compteurTour = 0;
	}
	/*
	 * GETTER & SETTER
	 */
	public Joueur getJoueur1() {
		return joueur1;
	}

	public Joueur getJoueur2() {
		return joueur2;
	}
	public Joueur getJoueurCourant() {
		return joueurCourant.get();
	}
	public ObjectProperty<Joueur> getJoueurCourantProperty(){
		return joueurCourant;
	}
	
	public BooleanProperty getEstPartieTerminee(){
		return estPartieTerminee;
		
	}
	public Joueur getGagnant() {
		return joueurCourant.get();
	}
	
	public LinkedList<Bushi> getArmeeJ1() {
		return armeeJ1;
	}
	
	public void setArmeeJ1(LinkedList<Bushi> armeeJ1) {
		this.armeeJ1 = armeeJ1;
	}
	
	public LinkedList<Bushi> getArmeeJ2() {
		return armeeJ2;
	}

	public void setArmeeJ2(LinkedList<Bushi> armeeJ2) {
		this.armeeJ2 = armeeJ2;
	}

	public Plateau getPlateau() {
		return plateau;
	}
	/*
	 * METHODE D'OBJET
	 */
	public void nextJoueur() {
		Case [][] pla = getPlateau().getDamier();
		for(Case[] row : pla) {
			for (Case case1 : row) {
				case1.highlightOff();
			}
		}
		getPlateau().resetTour(true);
		if (testPartieTerminee()) {
			estPartieTerminee.set(true);
		}
		else {
			if(joueurCourant.get() == joueur1) {
				joueurCourant.set(joueur2);
			}else {
				joueurCourant.set(joueur1);
			}
			getPlateau().clearMarquage(false);
			compteurTour++;
		}
	}
	public void doClearMarquage() {
		LinkedList<Bushi> bushis = getPlateau().clearMarquage(true);
		for (Bushi bushi : bushis) {
			if (armeeJ1.contains(bushi)) {
				armeeJ1.remove(bushi);
				int scoreToAdd = (int) Math.round(((10*Math.abs((100-(Math.sqrt(compteurTour)*10))))*Math.sqrt(bushis.size()))/10)*10;
				if (scoreToAdd<50) scoreToAdd = 50; 
				joueur2.setScore((int) (joueur2.getScore().get())+scoreToAdd);
			}
			else if (armeeJ2.contains(bushi)) {
				int scoreToAdd = (int) Math.round(((10*Math.abs((100-(Math.sqrt(compteurTour)*10))))*Math.sqrt(bushis.size()))/10)*10;
				if (scoreToAdd<50) scoreToAdd = 50; 
				joueur1.setScore((int) (joueur1.getScore().get())+scoreToAdd);
				armeeJ2.remove(bushi);
			}
		}
	}
	public boolean testPartieTerminee() {
		if (getPlateau().getActionVictorieuse()) {
			joueurCourant.get().setScore(joueur2.getScore().get()+1000);
			return true;
		}
		int countDragJ1 = 0;
		int countDragJ2 = 0;
		int countBushJ1 = 0;
		int countBushJ2 = 0;
		for(Bushi b : armeeJ1) {
			if(b.getHauteur()==3) {
				countDragJ1+=1;
			}
			else {
				countBushJ1+=1;
			}
		}
		for(Bushi b : armeeJ2) {
			if(b.getHauteur()==3) {
				countDragJ2+=1;
			}
			else {
				countBushJ2+=1;
			}
		}
		if(countBushJ1==0||countBushJ2==0||countDragJ1==0||countDragJ2==0) {
			return true;
		}
		return false;
	}
	public void initialize() {
		plateau.poseArmee(armeeJ1);
		plateau.poseArmee(armeeJ2);
		plateau.getCaseSelectionnee().addListener(new ChangeListener<Case>() {
            public void changed(ObservableValue<? extends Case> observable, Case oldValue, Case newValue) {
            	plateau.testTestDeplacement(plateau.getCase(newValue.getX(), newValue.getY()).getElement());
            }
		});
		nextJoueur();
	}
}
