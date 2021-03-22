<?php
include("fonctions.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>S'inscrire en tant qu'agent</title>
    <link href="css/styles.css" rel="stylesheet" media="all" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
	<link rel="icon" type="image/x-icon" href="images/logo.png" /><link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
    <style>
		body{
			color: white;
		}
		
		input[type=submit], input[type=reset] {
			width: 350px;
			color: white;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			height: 60px;
			font-size: 15px;
		}

		input[type=text], input[type=tel],  input[type=date],  input[type=email], textarea[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		
	</style>
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
            <h1 class="gros-titre">Devenez agent !</h1>
            <h2 class="sous-titre">Si vous vous en sentez capable ... proposez vos services !</h2>
            
            <a class="scroll" href="#formulaire">Scroll <i class="fas fa-angle-down"> </i></a>
        </div>  
    </section>
    <section class="formulaire" id="formulaire">
        <div class="titre-form">
            <h2>Inscription</h2>
        </div>
		<br>
		<div class="formulaire-box">
			<div class="form-infos global-form">
				<form name="inscription" method="post" action="form.php" enctype="multipart/form-data">
		
					<label for="nom"> Nom : </label>
					<input id="nom" class="cellule" type="text" name="nom" required autofocus/>
				
					<label for="prenom">Prénom :</label>
					<input id="prenom" class="cellule" type="text" name="prenom" required/>
				
					<label for="sexe">Sexe :</label>
					<SELECT id="sexe" name="sexe" required>
						<OPTION value="null">Selectionner</OPTION>
						<OPTION>Homme</OPTION>
						<OPTION>Femme</OPTION>
					</SELECT>

					<label for="telephone">N° de téléphone :</label>
					<input id="telephone" class="cellule" type="tel" placeholder="ex : 0613245678" maxlength="10" pattern="[0]{1}[0-9]{9}" required/>
				
					<label for="date">Date de naissance :</label>
					<input id="date" class="cellule" type="date"/>
				
					<label for="mail"> Mail : </label>
					<input id="mail" class="cellule" type="email" required/>
			</div>

			<div class="form-photo global-form">					
				<label for="selfie">Nous avons besoin d'un selfie de vous <br> pour que le client sache au moins à qui s'attendre.</label><br>
				<input type="file" name="selfie" accept=".png, .jpg, .jpeg" onchange="loadFile(event)"><br>
				<label for="output"> Votre photo de profil ressemblera à cela : <br></label>
				<img id="output" width="300" height="400"/>
				<script> // javascript nécéssaire pour afficher un aperçu de la photo de profil
				var loadFile = function(event) {
					var output = document.getElementById('output');
					output.src = URL.createObjectURL(event.target.files[0]);
					output.onload = function() {
					URL.revokeObjectURL(output.src) // on libère la mémoire
					}
				};
				</script>
			</div>

			<div class="form-infos2 global-form">			
						<label for="prix"> Votre prix/jour : </label>
						<span><input id="prix" class="prix" type="prix" name="prix_journee" required/>€</span>		
						<label for="caracteristique">Quelque chose que vous<br>aimeriez que l'on sache : </label>
						<textarea id="caracteristique" class="cellule" type="text" name="caracteristique" placeholder="Ex : Vos qualités/défauts" rows="5" cols="50"></textarea>	
			</div>	

		</div>
	</section>
	<section class="formulaire-submit">
		<input class="submit" type="submit" name="valider" value="SOUMETTRE" />
		<input class="reset" type="reset" value="Effacer" />
		
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
		<p class="credits">Réalisé par Marius LACOUR, Kevin KAMENI, Jade GAY</p>
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
