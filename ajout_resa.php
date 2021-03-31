<?php

// On démarre la session 
session_start();

//on se connecte à la base 
include("fonctions.php");
connectMaBase();

if (isset ($_POST['valider'])) {
    $id=$_GET['id'];
    $id_client=$_SESSION['id_client'];
    if ($_SESSION['client_connecte']==False){
        header('Location: connexion.php');
    }

    else if ($_POST['premier-jour']>$_POST['dernier-jour']){
        header('Location: infos_supplementaires.php?id='.$id.'&resa_faite=False&erreur_date=True');
    }

    
    else {

        $sql='SELECT * FROM reservations WHERE id_agent='.$id.' ';
        $req=mysql_query($sql) or die('ERREUR SQL ! <br>'.$sql.'<br>'.mysql_error());

        $premier_jour=$_POST['premier-jour'];
        $dernier_jour=$_POST['dernier-jour'];
        // echo $dernier_jour.$premier_jour ;
        $erreur_date_deja_prise=False;
        while ($data2 = mysql_fetch_array($req)) {

            if ($data2['premier_jour']<=$premier_jour AND $premier_jour<=$data2['dernier_jour'] OR $data2['premier_jour']<=$dernier_jour  AND $dernier_jour<=$data2['dernier_jour']){
                $erreur_date_deja_prise=True;
            }
            
        }
        mysql_free_result($req); //on libere mysql de la requete
        mysql_close(); //on ferme

        if ($erreur_date_deja_prise){
            header('Location: infos_supplementaires.php?id='.$id.'&resa_faite=False&erreur_date_deja_prise=True');
        }

        else{
            connectMaBase();
            // commande SQL d'insertion ou message d'erreur
            $sql2 = 'INSERT INTO reservations(id_client,id_agent,premier_jour,dernier_jour) VALUES('.$id_client.','.$id.',"'.$premier_jour.'","'.$dernier_jour.'")';
            mysql_query($sql2) or die('ERREUR SQL ! <br>'.$sql2.'<br>'.mysql_error());
            header('Location: infos_supplementaires.php?id='.$id.'&resa_faite=True');
        }
  
    }
    
}
?>