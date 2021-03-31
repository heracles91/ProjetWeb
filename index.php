
<?php
// On démarre la session 
session_start();

if ($_SESSION['client_connecte']==False){
    $_SESSION['client_connecte']=False;
}

else{
    $_SESSION['client_connecte']=True;
}



?>

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
    <style>
        input[type=submit] {
			color: black;
			border: none;
			border-radius: 4px;
			cursor: pointer;
            padding: 5px 5px;
		}

		select {
			width: 45%;
			padding: 5px 0px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

    </style>
    <!-- on inclut jQuery via CDN -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body>
    
    <section class="top-page">
        <div class="header">
            <header>
                <img src="images/logo.png" alt="Logo du site">
                <nav>
                    <li><a class="boutton-haut" href="">Accueil</a> </li>
                    <li><a class="boutton-haut" href="#agents">Nos agents</a> </li> 
                    <li><a class="boutton-haut" href="form.php">Devenir agent</a> </li>
                    
                </nav>
            </header>
            <div class="header-right">
                <?php 
                    if ($_SESSION['client_connecte']){
                        echo ' <a class="boutton-haut bouton-reservations" href="compte.php"><i class="fas fa-user"></i> Mon compte</a> ';
                    }

                    else{
                        echo '<a class="boutton-haut bouton-reservations" href="connexion.php"><i class="fas fa-user"></i> Connexion</a>  ';
                    }
                ?>        
            </div>
        </div>
        
        <div class="landing-page">
            <h1 class="gros-titre"> Vous n'avez qu'à choisir !</h1>
            <h2 class="sous-titre">La référence pour votre protection rapprochée...</h2>
            
            <a class="scroll" href="#services">Scroll <i class="fas fa-angle-down"> </i></a>
        </div> 
    </section>
    <section class="services" id="services">
        <div class="infos-box">
            <h6 class="infos-titre">Un concept innovant</h6>
            <span class="infos-text">Le premier site de réservation d'agents de sécurité, de garde du corps, sur lequel vous pouvez postulez !</span>
        </div>
        
        <hr class="trait">

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
                        list($moyenne_note2,$moyenne_note,$evaluation,$nombre_de_notes,$rajout_du_0,$verif)=note($data['id']); //on se sert de la fonction note() importée depuis fonctions.php
                        echo                                                        
                            '<a  href="infos_supplementaires.php?id='.$data['id'].'" class="agent-box numero'.$x.'">
                            
                            <img src="images/'.$data['photo'].'" width="300" height="400">
                                <div class="agent-detail">
                                    <p class="agent-nom" >'.$data['prenom'].' '.$data['nom'].'</p>
                                    <div class="note-box">
                                        <p class="agent-note">'.str_repeat('<i class="fas fa-star"></i>',$moyenne_note2/2).str_repeat('<i class="fas fa-star-half-alt"></i>',$verif).str_repeat('<i class="far fa-star"></i>',5-$moyenne_note2/2).' ('.round ($moyenne_note, 1).$rajout_du_0.') </p>
                                        <p class="nombre-note">'.$nombre_de_notes.' '.$evaluation.'</p>
                                    </div>
                                </div>
                                <div class="agent-detail2">
                                    <div class="detail2"> <span class="titre-detail">Prix </span>: <span class="prix-detail">'.$data['prix_journee'].'</span>€/jour</div> 
                                    <div class="index-caracteristique">
                                        <form name="infos-sup" method="post" action="infos_supplementaires.php?id='.$data['id'].'" > 
                                        '.substr ($data['caracteristique'],0,60)// substr permet de ne renvoyer qu'une partie d'une chaine de caracteres (ici 60)
                                        .'... <input type="submit" name="valider" value="Voir plus" />     
                                        </form> 
                                    </div> 
                                </div>
                                
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
        <p class="credits">Réalisé par Marius LACOUR, Kevin KAMENI, Jade GAY</p>
        <a href="" class="cgv">Conditions générales de ventes</a>
    </footer>
    <!-- votre propre fichier dans le dossier de votre projet -->
    <script>
        $(".gros-titre").fadeIn(10000)
    </script>
    
</body>
</html>


