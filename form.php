<?php
include("fonctions.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>S'inscrire en tant qu'agent</title>
    <link href="css/styles.css" rel="stylesheet" media="all" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
	<link rel="icon" type="image/x-icon" href="images/logo.ico" /><link rel="shortcut icon" type="image/x-icon" href="images/logo.ico" />
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
		<fieldset style="border: 2px solid #000000ad;border-radius: 10px; padding: 10px 20px;">
			<legend>Coordonnées</legend>
			<table>
				<form class="form1" name="inscription" method="post" action="form.php">
				<h3>
					Nom : <input type="text" name="nom" required autofocus/><br>
					Prénom : <input type="text" name="prenom" required/><br>
					Sexe : 
					<SELECT name="nom_concours" required>
						<OPTION value="null">Selectionner</OPTION>
						<OPTION>Homme</OPTION>
						<OPTION>Femme</OPTION>
					</SELECT><br>
					N° de téléphone : <input type="tel" required/><br>
					Date de naissance : <input type="date"/><br>
					Mail : <input type="email" required/><br>
					Votre prix/jour : <input type="text" name="prix" required/><br>
					Quelque chose que vous aimeriez que l'on sache : <br>
					<textarea type="text" name="caracteristique" placeholder="Ex : Vos qualités/défauts" rows="5" cols="50"></textarea>
					<!-- <input type="radio" name="categorie" value="student" />STUDENT<br>
					<input type="radio" name="categorie" value="school" />School<br>
					<input type="radio" name="categorie" value="other" />Other<br> -->
					
				</h3>
				<input type="submit" name="valider" value="SOUMETTRE" />
				</form>
				</table>
		</fieldset>
		<fieldset style="border: 2px solid #000000ad;border-radius: 10px; padding: 10px 20px;">
		<legend>Envoyez nous votre photo !</legend>
		<input type="file" accept=".png, .jpg, .jpeg"/><br><br>
		<input type="reset" value="Effacer"/>
		</fieldset>
    </section>    
    
	
<?php
if (isset ($_POST['valider'])) {
	$nom_concours=$_POST['nom_concours'];
	$pseudo=$_POST['pseudo'];
	$ville=$_POST['ville'];
	$pays=$_POST['pays'];
	$categorie=$_POST['categorie'];
	
	//on se connecte à la base 
	connectMaBase();
	//commande SQL d'insertion ou message d'erreur
	$sql = 'INSERT INTO participants VALUES("","'.$pseudo.'","'.$ville.'","'.$pays.'","'.$categorie.'")';
	mysql_query($sql) or die('ERREUR SQL ! <br>'.$sql.'<br>'.mysql_error());
	//on ferme la connexion(
	mysql_close();
	}
?>
</body>
