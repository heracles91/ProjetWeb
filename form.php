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
		<fieldset style="border: 2px solid #000000ad;border-radius: 10px; padding: 10px 20px;">
			<legend>Coordonnées</legend>
			<table>
				<form name="inscription" method="post" action="form.php" enctype="multipart/form-data">
					<div>
					<table>
					<tr>
						<td class="cellule"> Nom : </td>
						<td><input type="text" name="nom" required autofocus/></td>
					</tr><br>
					<tr>
						<td class="cellule"> Prénom : </td>
						<td><input type="text" name="prenom" required/></td>
					</tr><br>
					<tr>
						<td class="cellule"> Sexe : </td>
						<td>
						<SELECT name="sexe" required>
							<OPTION value="null">Selectionner</OPTION>
							<OPTION>Homme</OPTION>
							<OPTION>Femme</OPTION>
						</SELECT>
						</td>
					</tr><br>
					<tr>
						<td class="cellule"> N° de téléphone : </td>
						<td><input type="tel" required/></td>
					</tr><br>
					<tr>
						<td class="cellule"> Date de naissance : </td>
						<td><input type="date"/></td>
					</tr><br>
					<tr>
						<td class="cellule"> Mail : </td>
						<td><input type="email" required/></td>
					</tr><br>
					<tr>
						<td class="cellule"> Votre prix/jour : </td>
						<td><input type="text" name="prix_journee" required/></td>
					</tr><br>
					<tr>
						<td class="cellule"> Quelque chose que vous<br>aimeriez que l'on sache : </td>
						<td><textarea type="text" name="caracteristique" placeholder="Ex : Vos qualités/défauts" rows="5" cols="50"></textarea></td>
					</tr>
						<!-- <input type="radio" name="categorie" value="student" />STUDENT<br>
						<input type="radio" name="categorie" value="school" />School<br>
						<input type="radio" name="categorie" value="other" />Other<br> -->
					</table>
					</table>
		</fieldset>
		<fieldset style="border: 2px solid #000000ad;border-radius: 10px; padding: 10px 20px;">
			<legend>Envoyez nous votre photo !</legend>
			Nous avons besoin d'une selfie de vous pour que le client <br>sache au moins à qui s'attendre.<br>
			<input type="file" name="selfie" id="selfie" accept=".png, .jpg, .jpeg" required/><br><br>
			<input type="reset" value="Effacer"/>
		</fieldset>
		<br>
		<input type="submit" name="valider" value="SOUMETTRE" />
		</div>
				</form>
    </section>
    
	
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
