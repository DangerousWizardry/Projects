package ui;

import java.util.HashMap;

import javafx.scene.Scene;

public class SceneEngine {
	
	public HashMap<String, Scene> sceneMap;
	
	public SceneEngine() {
		sceneMap = new HashMap<String, Scene>();
	}
	public void add(String key,Scene scene) {
		sceneMap.put(key, scene);
	}
	public Scene get(String key) {
		return sceneMap.get(key);
	}
	public void remove(String key) {
		sceneMap.remove(key);
	}
}
