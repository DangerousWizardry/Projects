package jeu;
public abstract class Bushi {
	protected Case dalle;
	protected int hauteur;
	protected Couleur couleur;
	protected boolean verrouille;
	public Bushi(Case ca,int ha,Couleur co) {
		this.dalle = ca;
		this.hauteur = ha;
		this.couleur = co;
	}
	public int getHauteur() {
		return hauteur;
	}
	public Couleur getCouleur() {
		return couleur;
	}
	public Case getDalle() {
		return dalle;
	}
	public void setDalle(Case dalle) {
		this.dalle = dalle;
	}
	public boolean isLocked() {
		return verrouille;
	}
	public void lock() {
		verrouille = true;
	}
	public void unlock() {
		verrouille = false;
	}
}
