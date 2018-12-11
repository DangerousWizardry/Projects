package ui;

import javafx.event.EventHandler;
import javafx.scene.input.MouseEvent;

public abstract class MouseEventWithCoord implements EventHandler<MouseEvent>{
	private int x;
	private int y;
	public MouseEventWithCoord(int x,int y) {
		this.x = x;
		this.y = y;
	}
	public int getX() {
		return x;
	}
	public int getY() {
		return y;
	}
	@Override
	public abstract void handle(MouseEvent arg0);

}
