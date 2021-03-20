<?php
include("fonctions.php");
?> 


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MonAgent : Accueil</title>
    <link  href="css/styles.css" rel="stylesheet"  />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
    <link rel="icon" type="image/x-icon" href="images/logo.png"/><link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />

</head>
<body>
    <section class="top-page">
        <header>
            <img src="images/logo.png" alt="Logo du site">
            <nav>
                <li><a class="boutton-haut" href="">Accueil</a> </li>
                <li><a class="boutton-haut" href="#agents">Nos agents</a> </li>
                <li><a class="boutton-haut" href="form.php">Devenir agent</a> </li>
            </nav>
        </header>
        <div class="landing-page">
            <h1 class="gros-titre"> Vous n'avez qu'à choisir !</h1>
            <h2 class="sous-titre">La référence pour votre protection rapprochée...</h2>
            
            <a class="scroll" href="#agents">Scroll <i class="fas fa-angle-down"> </i></a>
        </div> 
    </section>
    <section class="services">
        <div class="icon-div">
            <div class="service-item">
                <i class="fas fa-handshake icon2"></i>
                <p class="text-icon">Paiement sécurisé</p>
                <!-- <i class="fab fa-apple-pay"></i>
                <i class="fab fa-bitcoin"></i>
                <i class="fab fa-ethereum"></i> -->
            </div>
            <div class="service-item">
                <i class="fas fa-bed icon2"></i>
                <p class="text-icon">Protection 24h/24 7j/7</p>
                <!-- <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-paypal"></i>
                <i class="fab fa-cc-mastercard"></i> -->
            </div>
            <div class="service-item">
                <i class="fas fa-check-square icon2"></i>
                <p class="text-icon">Satisfait ou remboursé le 1er mois</p>
            </div>
        </div>
        
    </section>
    <section class="meilleurs-agents" id="agents">
        <h2 class="titre">
            Nos agents
        </h2>
        <div class="div-best-agents ">
                <?php
                //on se connecte
                connectMaBase();
                //requete SQL
                $sql='SELECT * FROM agents_liste';
                $req=mysql_query($sql) or die('ERREUR SQL ! <br>'.$sql.'<br>'.mysql_error());
                
                $x=0;
                    while ($data = mysql_fetch_array($req)) {
                        $sql2='SELECT AVG(note) FROM notes_agents WHERE id_agent='.$data['id'].'';            /*requete sql qui prend la moyenne des               */
                        $req2=mysql_query($sql2)  or die('ERREUR SQL ! <br>'.$sql2.'<br>'.mysql_error());    /*notes dans la table notes_agents pour chaque agents*/
                        $data2 = mysql_fetch_array($req2);
                        $moyenne_note = $data2['AVG(note)'];  /*on recupere le résultat de la requete sql, c'est ce qui sera la note affichée pour chaque agents*/
                        $verif=0;
                        $moyenne_note2=round($moyenne_note * 2) ;  /*permet a l'aide d'arrondis           */
                        if (fmod ( $moyenne_note2, 2 )==1.0){     /*d'afficher les notes avec des étoiles*/
                            $verif=1;
                            }
                        $sql3='SELECT COUNT(note) FROM notes_agents WHERE id_agent='.$data['id'].'';          /*requete sql qui compte le nombre de                */
                        $req3=mysql_query($sql3)  or die('ERREUR SQL ! <br>'.$sql2.'<br>'.mysql_error());    /*notes dans la table notes_agents pour chaque agents*/
                        $data3 = mysql_fetch_array($req3);
                        $nombre_de_notes = $data3['COUNT(note)'];
                        $evaluation="évaluations";
                        if ($nombre_de_notes<=1){
                            $evaluation="évaluation";
                            if ($nombre_de_notes==0){
                                $nombre_de_notes="Aucune";
                            }                           
                        }
                        $rajout_du_0="";                                /*rajoute .0 après les notes moyennes qui sont entière */
                        if (fmod(round ($moyenne_note, 1)*2,2)==0){    /* (effet de style)                                    */
                            $rajout_du_0=".0";
                        }
                        echo                                                        
                            '<a  class="agent-box numero'.$x.'">
                            <form name="note" method="post" action="traitement.php?id='.$data['id'].'" >
                            <img src="images/'.$data['photo'].'" width="300" height="400">
                                <div class="agent-detail">
                                    <p class="agent-nom" >'.$data['prenom'].' '.$data['nom'].'</p>
                                    <div class="note-box">
                                        <p class="agent-note">'.str_repeat('<i class="fas fa-star"></i>',$moyenne_note2/2).str_repeat('<i class="fas fa-star-half-alt"></i>',$verif).str_repeat('<i class="far fa-star"></i>',5-$moyenne_note2/2).' ('.round ($moyenne_note, 1).$rajout_du_0.') </p>
                                        <p class="nombre-note">'.$nombre_de_notes.' '.$evaluation.'</p>
                                    </div>
                                </div>
                                <div class="agent-detail2">
                                    <p class="detail2"> Prix : '.$data['prix_journee'].'€/jour</p>
                                    <p class="detail2">Détail : '.$data['caracteristique'].'</p>    
                                    <div class"donner-note-box">                               
                                        <td> Votre avis nous intéresse : <br>
                                            <SELECT name="note" required>
                                                <OPTION value="null">Selectionner</OPTION>
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
                                        </td>                                                      
                                        <input type="submit" name="valider" value="Notez cet agent" />
                                    </div>                
                                </div>
                                </form> 
                            </a>';
                            $x=$x+1;
                    }
                    mysql_free_result($req); //on libere mysql de la requete
                    mysql_close(); //on ferme                   
                    
                ?> 
            
        </div>
    </section>
    <hr>
    <section class="bas-de-page">   
        <img class="image-bdp" src="images/logo.png" alt="Logo du site">
        <div class="payment-method">
            <i class="fab fa-cc-visa icon3"></i>
            <i class="fab fa-cc-paypal icon3"></i>
            <i class="fab fa-cc-mastercard icon3"></i>
            <i class="fab fa-apple-pay icon3"></i>
            <i class="fab fa-bitcoin icon3"></i>
            <i class="fab fa-ethereum icon3"></i>
        </div>
        <p><i class="fas fa-phone-alt coord"></i> Tel : 007 <br>
        <i class="fas fa-envelope coord"></i> Mail : info@monagent.com <br>
        <i class="far fa-clock coord"></i> Dispo : 24h/24 7j/7</p>
    </section>
    <hr>
    <footer>
        <p class="copyright">&copy; 2021 - Mon Agent </p>
        <a href="" class="cgv">Conditions générales de ventes</a>
    </footer>
    
</body>
</html>
