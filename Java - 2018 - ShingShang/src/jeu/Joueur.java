package jeu;

import javafx.beans.property.IntegerProperty;
import javafx.beans.property.SimpleIntegerProperty;

public class Joueur {
private Couleur couleur;
private String nom;
private IntegerProperty  score;
	public Joueur(Couleur couleur, String nom) {
		this.couleur = couleur;
		this.nom = nom;
		this.score = new SimpleIntegerProperty(0);
	}
	public Couleur getCouleur() {
		return couleur;
	}
	public void setCouleur(Couleur couleur) {
		this.couleur = couleur;
	}
	public String getNom() {
		return nom;
	}
	public void setNom(String nom) {
		this.nom = nom;
	}
	public IntegerProperty getScore() {
		return score;
	}
	public void setScore(int score) {
		this.score.set(score);
	}
}
