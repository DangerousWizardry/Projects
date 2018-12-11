package jeu;
import javafx.application.Application;
import javafx.scene.image.Image;
import javafx.stage.Stage;
import ui.SceneBuilder;
import ui.SceneEngine;
public class TestProjet extends Application{
	public static void main(String args[]) {
		Application.launch(args);
	}
	public void start(Stage stage) {
		String localPath = "file:///" + System.getProperty("user.dir").replaceAll("\\\\", "/") + "/assets";
		SceneEngine sceneEngine = new SceneEngine();
		SceneBuilder sceneBuilder = new SceneBuilder(localPath, stage,sceneEngine);
        sceneEngine.add("menu", sceneBuilder.buildMenu());
        sceneEngine.add("regles", sceneBuilder.buildRegles());
        sceneEngine.add("playerSelect", sceneBuilder.buildPlayerSelect());
        stage.getIcons().add(new Image(localPath+"/icon.png"));
		stage.setScene(sceneEngine.get("menu"));
        stage.sizeToScene();
        stage.setTitle("ShingShang v1.1");
        stage.setResizable(false);
        stage.show();
	}
}
//SYSTEME DE FIN + PAGE DE FIN OK
//SCORE OK
//OPTI DES TESTS DEPLACEMENTS AVEC SURCHARGE + OPTI DES BUSHIS -> CASES + PASSER LES ATTRIBUTS EN PRIVATE
//REGLES
//ICONE D'APPLICATION OK
//JAVADOC
//RAPPORT