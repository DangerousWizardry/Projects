<!DOCTYPE html>
<html>
<head>
	<title>UNASS Calvados</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="assets/logo_mini.png" />
    <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/container.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/header.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/menu.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/image.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/icon.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/grid.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/segment.min.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/button.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="semantic/semantic.min.js"></script>
    <script type="text/javascript" src="js/util.js"></script>
</head>
<body>
    <?php include_once("sidebar.php"); ?>
    <?php include_once("header.php"); ?>
    <div id="content">
        <div class="ui container">
            <h1>Demande de poste de secours</h1>
            <img class="ui medium right floated image" src="assets/img3.jpg">
            <p>Vous êtes une association, une entreprise, un organisme public ou un individuel et vous souhaitez qu'une de nos équipes intervienne sur votre événement, alors ce formulaire est fait pour vous</p>
            <p>Il permet d'estimer le niveau de "risque" de votre événements pour ensuite définir les moyens à déployer nécessaire sur votre événement</p>
            <p>Celui ci nous donne également la possibilité d'estimer le coût pour l'organisateur de ce poste de secours, car l'action de nos secouristes bien que bénévole engendre de nombreux frais (utilisation des véhicules, du matériel de secours, entretien des locaux, des tenues, ...).</p>
            <div class="ui grid">
                <div class="sixteen wide tablet sixteen wide computer column">
                    <form class="ui form">
                        <h4 class="ui dividing header">Identité de l'organisme demandeur</h4>
                        <div class="field">
                            <label>Raison Sociale</label>
                            <input type="text" name="" placeholder="Raison Sociale">
                        </div>
                        <div class="field">
                            <label>Adresse</label>
                            <input type="text" name="" placeholder="Numéro,Voie,Code Postal, Ville">
                        </div>
                        <div class="field">
                            <label>Adresse mail</label>
                            <input type="text" name="" placeholder="xxxx@xxxx.xx">
                        </div>
                        <div class="field">
                            <label>N° de téléphone</label>
                            <div class="fields">
                                <div class="eight wide field">
                                    <input type="text" name="" placeholder="Téléphone Fixe">
                                </div>
                                <div class="eight wide field">
                                    <input type="text" name="" placeholder="Téléphone Portable">
                                </div>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Représenté par</label>
                                <input type="text" name="" placeholder="Nom du représentant">
                            </div>
                            <div class="eight wide field">
                                <label>Fonction</label>
                                <input type="text" name="" placeholder="Fonction du représentant">
                            </div>
                        </div>
                        <h4 class="ui dividing header">Informations sur la manifestation</h4>
                        <div class="field">
                            <label>Dénomination de la manifestation</label>
                            <input type="text" name="" placeholder="Raison Sociale">
                        </div>
                        <div class="field">
                            <label>Type de manifestation (activité principale)</label>
                            <input type="text" name="" placeholder="(Exemple : Course à pied, Concert, ...)">
                        </div>
                        <div class="field">
                            <label>Adresse de la manifestation</label>
                            <input type="text" name="" placeholder="Numéro,Voie,Code Postal, Ville">
                        </div>
                        <div class="field">
                            <label>Horaire d'arrivée et de départ des secouristes</label>
                            <input type="text" name="" placeholder="(Exemple : le 18/06 de 14:00 à 21:00, le 19/06 de 10:00 à 23:00)">
                        </div>
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Nom du contact sur place</label>
                                <input type="text" name="" placeholder="Nom du contact">
                            </div>
                            <div class="eight wide field">
                                <label>N° de téléphone</label>
                                <input type="text" name="" placeholder="N° de téléphone du contact">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="eight wide field">
                                <div class="grouped fields">
                                    <label for="circuit">Circuit ?</label>
                                    <div class="field">
                                      <div class="ui radio checkbox">
                                        <input type="radio" name="circuit" checked="" tabindex="0" class="hidden">
                                        <label>Oui, circuit ouvert</label>
                                      </div>
                                    </div>
                                    <div class="field">
                                      <div class="ui radio checkbox">
                                        <input type="radio" name="circuit" tabindex="0" class="hidden">
                                        <label>Oui, circuit fermé</label>
                                      </div>
                                    </div>
                                    <div class="field">
                                      <div class="ui radio checkbox">
                                        <input type="radio" name="circuit" tabindex="0" class="hidden">
                                        <label>Non</label>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="eight wide field">
                                <label>Superficie du terrain</label>
                                <input type="text" name="" placeholder="Estimation en ha ou en m²">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Distance maxi entre les 2 points les plus éloignés du site</label>
                                <input type="text" name="" placeholder="Estimation en m">
                            </div>
                            <div class="eight wide field">
                                <label>Risque Particulier</label>
                                <input type="text" name="" placeholder="(Exemple : Alcool, Public violent, Sport Dangereux, Neige, ...)">
                            </div>
                        </div>
                        <h4 class="ui dividing header">Nature du dispositif de secours</h4>
                        <div class="field">
                            <label class="ui blue label">Public assitants à la manifestation</label>
                            <div class="fields">
                                <div class="eight wide field">
                                    <label>Effectif public moyen :</label>
                                    <input type="text" name="" placeholder="Estimation en nombre de personnes">
                                </div>
                                <div class="eight wide field">
                                    <div class="grouped fields">
                                        <label for="dpspub">Dispositif demandé pour le public :</label>
                                        <div class="field">
                                          <div class="ui radio checkbox">
                                            <input type="radio" name="dpspub" checked="" tabindex="0" class="hidden">
                                            <label>Oui</label>
                                          </div>
                                        </div>
                                        <div class="field">
                                          <div class="ui radio checkbox">
                                            <input type="radio" name="dpspub" checked="" tabindex="0" class="hidden">
                                            <label>Non</label>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fields">
                                <div class="six wide field">
                                    <label>Maximum instantané</label>
                                    <input type="text" name="" placeholder="Estimation en nombre de personnes">
                                </div>
                                <div class="five wide field">
                                    <label>Cumul sur la journée</label>
                                    <input type="text" name="" placeholder="Estimation en nombre de personnes">
                                </div>
                                <div class="five wide field">
                                    <label>Tranche d'âge</label>
                                    <input type="text" name="" placeholder="(Exemple: 3-11 ans, 30-60ans, ...)">
                                </div>
                            </div>
                            <div class="field">
                                <label>Demande spécifique de dispositif pour le public</label>
                                <input type="text" name="" placeholder="...">
                            </div>
                        </div>
                        <div class="field">
                            <label class="ui teal label">Acteurs participants à la manifestation</label>
                            <div class="fields">
                                <div class="eight wide field">
                                    <label>Effectif acteurs :</label>
                                    <input type="text" name="" placeholder="Nombre d'acteurs">
                                </div>
                                <div class="eight wide field">
                                    <div class="grouped fields">
                                        <label for="dpsact">Dispositif demandé pour les acteurs :</label>
                                        <div class="field">
                                          <div class="ui radio checkbox">
                                            <input type="radio" name="dpsact" checked="" tabindex="0" class="hidden">
                                            <label>Oui</label>
                                          </div>
                                        </div>
                                        <div class="field">
                                          <div class="ui radio checkbox">
                                            <input type="radio" name="dpsact" checked="" tabindex="0" class="hidden">
                                            <label>Non</label>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fields">
                                <div class="six wide field">
                                    <label>Maximum instantané</label>
                                    <input type="text" name="" placeholder="Estimation en nombre de personnes">
                                </div>
                                <div class="five wide field">
                                    <label>Cumul sur la journée</label>
                                    <input type="text" name="" placeholder="Estimation en nombre de personnes">
                                </div>
                                <div class="five wide field">
                                    <label>Tranche d'âge</label>
                                    <input type="text" name="" placeholder="(Exemple: 3-11 ans, 30-60ans, ...)">
                                </div>
                            </div>
                            <div class="field">
                                <label>Demande spécifique de dispositif pour les acteurs</label>
                                <input type="text" name="" placeholder="...">
                            </div>
                        </div>
                        <h4 class="ui dividing header">Activité du rassemblement</h4>
                        <div class="grouped fields">
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="acti" checked="" tabindex="0" class="hidden">
                                <label><b>Public Assis :</b> spectacle, cérémonie culturelle, réunion publique, restauration, rendez-vous sportif…</label>
                              </div>
                            </div>
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="acti" checked="" tabindex="0" class="hidden">
                                <label><b>Public debout :</b> cérémonie culturelle, réunion publique, restauration, exposition, foire, salon agricole</label>
                              </div>
                            </div>
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="acti" checked="" tabindex="0" class="hidden">
                                <label><b>Public debout (statique):</b>  spectacle avec public statique, fête foraine, rendez-vous sportif avec protection du public par
