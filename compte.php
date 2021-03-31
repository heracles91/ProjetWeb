<?php
// On démarre la session 
session_start();


if ($_GET['deconnexion']){
    $_SESSION['client_connecte']=False;
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="css/styles.css" rel="stylesheet"  />
    <title>Mon compte</title>
</head>
<body>

    
    <section class="top-page">
        <div class="header">
            <header>
                <img src="images/logo.png" alt="Logo du site">
                <nav>
                    <li><a class="boutton-haut" href="index.php">Accueil</a> </li>
                    <li><a class="boutton-haut" href="index.php #agents">Nos agents</a> </li> 
                    <li><a class="boutton-haut" href="form.php">Devenir agent</a> </li>
                    
                </nav>
            </header>
            <div class="header-right">
                <?php 
                    if ($_SESSION['client_connecte']){
                        echo ' <a class="boutton-haut bouton-reservations" href="compte.php?deconnexion=True"><i class="fas fa-user"></i> Deconnexion</a> ';
                    }

                    else{
                        echo '<a class="boutton-haut bouton-reservations" href="connexion.php"><i class="fas fa-user"></i> Connexion</a>  ';
                    }
                ?>        
            </div>
            
        </div>




</body>
</html>