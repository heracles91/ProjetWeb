<?php

// On démarre la session 
session_start();

//on se connecte à la base 
include("fonctions.php");
connectMaBase();


if (isset ($_POST['valider'])){

    $mail = $_POST['mail'];

    $query = mysql_query('SELECT prenom FROM clients WHERE mail="'.$mail.'"');
    $rows = mysql_num_rows($query);

    if($rows>0){ //si il existe déja cette adresse mail dans la bdd on renvoie une erreur
        header('Location: nouveau_compte.php?erreur_mail=True');
    }

    else {
        //commandes SQL d'insertion ou message d'erreurs
        $sql = "INSERT INTO clients(prenom,nom,mail,mdp) VALUES ('".$_POST['prenom']."','".$_POST['nom']."','".$_POST['mail']."','".$_POST['mdp']."')";
        mysql_query($sql) or die('ERREUR SQL ! <br>'.$sql.'<br>'.mysql_error());
        

      
        $_SESSION['client_connecte']=True;


        $query2 = mysql_query('SELECT id FROM clients WHERE mail="'.$mail.'"');
        $data1=mysql_fetch_array($query2);
        $id = $data1['id'];
        $_SESSION['id_client']=$id;

        header('Location: compte.php');

    }
    mysql_free_result($query); 
    mysql_close(); //on ferme 
    
    
} 

?>