rapport à l’évènement…</label>
                              </div>
                            </div>
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="acti" checked="" tabindex="0" class="hidden">
                                <label><b>Public debout (dynamique) :</b>  spectacle avec public dynamique, danse, carnaval, spectacle de rue, grande parade, rendezvous
sportif sans protection du public par rapport à l’événement…</label>
                              </div>
                            </div>
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="acti" checked="" tabindex="0" class="hidden">
                                <label><b>Evénement se déroulant sur plusieurs jours avec présence permanente du public :</b> hébergement sur place ou à proximité…</label>
                              </div>
                            </div>
                        </div>
                        <h4 class="ui dividing header">Environement et accessibilité du site</h4>
                        <div class="inline fields">
                            <label for="struct">Structure</label>
                            <div class="three wide field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="struct" checked="" tabindex="0" class="hidden">
                                <label>Permanente</label>
                              </div>
                            </div>
                            <div class="three wide field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="struct" tabindex="0" class="hidden">
                                <label>Temporaire</label>
                              </div>
                            </div>
                            <div class="ten wide field">
                                <label>Type de structure</label>
                                <input type="text" name="" placeholder="Chapiteau, Gymnase, ...">
                            </div>
                        </div>
                        <div class="inline fields">
                            <label for="voiep">Voie Publique</label>
                            <div class="three wide field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="voiep" checked="" tabindex="0" class="hidden">
                                <label>Oui</label>
                              </div>
                            </div>
                            <div class="three wide field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="voiep" tabindex="0" class="hidden">
                                <label>Non</label>
                              </div>
                            </div>
                            <div class="ten wide field">
                                <label>Dimension de l'espace naturel</label>
                                <input type="text" name="" placeholder="en ha ou m²">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Distance de brancardage</label>
                                <input type="text" name="" placeholder="Estimation en m">
                            </div>
                            <div class="eight wide field">
                                <label>Longueur de la pente du terrain</label>
                                <input type="text" name="" placeholder="Estimation en m">
                            </div>
                        </div>
                        <div class="field">
                            <label>Autre conditions d'accès difficile</label>
                            <input type="text" name="" placeholder="Terrain rocailleux, vallonné, ...">
                        </div>
                        <h4 class="ui dividing header">Caractéristiques de l’environnement ou de l’accessibilité au site</h4>
                        <div class="grouped fields">
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="envstruct" checked="" tabindex="0" class="hidden">
                                <label><b>Structures Permanentes :</b>  bâtiment, salle en dur, voies publiques ou rues avec accès dégagés, conditions d’accès aisés</label>
                              </div>
                            </div>
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="envstruct" checked="" tabindex="0" class="hidden">
                                <label><b>Structures Non Permanentes :</b> gradins, tribunes, chapiteaux, espaces naturels ≤ 2 hectares, brancardage entre 150 m et
