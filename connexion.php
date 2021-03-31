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
    <link  href="css/connexion.css" rel="stylesheet"  />
    <title>Document</title>
    <style>
    
    </style>
</head>
<body>
    <div class="header">
            <img src="images/logo.png" alt="Logo du site">
            <nav>
                <li><a class="boutton-haut" href="index.php">Accueil</a> </li>
                <li><a class="boutton-haut" href="index.php #agents">Nos agents</a> </li> 
                <li><a class="boutton-haut" href="form.php">Devenir agent</a> </li>
            </nav>
    </div>



    <div class="container">
        <div class="main sign-in">
            <div class="card">
                <div class="logo2">

                </div>
                <div class="card-head">
                    <h3 class="header2">Connectez-vous</h3>
                </div>
                <div class="card-body">
                    <form id="frmLogin" method="post" action="requete_connexion.php">
                        <div class="form-group">
                            <label class="form-label">Mail</label>
                            <input class="form-control" name="mail" type="email" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mot de Passe</label>
                            <input class="form-control" name="mdp"  type="password" required>

                        <div class="form-group">
                            <button type="submit" name ="valider" class="btn2" id="btnSignIn">Connectez-vous</button>
                        </div>
                        <div class="erreur-mail">
                            <?php
                                if ($_GET['erreur_mail']){
                                    echo 'L\'adresse e-mail ou le mot de passe n\'est pas bon';
                                }
                            ?>
                        </div>
                      
                    </form>
                </div>
              <div class="card-footer">
                         <span>Vous n'avez pas de compte ? </br><a name="valider" href="nouveau_compte.php">Cliquez-ici</span></a>
                        </div>
            </div>
        </div>
    </div>
    
</body>
</html>