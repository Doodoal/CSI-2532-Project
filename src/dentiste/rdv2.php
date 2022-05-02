<?php

 

#Connexion
try
{
	$db= new PDO('mysql:host=localhost;dbname=cabinet_dentaire;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


#Requete
#try{
    $rdvQuery = 'SELECT A.status, B.name, B.SSN,  A.date, A.start_hour, A.end_hour, A.room
        
        
        FROM rendezvous A , utilisateur B
        
        WHERE A.employee_id IN 
                            (SELECT U.employee_id
                            FROM EMPLOYEE U
                            WHERE U.SSN = :Self)
                            
                            AND 
                            
                            B.SSN IN
        
        (SELECT P.SSN
        
        FROM  patient P
        
        WHERE A.patient_id = P.patient_id
        )
        
        ORDER BY date DESC;';

        $rdvStatement = $db->prepare($rdvQuery);
            
        
        $rdvStatement->bindParam(':Self', $_SESSION['ID']);
    
        $rdvStatement->execute();
        $rdvs = $rdvStatement->fetchAll();
    
#}catch (Exception $e){
    
    #unset($rdvs);
    
#}
 


?>

<table>
<tr>

    <th> Status </th>
    <th> SSN </th>
    <th> Nom </th>
    <th> Date </th>
    <th> Horaire</th>
    <th> Salle</th>
    
</tr>
    <?php
    
    if ( isset($rdvs)){
    foreach ($rdvs as $rdv){
        rdvRow2($rdv['status'],
                $rdv['SSN'],
                $rdv['name'],
               $rdv['date'],
               $rdv['start_hour'],
               $rdv['end_hour'],
               $rdv['room']
        );
    }
    }
    
    ?>
    
</table>


<?php
function rdvRow2(  $status , $SSN ,$name, $date , $startH , $endH, $roomN ){
    echo '<tr>';
    td($status);
    td($SSN);
    td($name);
    td($date);
    td($endH.' - '.$endH);
    td($roomN);
    echo '</tr>';
        
}





?>