300 m, terrain en pente sur plus de 100 m</label>
                              </div>
                            </div>
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="envstruct" checked="" tabindex="0" class="hidden">
                                <label><b>Espaces Naturels (1):</b> Surface entre 2 hectares et 5 hectares, brancardage entre 300 m et 600 m, terrain en pente sur plus
de 150 m, autres conditions d’accès difficiles</label>
                              </div>
                            </div>
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="envstruct" checked="" tabindex="0" class="hidden">
                                <label><b>Espaces Naturels (2):</b>  Surface ≥ 5 hectares, brancardage ≥ 600 m, terrain en pente sur plus de 300 m, autres conditions
d’accès difficiles, progression des secours rendue difficile par la présence du public</label>
                              </div>
                            </div>
                        </div>
                        <h4 class="ui dividing header">Structures fixes de secours publics à proximité</h4>
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Centre d'incendie et de secours de :</label>
                                <input type="text" name="" placeholder="(Exemple : Ouistreham, Caen Couvrechef, ...)">
                            </div>
                            <div class="eight wide field">
                                <label>Distance routière</label>
                                <input type="text" name="" placeholder="(Exemple : 10km)">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Centre hospitalier :</label>
                                <input type="text" name="" placeholder="(Exemple : CHU de CAEN, CHR de Caen, ...)">
                            </div>
                            <div class="eight wide field">
                                <label>Distance routière</label>
                                <input type="text" name="" placeholder="(Exemple : 10km)">
                            </div>
                        </div>
                        <h4 class="ui dividing header">Délai d'intervention des secours publics</h4>
                        <div class="grouped fields">
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="envstruct" checked="" tabindex="0" class="hidden">
                                <label>Moins de 10 minutes</label>
                              </div>
                            </div>
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="envstruct" checked="" tabindex="0" class="hidden">
                                <label>Entre 10 et 20 minutes</label>
                              </div>
                            </div>
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="envstruct" checked="" tabindex="0" class="hidden">
                                <label>Entre 20 et 30 minutes</label>
                              </div>
                            </div>
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="envstruct" checked="" tabindex="0" class="hidden">
                                <label>Supérieur à 30 minutes</label>
                              </div>
                            </div>
                        </div>
                        <h4 class="ui dividing header">Autres secours présents sur place</h4>
                        <div class="fields">
                            <div class="ten wide field">
                                <label>Médecin - Nom :</label>
                                <input type="text" name="" placeholder="Nom du médecin">
                            </div>
                            <div class="six wide field">
                                <label>Numéro de telephone</label>
                                <input type="text" name="" placeholder="Numéro du médecin">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="ten wide field">
                                <label>Infirmier - Nom :</label>
                                <input type="text" name="" placeholder="Nom du Infirmier">
                            </div>
                            <div class="six wide field">
                                <label>Numéro de telephone</label>
                                <input type="text" name="" placeholder="Numéro du Infirmier">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="ten wide field">
                                <label>Kiné - Nom :</label>
                                <input type="text" name="" placeholder="Nom du Kiné">
                            </div>
                            <div class="six wide field">
                                <label>Numéro de telephone</label>
                                <input type="text" name="" placeholder="Numéro du Kiné">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="ten wide field">
                                <label>Ambulance privée - Nom :</label>
                                <input type="text" name="" placeholder="Nom de l'ambulance privée">
                            </div>
                            <div class="six wide field">
                                <label>Numéro de telephone</label>
                                <input type="text" name="" placeholder="Numéro de l'ambulance privée">
                            </div>
                        </div>
                        <div class="field">
                            <label>Autres dispositif</label>
                            <input type="text" name="" placeholder="Libre">
                        </div>
                        <h4 class="ui dividing header">Logistique mise en place par l'organisateur</h4>
                        <div class="inline fields">
                            <label for="localtente">Local ou tente à disposition ?</label>
                            <div class="three wide field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="localtente" checked="" tabindex="0" class="hidden">
                                <label>Local</label>
                              </div>
                            </div>
                            <div class="three wide field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="localtente" tabindex="0" class="hidden">
                                <label>Tente</label>
                              </div>
                            </div>
                            <div class="three wide field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="localtente" tabindex="0" class="hidden">
                                <label>Non</label>
                              </div>
                            </div>
                            <div class="seven wide field">
                                <label>Localisation </label>
                                <input type="text" name="" placeholder="(Exemple : Droite scène 1)">
                            </div>
                        </div>
                        <div class="inline fields">
                            <label for="san">Sanitaire</label>
                            <div class="eight wide field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="san" checked="" tabindex="0" class="hidden">
                                <label>Oui</label>
                              </div>
                            </div>
                            <div class="eight wide field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="san" tabindex="0" class="hidden">
                                <label>Non</label>
                              </div>
                            </div>
                        </div>
                        <div class="inline fields">
                            <label for="elec">Electricité</label>
                            <div class="eight wide field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="elec" checked="" tabindex="0" class="hidden">
                                <label>Oui</label>
                              </div>
                            </div>
                            <div class="eight wide field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="elec" tabindex="0" class="hidden">
                                <label>Non</label>
                              </div>
                            </div>
                        </div>
                        <div class="inline fields">
                            <label for="eau">Point d'eau</label>
                            <div class="eight wide field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="eau" checked="" tabindex="0" class="hidden">
                                <label>Oui</label>
                              </div>
                            </div>
                            <div class="eight wide field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="eau" tabindex="0" class="hidden">
                                <label>Non</label>
                              </div>
                            </div>
                        </div>
                        <div class="field">
                            <label>Autre moyen logistique mis à disposition </label>
                            <input type="text" name="" placeholder="Libre">
                        </div>
                        <p>Une fois cette demande envoyée, une réponse vous sera adressée par mail sous 48h (jour ouvrés)</p>
                        <button class="ui button primary" name="sendrequest">Envoyer la demande</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("footer.php"); ?>
    <script type="text/javascript">
        $('.ui.radio.checkbox').checkbox();
    </script>
</body>
</html>