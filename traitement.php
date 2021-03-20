<?php
//Connexion à la bdd SQL, en PDO ou je ne sais quoi...
include("fonctions.php");
connectMaBase();
if (isset ($_POST['valider'])) {

    $id=$_GET['id'];
    $note=$_POST['note'];
    $sql = 'INSERT INTO notes_agents(id_agent,note) VALUES('.$id.',"'.$note.'")';
    mysql_query($sql) or die('ERREUR SQL ! <br>'.$sql.'<br>'.mysql_error());
    header('Location: index.php #agents ');
   
}
else {
    echo 'Un ou plusieurs champs sont vides';
}
?>
