<?php
// On démarre la session 
session_start();

include("fonctions.php");
?>
    
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="css/connexion.css" rel="stylesheet"  />
    <title>Document</title>
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
                <div class="card-head" style="text-align:center;">
                    <h3 class="header2">Inscrivez-vous</h3>
                </div>
                <div class="card-body">
                    <form id="frmLogin" method="post" action="ajout_client.php">
                    <h4>Vos identifiants</h4>
                        <div class="form-group">
                            <label class="form-label">Adresse e-mail *</label>
                            <input class="form-control" name="mail"  type="email" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mot de passe *</label>
                            <input class="form-control" name="mdp"  type="password" required>
                        </div>
                    <h4>Vos informations personnelles</h4>
                        <div class="form-group">
                            <label class="form-label">Civilité *</label>
                            <input type="radio" name="gender" id="Mister" checked>
                            <label for="Mister">M.</label><br>
                            <input type="radio" name="gender" id="Madam">
                            <label for="Madam">Mme.</label>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Prénom *</label>
                            <input class="form-control" name="prenom"  type="text" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nom *</label>
                            <input class="form-control" name="nom"  type="text" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Votre pays *</label>
                            <select class="form-control" type="text" required>
                                <option>France</option>
                                <option>Belgique</option>
                                <option>Luxembourg</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Votre date de naissance</label>
                        <input class="form-control" type="date">
                        
                        <div class="form-group">
                            <button type="submit" name='valider' class="btn2" id="btnSignIn">Créez votre compte</button>
                        </div>
                        <div class="erreur-mail">
                            <?php
                                if ($_GET['erreur_mail']){
                                    echo 'Cette adresse e-mail est déjà utilisée.';
                                }
                            ?>
                        </div>
                        
                      
                    </form>
                    
                </div>
                
                <div class="card-footer">
                        <span>Déjà client ?</br><a href="connexion.php">Cliquez-ici</span></a>
                </div>
            </div>
        </div>
    </div>

</body>
        
</html>            
                
	
