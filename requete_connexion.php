<?php

// On démarre la session 
session_start();

//on se connecte à la base 
include("fonctions.php");

if (isset ($_POST['valider'])) {
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        
        //on se connecte à la base
        connectMaBase();
        
        $query = mysql_query('SELECT * FROM clients WHERE mail="'.$mail.'" AND mdp="'.$mdp.'"');
        $rows = mysql_num_rows($query);
        if($rows==1){       
            $_SESSION['client_connecte']=True;   
            
            
            $query2 = mysql_query('SELECT id FROM clients WHERE mail="'.$mail.'"');
            $data1=mysql_fetch_array($query2);
            $id = $data1['id'];
            $_SESSION['id_client']=$id;

            header("Location: compte.php");
            //on ferme la connexion
            
        }

        else{
            header("Location: connexion.php?erreur_mail=True");
        }
        
} 

       
?>