<?php
function connectMaBase(){
    $base = mysql_connect ('localhost', 'root', 'root');  
    mysql_select_db ('agents', $base) ;
   
}

function note($id){
    $sql2='SELECT AVG(note) FROM notes_agents WHERE id_agent='.$id.'';                    /*requete sql qui prend la moyenne des               */
    $req2=mysql_query($sql2)  or die('ERREUR SQL ! <br>'.$sql2.'<br>'.mysql_error());    /*notes dans la table notes_agents pour chaque agents*/
    $data2 = mysql_fetch_array($req2);
    $moyenne_note = $data2['AVG(note)'];  /*on recupere le résultat de la requete sql, c'est ce qui sera la note affichée pour chaque agents*/
    $moyenne_note2=round($moyenne_note * 2) ;

    $verif=0;                                  /*permet a l'aide d'arrondis           */                                              
    if (fmod ( $moyenne_note2, 2 )==1.0){     /*d'afficher les notes avec des étoiles*/
        $verif=1;
        }
    $sql3='SELECT COUNT(note) FROM notes_agents WHERE id_agent='.$id.'';                  /*requete sql qui compte le nombre de                */
    $req3=mysql_query($sql3)  or die('ERREUR SQL ! <br>'.$sql3.'<br>'.mysql_error());    /*notes dans la table notes_agents pour chaque agents*/
    $data3 = mysql_fetch_array($req3);
    $nombre_de_notes = $data3['COUNT(note)'];
    $evaluation="évaluations";
    if ($nombre_de_notes<=1){
        $evaluation="évaluation";
        if ($nombre_de_notes==0){
            $nombre_de_notes="Aucune";
        }                           
    }
    $rajout_du_0="";                                /*rajoute .0 après les notes moyennes qui sont entière */
    if (fmod(round ($moyenne_note, 1)*2,2)==0){    /* (effet de style)                                    */
        $rajout_du_0=".0";
        }


    return array($moyenne_note2,$moyenne_note,$evaluation,$nombre_de_notes,$rajout_du_0,$verif);
}
?>
