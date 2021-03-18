<?php
include("fonctions.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>S'inscrire en tant qu'agent</title>
    <link href="css/styles.css" rel="stylesheet" media="all" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
	<link rel="icon" type="image/x-icon" href="images/site_logo.ico" /><link rel="shortcut icon" type="image/x-icon" href="images/site_logo.ico" />
    </head>
    <body>
    <section class="top-page">
        <header class="form-header">
                <img src="images/logo.png" alt="Logo du site">
                <nav>
                    <li><a class="boutton-haut" href="index.php">Accueil</a> </li>
                    <li><a class="boutton-haut" href="index.php #agents">Nos agents</a> </li>
                    <li><a class="boutton-haut" href="form.php">Devenir agent</a> </li>
                </nav>
        </header>
        <div class="landing-page">
            <h1 class="gros-titre"> Devenez agent !</h1>
            <h2 class="sous-titre">Si vous vous en sentez capable ... proposez vos services !</h2>
            
            <a class="scroll" href="#formulaire">Scroll <i class="fas fa-angle-down"> </i></a>
        </div>  
    </section>
    <section class="formulaire" id="formulaire">
        <div class="titre-form">
            <h2>Inscription</h2>
        </div>
		<br>
		<fieldset>
			<legend>Coordonnées</legend>
			<table>
				<form name="inscription" method="post" action="form.php" enctype="multipart/form-data">
					<div>
					<table cellspacing="10">
					<tr>
						<td> Nom : <br>
						<input class="cellule" type="text" name="nom" required autofocus/></td>
					</tr>
					<tr>
						<td> Prénom : <br>
						<input class="cellule" type="text" name="prenom" required/></td>
					</tr>
					<tr>
						<td> Sexe : <br>
						<SELECT name="sexe" required>
							<OPTION value="null">Selectionner</OPTION>
							<OPTION>Homme</OPTION>
							<OPTION>Femme</OPTION>
						</SELECT>
						</td>
					</tr>
					<tr>
						<td> N° de téléphone : <br>
						<input class="cellule" type="tel" placeholder="ex : 0613245678" maxlength="10" pattern="[0]{1}[0-9]{9}" required/></td>
					</tr>
					<tr>
						<td> Date de naissance : <br>
						<input class="cellule" type="date"/></td>
					</tr>
					<tr>
						<td> Mail : <br>
						<input class="cellule" type="email" required/></td>
					</tr>
						<!-- <input type="radio" name="categorie" value="student" />STUDENT<br>
						<input type="radio" name="categorie" value="school" />School<br>
						<input type="radio" name="categorie" value="other" />Other<br> -->
				</table>
		</fieldset>
		<fieldset>
			<legend>Envoyez nous votre photo !</legend>
			<table cellspacing="10"><tr>
			<td>
			Nous avons besoin d'une selfie<br>de vous pour que le client<br>sache au moins à qui s'attendre.<br><br>
			<input type="file" name="selfie" id="selfie" accept=".png, .jpg, .jpeg" required/></td>
			</tr></table>
		</fieldset>
		<fieldset>
			<legend>Informations supplémentaires</legend>
			<table cellspacing="10">
				<tr>
					<td> Votre prix/jour : <br>
					<input class="cellule" type="text" name="prix_journee" required/>€</td>
				</tr>
				<tr>
					<td>Quelque chose que vous<br>aimeriez que l'on sache : <br>
					<textarea class="cellule" type="text" name="caracteristique" placeholder="Ex : Vos qualités/défauts" rows="5" cols="50"></textarea></td>
				</tr>
			</table>
		</fieldset>
		<br>
		<input type="submit" name="valider" value="SOUMETTRE" />
		<input type="reset" value="Effacer"/>
		</div>
				</form>
    </section>
	<hr>
	<section class="bas-de-page2">   
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
    <footer class="footer2">
        <p class="copyright">&copy; 2021 - Mon Agent </p>
        <a href="" class="cgv">Conditions générales de ventes</a>
    </footer>
    
	
<?php
if (isset ($_POST['valider'])) {
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$sexe=$_POST['sexe'];
	$caracteristique=$_POST['caracteristique'];
	$prix_journee=$_POST['prix_journee'];
	$photo=$_FILES['selfie']['name'];
	$sexe=$_POST['sexe'];
	
	//on se connecte à la base 
	connectMaBase();
	//commande SQL d'insertion ou message d'erreur
	$sql = 'INSERT INTO AGENTS_LISTE VALUES 
	("","'.$nom.'","'.$prenom.'","'.$sexe.'","'.$caracteristique.'",0,"'.$prix_journee.'","'.$photo.'");';
	mysql_query($sql) or die('ERREUR SQL ! <br>'.$sql.'<br>'.mysql_error());
	//on ferme la connexion(
	mysql_close();
	move_uploaded_file($_FILES["selfie"]["tmp_name"], 'images/'.$_FILES['selfie']['name']);
	}
?>
</body>
