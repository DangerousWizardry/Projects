package jeu;

public class CasePortail extends Case{
	private Couleur couleur;
	public CasePortail(int x, int y,Couleur couleur) {
		super(x, y);
		this.couleur = couleur;
	}
	@Override
	public boolean estPortail() {
		return true;
	}
}
