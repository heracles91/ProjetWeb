
<?php
// On démarre la session 
session_start();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Agents</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
    <link  href="css/styles.css" rel="stylesheet"  />
    <link rel="icon" type="image/x-icon" href="images/logo.png"/><link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
    <style>
    body {
        background-color: rgb(59, 59, 59); 
        height: 100%;
    }

    .submit{
        width: 90px;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        height: 40px;
        font-size: 13px;
        padding:0;
        margin-top: 15px;
    }

    .reset{
        width: 90px;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        height: 40px;
        font-size: 13px;
        padding:0;
        margin-top: 15px;
    }
    .valider-note{
        background-color: rgb(57, 59, 63);
        width: 150px;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        height: 40px;
        font-size: 13px;
        padding:0;
        margin-top: 5px;
        font-size: 16px;
    }

    .valider-note:hover{
        background-color: rgb(114, 114, 114);
    }


    input[type=date] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        background-color: rgb(255,255,255);
        color: black;
        border: none;
        
        
	}

    select {
			width: 35%;
			padding: 5px 0px;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
            height: 40px;
            margin-left:20px;
            background-color: rgb(255,255,255);
            color: black;
            border: none;
            font-size: 15px;
		}

    label{
        font-size: 20px;
        color: rgb(0, 0, 0);
    }
    </style>
