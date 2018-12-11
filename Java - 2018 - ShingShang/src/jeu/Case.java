package jeu;

import javafx.beans.property.BooleanProperty;
import javafx.beans.property.SimpleBooleanProperty;

public class Case {
protected int x,y;
protected BooleanProperty highLighted;
protected Bushi element;
	public Case(int x,int y) {
		this.x = x;
		this.y = y;
		this.highLighted = new SimpleBooleanProperty(false);
		
	}
	public Case(int x,int y, Bushi element) {
		this.x = x;
		this.y = y;
		this.element = element;
		this.highLighted = new SimpleBooleanProperty(false);
	}
/* méthode servant à savoir si une case est un portail */
	public boolean estPortail() {
		return false;
	}
	public boolean estMaudite() {
		return false;
	}
	public int getX() {
		return x;
	}
	public int getY() {
		return y;
	}
	public Bushi getElement() {
		return element;
	}
	public void setElement(Bushi element) {
		this.element = element;
	}
	public void afficher() {
		String aff;
		if(element != null) {
			aff = "@";
		}
		else {
			aff = "·";
		}
		System.out.print(aff + " ");
	}
	public void highlightOn() {
		highLighted.set(true);
	}
	public void highlightOff() {
		highLighted.set(false);
	}
	public BooleanProperty highLightedProperty() {
		return highLighted;
	}
	public boolean isHighLighted() {
		return highLighted.get();
	}
	public String toString() {
		return "("+x+";"+y+")";
	}
}
