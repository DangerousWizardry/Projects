package jeu;

public class CaseMaudite extends Case{

	public CaseMaudite(int x, int y) {
		super(x, y);
	}
	@Override
	public boolean estMaudite() {
		return true;
	}
}