</head>
<body>
    <section class="top-page2">
        <header>
            <img src="images/logo.png" alt="Logo du site">
            <nav>
                <li><a class="boutton-haut" href="index.php">Accueil</a> </li>
                <li><a class="boutton-haut" href="index.php #agents">Nos agents</a> </li>
                <li><a class="boutton-haut" href="form.php">Devenir agent</a> </li>
            </nav>
        </header>
    </section>
    <?php
    include("fonctions.php");
    connectMaBase();
    
    //récuperation des données sur l'agents
    $id=$_GET['id'];
    $note=$_POST['note'];
    $sql = 'SELECT * FROM agents_liste WHERE id='.$id.'';
    $req1= mysql_query($sql) or die('ERREUR SQL ! <br>'.$sql.'<br>'.mysql_error());
    $data1=mysql_fetch_array($req1);
    $caracteristique = $data1['caracteristique'];
    $image = $data1['photo'];
    $nom = $data1['nom'];
    $prenom = $data1['prenom'];
    $prix = $data1['prix_journee'];

    //récuperation des données dans la table des réservation pour cet agent
    $sql2 = 'SELECT * FROM reservations WHERE id_agent='.$id.'';
    $req2= mysql_query($sql2) or die('ERREUR SQL ! <br>'.$sql2.'<br>'.mysql_error());

    list($moyenne_note2,$moyenne_note,$evaluation,$nombre_de_notes,$rajout_du_0,$verif)=note($id); //on se sert de la fonction note() importée depuis fonctions.php
    
    echo '
    <div class="sup-box">
        <img class="sup-img" src="images/'.$image.'" width="450" height="600">
        <div class="sup-right-box">
            <div class="sup-nom">
                <span> '.$prenom.' </span><span> '.$nom.' </span>
            </div>
            <div class="sous-le-nom">
                <div class="note-box2">
                    <div class="sup-titre-detail2">
                        Notes :
                    </div>
                    <span class="sup-note"> <span class="agent-note2">'.str_repeat('<i class="fas fa-star"></i>',$moyenne_note2/2).str_repeat('<i class="fas fa-star-half-alt"></i>',$verif).str_repeat('<i class="far fa-star"></i>',5-$moyenne_note2/2).'</span>('.round ($moyenne_note, 1).$rajout_du_0.')   </span>
                    <span class="nombre-note2 ">'.$nombre_de_notes.' '.$evaluation.'</span>
                </div>
                <div class="sup-detail2"> <span class="sup-titre-detail2">Prix :</span> <span class="sup-prix-detail plus">'.$prix.'</span><span class="plus">€/jour</span></div>
            </div>
            <hr class="sup-hr">
            <div class="sup-bas-box">
                <div class="sup-resa-left">
                    <div class="sup-caracterisqtique"> 
                        <div class="sup-titre-detail2">
                                Détail : 
                        </div>
                        <div class="sup-texte-detail plus">'
                            .$caracteristique.' 
                        </div>
                    </div>
                    <div class="sup-resa-left-bottom">
                        <div class"donner-note-box">
                            <form name="note" method="post" action="traitement.php?id='.$id.'&from_infos_sup=True" >                          
                                <span class="sup-titre-detail3">Votre avis nous intéresse :  </span><br>
                                    <SELECT name="note" required>
                                        <OPTION value="">Selectionner</OPTION>
                                        <OPTION>0</OPTION>
                                        <OPTION>0.5</OPTION>
                                        <OPTION>1</OPTION>
                                        <OPTION>1.5</OPTION>
                                        <OPTION>2</OPTION>
                                        <OPTION>2.5</OPTION>
                                        <OPTION>3</OPTION>
                                        <OPTION>3.5</OPTION>
                                        <OPTION>4</OPTION>
                                        <OPTION>4.5</OPTION>
                                        <OPTION>5</OPTION>
                                    </SELECT>
                                                                                     
                                <input type="submit" name="valider" value="Notez cet agent" class="valider-note" />
                            </form> 
                        </div>     
                        <div class="consulter-date"> 
                            <div class="sup-titre-detail3">
                                    Consultez les dates déja prises : 
                            </div>
                            <button id="btnPopup" class="btnPopup">Afficher la liste</button>
                            <div id="overlay" class="overlay">
                                <div id="popup" class="popup">
                                <h2 class="titre-liste-resa">
                                    Liste des réservations
                                    <span id="btnClose" class="btnClose">&times;</span>
                                </h2>
                                    <div>';
                                    
                                    
                                    if (mysql_num_rows($req2) == 0){ //si la requete sql ne renvoie rien c'est qu'il n'y a pas de resa pour cet agents, donc on affiche une phrase
                                        echo 'Aucune réservation pour le moment';
                                    }

                                    else{
                                        echo '<table border>
                                                <tr>
                                                    <th> Date de début </th>
                                                    <th> Date de fin </th>
                                                </tr>';

                                        while ($data2 = mysql_fetch_array($req2)) {                                   
                                            echo'
                                            <tr><td>'.date("j F Y", strtotime($data2['premier_jour'])).'</td>
                                            <td>'.date("j F Y", strtotime($data2['dernier_jour'])).'</tr>'; //date() permet un bel affichage des dates                            
                                                }

                                            echo '</table>';
                                    }
                                    
    echo '
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="sup-resa-right">
                    <form id="reservation" name="reservation" method="post" action="ajout_resa.php?id='.$id.'">
                        <div class="sup-resa-titre sup-titre-detail2">
                            Réservation :
                        </div>
                        <div class="sup-resa-box">
                                <label for="premier-jour" class="plus">Jour de début :</label>
                            <input id="premier-jour" name="premier-jour" class="cellule" type="date" min="'.date('Y-m-d').'" max="2021-12-31" required/>
                                <label for="dernier-jour" class="plus">Jour de fin :</label>
                            <input id="dernier-jour" name="dernier-jour" class="cellule" type="date" min="'.date('Y-m-d').'" max="2021-12-31" required/>
                            <div>
                                <input class="submit" type="submit" name="valider" value="RESERVER"  />
                                <input id="boutonReset" class="reset" type="reset" value="Effacer" />
                            </div>  
                    </form>';

    if ($_SESSION['client_connecte']==False){
        echo ' 
                            <div class="erreur erreur_connexion">
                                <i class="fas fa-exclamation-triangle"></i> Veuillez d\'abord vous connecter
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        
    }

                    
    if  ($_GET['erreur_date']){ //affiche une erreur si le créneau n'est pas dans le bon sens 
        echo '
                            <div class="erreur erreur_date">
                                <i class="fas fa-exclamation-triangle"></i> Veuillez renseignez un créneau valide
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }

    if ($_GET['erreur_date_deja_prise']){ //affiche une erreur si la date est déja prise
        echo '
                        <div class="erreur erreur_date_deja_prise">
                        <i class="fas fa-exclamation-triangle"></i> Cette date est déja prise
                        </div>
                    </div>
                </div>
            </div>';
    }
    else{
        echo '
                    </div>
                </div>
            </div>';
    }
    ?>


    <script src="script.js"></script>
</body>
</html>



