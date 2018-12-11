package ui;

import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Group;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.FlowPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Pane;
import javafx.scene.layout.StackPane;
import javafx.scene.paint.Color;
import javafx.scene.shape.Rectangle;
import javafx.scene.text.Font;
import javafx.scene.text.FontWeight;
import javafx.scene.text.Text;
import javafx.stage.Stage;
import jeu.Bushi;
import jeu.Couleur;
import jeu.Joueur;
import jeu.Partie;

public class SceneBuilder {
	private String absolutePath;
	private Stage mainStage;
	private SceneEngine sceneEngine;
	
	public SceneBuilder(String absolutePath,Stage mainStage,SceneEngine sceneEngine) {
		this.absolutePath = absolutePath;
		this.mainStage = mainStage;
		this.sceneEngine = sceneEngine;
	}
	public Scene buildMenu() {
		StackPane pane = new StackPane();
        Rectangle r = new Rectangle(1000, 600);
        r.setFill(Color.WHITE);
        Pane p = new Pane();
        p.setStyle("-fx-background-image: url('"+ absolutePath + "/main.jpg');-fx-background-repeat: no-repeat;-fx-background-size: cover;");
        pane.getChildren().addAll(r, p);
        r.widthProperty().bind(pane.prefWidthProperty());
        r.heightProperty().bind(pane.prefHeightProperty());
        pane.setPrefSize(1000, 600);
        Group contenu = new Group();
        Label lbl = new Label("Shing Shang");
        lbl.setTextFill(Color.WHITE);
        lbl.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 80;");
        lbl.setLayoutY(50);
        lbl.layoutXProperty().bind(pane.widthProperty().subtract(lbl.widthProperty()).divide(2));
        FlowPane flow = new FlowPane();
        flow.setPadding(new Insets(5, 0, 5, 0));
        flow.setVgap(20);
        flow.setHgap(0);
        flow.setPrefWrapLength(340);
        Button btnJouer = new Button();
        btnJouer.setStyle("-fx-background-image: url('"+ absolutePath +"/jouer.png');-fx-background-repeat: no-repeat;-fx-background-color:transparent;-fx-background-size: cover;");
        btnJouer.setPrefSize(336, 82);
        btnJouer.setOnAction(new EventHandler<ActionEvent>() {
            public void handle(ActionEvent event) {
            	mainStage.setScene(sceneEngine.get("playerSelect"));
            	
            }
        });
        Button btnRegles = new Button();
        btnRegles.setStyle("-fx-background-image: url('"+ absolutePath +"/regles.png');-fx-background-repeat: no-repeat;-fx-background-color:transparent;-fx-background-size: cover;");
        btnRegles.setPrefSize(336, 82);
        btnRegles.setOnAction(new EventHandler<ActionEvent>() {
            public void handle(ActionEvent event) {
            	mainStage.setScene(sceneEngine.get("regles"));
            	
            }
        });
        flow.getChildren().addAll(btnJouer,btnRegles);
        flow.setLayoutY(350);
        flow.layoutXProperty().bind(pane.widthProperty().subtract(flow.widthProperty()).divide(2));
        contenu.getChildren().addAll(pane,lbl,flow);
        Scene scene = new Scene(contenu);
        scene.getStylesheets().add(absolutePath + "/style.css");
        return scene;
	}
	public Scene buildRegles() {
		StackPane pane = new StackPane();
        Rectangle r = new Rectangle(1000, 600);
        r.setFill(Color.WHITE);
        Pane p = new Pane();
        p.setStyle("-fx-background-image: url('"+ absolutePath + "/back_regles.jpg');-fx-background-repeat: no-repeat;-fx-background-size: cover;");
        pane.getChildren().addAll(r, p);
        r.widthProperty().bind(pane.prefWidthProperty());
        r.heightProperty().bind(pane.prefHeightProperty());
        pane.setPrefSize(1000, 600);
        Group contenu = new Group();
        Label lbl = new Label("Regles du Jeu");
        lbl.setTextFill(Color.WHITE);
        lbl.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 60;");
        lbl.setLayoutY(50);
        lbl.layoutXProperty().bind(pane.widthProperty().subtract(lbl.widthProperty()).divide(2));
        Button btnReturn = new Button();
        btnReturn.setStyle("-fx-background-image: url('"+ absolutePath +"/return.png');-fx-background-repeat: no-repeat;-fx-background-color:transparent;-fx-background-size: cover;");
        btnReturn.setPrefSize(246, 60);
        btnReturn.setOnAction(new EventHandler<ActionEvent>() {
            public void handle(ActionEvent event) {
            	mainStage.setScene(sceneEngine.get("menu"));
            	
            }
        });
        btnReturn.setLayoutY(500);
        btnReturn.layoutXProperty().bind(pane.widthProperty().subtract(btnReturn.widthProperty()).divide(2));
        contenu.getChildren().addAll(pane,lbl,btnReturn);
        Scene scene = new Scene(contenu);
        scene.getStylesheets().add(absolutePath + "/style.css");
        return scene;
	}
	public Scene buildPlayerSelect() {
		StackPane pane = new StackPane();
        Rectangle r = new Rectangle(1000, 600);
        r.setFill(Color.WHITE);
        Pane p = new Pane();
        p.setStyle("-fx-background-image: url('"+ absolutePath + "/back_playerSelect.jpg');-fx-background-repeat: no-repeat;-fx-background-size: cover;");
        pane.getChildren().addAll(r, p);
        r.widthProperty().bind(pane.prefWidthProperty());
        r.heightProperty().bind(pane.prefHeightProperty());
        pane.setPrefSize(1000, 600);
        Group contenu = new Group();
        Label title = new Label("Création de la partie");
        title.setTextFill(Color.WHITE);
        title.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 60;");
        title.setLayoutY(50);
        title.layoutXProperty().bind(pane.widthProperty().subtract(title.widthProperty()).divide(2));
        FlowPane flow = new FlowPane();
        flow.setPadding(new Insets(5, 0, 5, 0));
        flow.setVgap(10);
        flow.setHgap(100);
        flow.setPrefWrapLength(700);
        Label labelP1 = new Label("Entrer le nom du Joueur 1");
        labelP1.setTextFill(Color.WHITE);
        labelP1.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 20;");
        labelP1.setPrefWidth(300);
        Label labelP2 = new Label("Entrer le nom du Joueur 2");
        labelP2.setTextFill(Color.WHITE);
        labelP2.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 20;");
        labelP2.setPrefWidth(300);
        TextField textFieldP1 = new TextField ();
        textFieldP1.setPrefSize(300, 40);
        textFieldP1.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 25;");
        TextField textFieldP2 = new TextField ();
        textFieldP2.setPrefSize(300, 40);
        textFieldP2.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 25;");
        flow.getChildren().addAll(labelP1,labelP2,textFieldP1,textFieldP2);
        flow.layoutXProperty().bind(pane.widthProperty().subtract(flow.widthProperty()).divide(2));
        flow.setLayoutY(200);
        HBox hbox = new HBox();
        hbox.setPadding(new Insets(15, 12, 15, 12));
        hbox.setSpacing(50);
        Button btnReturn = new Button();
        btnReturn.setStyle("-fx-background-image: url('"+ absolutePath +"/return.png');-fx-background-repeat: no-repeat;-fx-background-color:transparent;-fx-background-size: cover;");
        btnReturn.setPrefSize(246, 60);
        btnReturn.setOnAction(new EventHandler<ActionEvent>() {
            public void handle(ActionEvent event) {
            	mainStage.setScene(sceneEngine.get("menu"));
            	
            }
        });
        Button btnValider = new Button();
        btnValider.setStyle("-fx-background-image: url('"+ absolutePath +"/demarrer.png');-fx-background-repeat: no-repeat;-fx-background-color:transparent;-fx-background-size: cover;");
        btnValider.setPrefSize(246, 60);
        btnValider.setOnAction(new EventHandler<ActionEvent>() {
            public void handle(ActionEvent event) {
            	if (textFieldP1.getText().length()!=0 && textFieldP2.getText().length()!=0) {
            		sceneEngine.add("jeu", buildJeu(new Partie(new Joueur(Couleur.NOIR, textFieldP1.getText().toUpperCase()), new Joueur(Couleur.ROUGE, textFieldP2.getText().toUpperCase()))));
            		mainStage.setScene(sceneEngine.get("jeu"));
				}
            	else {
            		Alert alert = new Alert(AlertType.INFORMATION);
            		alert.setTitle("Erreur dans la saisie");
            		alert.setHeaderText(null);
            		alert.setContentText("Merci de remplir le nom des deux joueurs !");
            		alert.showAndWait();
            	}
            }
        });
        hbox.setLayoutY(500);
        hbox.layoutXProperty().bind(pane.widthProperty().subtract(hbox.widthProperty()).divide(2));
        hbox.getChildren().addAll(btnReturn,btnValider);
        contenu.getChildren().addAll(pane,title,flow,hbox);
        Scene scene = new Scene(contenu);
        scene.getStylesheets().add(absolutePath + "/style.css");
        return scene;
	}
	public Scene buildFin(Partie partie) {
		StackPane pane = new StackPane();
        Rectangle r = new Rectangle(1000, 600);
        r.setFill(Color.WHITE);
        Pane p = new Pane();
        p.setStyle("-fx-background-image: url('"+ absolutePath + "/main.jpg');-fx-background-repeat: no-repeat;-fx-background-size: cover;");
        pane.getChildren().addAll(r, p);
        r.widthProperty().bind(pane.prefWidthProperty());
        r.heightProperty().bind(pane.prefHeightProperty());
        pane.setPrefSize(1000, 600);
        Group contenu = new Group();
        Label title = new Label("Partie Terminée");
        title.setTextFill(Color.WHITE);
        title.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 60;");
        title.setLayoutY(50);
        title.layoutXProperty().bind(pane.widthProperty().subtract(title.widthProperty()).divide(2));
        Label lbl = new Label("Victoire de " + partie.getJoueurCourant().getNom() + " avec " + partie.getJoueurCourant().getScore().get() + "points");
        lbl.setTextFill(Color.WHITE);
        lbl.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 30;");
        lbl.setLayoutY(250);
        lbl.layoutXProperty().bind(pane.widthProperty().subtract(lbl.widthProperty()).divide(2));
        Button btnReturn = new Button();
        btnReturn.setStyle("-fx-background-image: url('"+ absolutePath +"/return.png');-fx-background-repeat: no-repeat;-fx-background-color:transparent;-fx-background-size: cover;");
        btnReturn.setPrefSize(246, 60);
        btnReturn.setOnAction(new EventHandler<ActionEvent>() {
            public void handle(ActionEvent event) {
            	mainStage.setScene(sceneEngine.get("menu"));
            	
            }
        });
        btnReturn.setLayoutY(500);
        btnReturn.layoutXProperty().bind(pane.widthProperty().subtract(btnReturn.widthProperty()).divide(2));
        contenu.getChildren().addAll(pane,lbl,btnReturn);
        Scene scene = new Scene(contenu);
        scene.getStylesheets().add(absolutePath + "/style.css");
        return scene;
		
	}
	public Scene buildJeu(Partie partie) {
		partie.initialize();
		//Fenêtre et Background
		Group root = new Group();
        Rectangle mainFrameRectangle = new Rectangle(1000, 715);
        StackPane pane = new StackPane();
        mainFrameRectangle.setFill(Color.WHITE);
        Pane backgroundPane = new Pane();
        backgroundPane.setStyle("-fx-background-image: url('"+ absolutePath +"/plateau.png');-fx-background-repeat: no-repeat;-fx-background-size: cover;");
        pane.getChildren().addAll(mainFrameRectangle, backgroundPane);
        mainFrameRectangle.widthProperty().bind(pane.prefWidthProperty());
        mainFrameRectangle.heightProperty().bind(pane.prefHeightProperty());
        pane.setPrefSize(1000, 715);
        //Element de la fenêtre
        BorderPane border = new BorderPane();
        FlowPane center = new FlowPane();
        center.setPadding(new Insets(4, 4, 4, 4));
        center.setVgap(-0.5);
        center.setHgap(-0.5);
        center.setPrefWrapLength(480);
        generateBoard(center,partie);
        partie.getPlateau().getCaseSelectionnee().addListener(new ChangeListener<Object>() {
            public void changed(ObservableValue<? extends Object> observable, Object oldValue, Object newValue) {
            	generateBoard(center,partie);
            }
		});
        partie.getJoueurCourantProperty().addListener(new ChangeListener<Object>() {
            public void changed(ObservableValue<? extends Object> observable, Object oldValue, Object newValue) {
            	generateBoard(center,partie);
            }
		});
        partie.getPlateau().getShingShangProperty().addListener(new ChangeListener<Object>() {
            public void changed(ObservableValue<? extends Object> observable, Object oldValue, Object newValue) {
            	generateBoard(center,partie);
            }
		});
		HBox top = generateScoreboard(partie);
		Rectangle left = new Rectangle(251,485);
		left.setFill(Color.TRANSPARENT);
	    Rectangle right = new Rectangle(262,485);
	    right.setFill(Color.TRANSPARENT);
	    HBox bot = generateFooter(partie);
	    border.setTop(top);
	    border.setLeft(left);
	    border.setRight(right);
	    border.setCenter(center);
	    border.setBottom(bot);
	    //Ajout des éléments à la scene
        root.getChildren().addAll(pane,border);
        Scene jeu = new Scene(root);
        return jeu;
	}
	public HBox generateFooter(Partie partie) {
		HBox hbox = new HBox();
	    hbox.setPadding(new Insets(40, 10, 10, 10));
	    hbox.setSpacing(50);
		hbox.setPrefSize(1000, 70);
		hbox.setMinSize(1000, 70);
		Button btnReturn = new Button();
        btnReturn.setStyle("-fx-background-image: url('"+ absolutePath +"/return.png');-fx-background-repeat: no-repeat;-fx-background-color:transparent;-fx-background-size: cover;");
        btnReturn.setMinSize(250, 63);
        btnReturn.setPrefSize(250, 63);
        btnReturn.setOnAction(new EventHandler<ActionEvent>() {
            public void handle(ActionEvent event) {
            	mainStage.setScene(sceneEngine.get("menu"));
            	
            }
        });
        Label info = new Label("C'est à "+partie.getJoueurCourant().getNom()+" de jouer !");
        info.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 30;");
	    partie.getJoueurCourantProperty().addListener((ObservableValue<? extends Joueur> observable, Joueur oldValue, Joueur newValue) -> {
	    	info.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 30;");
	    	info.setText("C'est à "+newValue.getNom()+" de jouer !");
	    });
	    info.setPrefSize(380, 70);
	    info.setMaxSize(380, 70);
	    info.setAlignment(Pos.CENTER);
	    info.setPadding(new Insets(15,0,0,0));
	    info.setTextFill(Color.WHITE);
	    Button btnPasser = new Button();
	    btnPasser.setStyle("-fx-background-image: url('"+ absolutePath +"/passer.png');-fx-background-repeat: no-repeat;-fx-background-color:transparent;-fx-background-size: cover;");
	    btnPasser.setMinSize(250, 63);
	    btnPasser.setPrefSize(250, 63);
	    btnPasser.setOnAction(new EventHandler<ActionEvent>() {
            public void handle(ActionEvent event) {
            	partie.nextJoueur();
            }
        });
	    partie.getEstPartieTerminee().addListener((ObservableValue<? extends Boolean> observable, Boolean oldValue, Boolean newValue) -> {
	    		btnPasser.setStyle("-fx-background-image: url('"+ absolutePath +"/terminerPartie.png');-fx-background-repeat: no-repeat;-fx-background-color:transparent;-fx-background-size: cover;");
	    		info.setText(partie.getJoueurCourant().getNom() + " a gagné la partie !");
	    		info.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 25;");
	    		btnPasser.setOnAction(new EventHandler<ActionEvent>() {
	                public void handle(ActionEvent event) {
	                	sceneEngine.add("fin", buildFin(partie));
	                    mainStage.setScene(sceneEngine.get("fin"));
	                }
	            });
	    	});
	    partie.getPlateau().getShingShangProperty().addListener((ObservableValue<? extends Boolean> observable, Boolean oldValue, Boolean newValue) -> {
	    	if (newValue) {
	    		btnPasser.setStyle("-fx-background-image: url('"+ absolutePath +"/terminerShingShang.png');-fx-background-repeat: no-repeat;-fx-background-color:transparent;-fx-background-size: cover;");
	    		info.setText(partie.getJoueurCourant().getNom() + " est en train de réaliser un Shing Shang !");
	    		info.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 15;");
	    		btnPasser.setOnAction(new EventHandler<ActionEvent>() {
	                public void handle(ActionEvent event) {
	                	partie.doClearMarquage();
	                	partie.getPlateau().resetTour(false);
	                }
	            });
	    	}
	    	else {
	    		btnPasser.setStyle("-fx-background-image: url('"+ absolutePath +"/passer.png');-fx-background-repeat: no-repeat;-fx-background-color:transparent;-fx-background-size: cover;");
	    		info.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 30;");
	    		info.setText(partie.getJoueurCourant().getNom() + " peut rejouer !");btnPasser.setOnAction(new EventHandler<ActionEvent>() {
	                public void handle(ActionEvent event) {
	                	partie.nextJoueur();
	                }
	            });
	    		
	    	}
	    	
	    });
	    hbox.getChildren().addAll(btnReturn,info,btnPasser);
		return hbox;
	}
	public HBox generateScoreboard(Partie partie) {
		HBox hbox = new HBox();
	    hbox.setPadding(new Insets(10, 10, 21, 10));
	    hbox.setSpacing(10);
	    
	    StackPane stack1 = new StackPane();
	    Rectangle container1 = new Rectangle(130.0, 76.0);
	    container1.setFill(Color.TRANSPARENT);
	    Text infoPlayer1 = new Text(partie.getJoueur1().getNom() + "\n" + partie.getJoueur1().getScore().intValue() + " points");
	    partie.getJoueur1().getScore().addListener((ObservableValue<? extends Number> observable, Number oldValue, Number newValue) -> {
	    	  infoPlayer1.setText(partie.getJoueur1().getNom() + "\n" + newValue.intValue() + " points");
	    });
	    infoPlayer1.setFont(Font.font("Verdana", FontWeight.BOLD, 14));
	    stack1.getChildren().addAll(container1, infoPlayer1);
	    stack1.setAlignment(Pos.CENTER);     // Right-justify nodes in stack
	    StackPane.setMargin(infoPlayer1, new Insets(5, 5, 5, 5)); // Center "?"

	    StackPane stack2 = new StackPane();
	    Rectangle container2 = new Rectangle(128.0, 76.0);
	    container2.setFill(Color.TRANSPARENT);
	    Text infoPlayer2 = new Text(partie.getJoueur2().getNom() + "\n" + partie.getJoueur2().getScore().intValue() + " points");
	    partie.getJoueur2().getScore().addListener((ObservableValue<? extends Number> observable, Number oldValue, Number newValue) -> {
	    	  infoPlayer2.setText(partie.getJoueur2().getNom() + "\n" + newValue.intValue() + " points");
	    });
	    infoPlayer2.setFont(Font.font("Verdana", FontWeight.BOLD, 14));
	    stack2.getChildren().addAll(container2, infoPlayer2);
	    stack2.setAlignment(Pos.CENTER);     // Right-justify nodes in stack
	    StackPane.setMargin(infoPlayer2, new Insets(5, 5, 5, 5)); // Center "?"
	    Label title = new Label("Shing Shang");
	    title.setStyle("-fx-font-family: 'Gang of Three'; -fx-font-size: 60;");
	    title.setPrefSize(700, 76);
	    title.setAlignment(Pos.CENTER);
	    title.setTextFill(Color.WHITE);
	    hbox.getChildren().addAll(stack1,title,stack2);            // Add to HBox from Example 1-2
	    return hbox;
	}
	public void generateBoard(FlowPane flow,Partie partie) {
		flow.getChildren().clear();
		Bushi bush;
		Pane bushImg = null;
        Rectangle r;
        StackPane [][] caseTable = new StackPane[10][10];
        for(int i = 0;i<10;i++) {
        	for(int j = 0;j<10;j++) {
        		bush = partie.getPlateau().getCase(j, i).getElement();
        		caseTable[i][j] = new StackPane();
        		r = new Rectangle(46, 46);
        		r.setFill(Color.TRANSPARENT);
        		r.setStrokeWidth(2);
        		if (partie.getPlateau().getCase(j, i).isHighLighted()) {
        			r.setFill(new Color(0,1.0,0,0.2));
				}
        		else if (partie.getPlateau().getCaseSelectionnee().get() == partie.getPlateau().getCase(j, i)) {
        			r.setStroke(Color.WHITE);
				}
        		else {
        			r.setFill(Color.TRANSPARENT);
        		}
        		if(bush!=null) {
        			switch (bush.getCouleur()) {
					case NOIR:
						switch(bush.getClass().toString()) {
        				case "class jeu.Dragon":
        					bushImg = new Pane();
        					bushImg.setStyle("-fx-background-image: url('"+ absolutePath +"/bushi_dragon_noir.png');-fx-background-repeat: no-repeat;-fx-background-size: cover;");
        					bushImg.setPrefSize(47, 47);
        				break;
        				case "class jeu.Lion":
        					bushImg = new Pane();
        					bushImg.setStyle("-fx-background-image: url('"+ absolutePath +"/bushi_lion_noir.png');-fx-background-repeat: no-repeat;-fx-background-size: cover;");
        					bushImg.setPrefSize(47, 47);
        				break;
        				case "class jeu.Singe":
        					bushImg = new Pane();
        					bushImg.setStyle("-fx-background-image: url('"+ absolutePath +"/bushi_singe_noir.png');-fx-background-repeat: no-repeat;-fx-background-size: cover;");
        					bushImg.setPrefSize(47, 47);
        				break;
        				default:
        					bushImg = new Pane();
        				break;
        			}
						break;
					case ROUGE:
						switch(bush.getClass().toString()) {
        				case "class jeu.Dragon":
        					bushImg = new Pane();
        					bushImg.setStyle("-fx-background-image: url('"+ absolutePath +"/bushi_dragon_rouge.png');-fx-background-repeat: no-repeat;-fx-background-size: cover;");
        					bushImg.setPrefSize(47, 47);
        				break;
        				case "class jeu.Lion":
        					bushImg = new Pane();
        					bushImg.setStyle("-fx-background-image: url('"+ absolutePath +"/bushi_lion_rouge.png');-fx-background-repeat: no-repeat;-fx-background-size: cover;");
        					bushImg.setPrefSize(47, 47);
        				break;
        				case "class jeu.Singe":
        					bushImg = new Pane();
        					bushImg.setStyle("-fx-background-image: url('"+ absolutePath +"/bushi_singe_rouge.png');-fx-background-repeat: no-repeat;-fx-background-size: cover;");
        					bushImg.setPrefSize(47, 47);
        				break;
        				default:
        					bushImg = new Pane();
        				break;
        			}
						break;
					default:
						break;
					}
        			caseTable[i][j].getChildren().add(bushImg);
        				
        		}
        		caseTable[i][j].getChildren().add(r);
        		caseTable[i][j].setOnMouseClicked(new MouseEventWithCoord(j, i)
        	        {
        	            @Override
        	            public void handle(MouseEvent t) {
        	            	partie.getPlateau().clicPlateau(partie,getX(),getY());
        	            }
        	        });
        		caseTable[i][j].setPrefSize(47.5, 47.5);
        		caseTable[i][j].setMaxSize(47.5, 47.5);
        		flow.getChildren().add(caseTable[i][j]);
        	}
        }
	}
}
