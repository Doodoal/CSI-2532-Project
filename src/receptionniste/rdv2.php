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
try{
    $rdvQuery = 'SELECT A.status, D.name,A.patient_id, P.SSN, A.employee_id, A.date, A.start_hour, A.end_hour, A.room
        
        
        FROM rendezvous A , utilisateur D, utilisateur P
        
        WHERE D.SSN IN     (SELECT U.SSN
                            FROM EMPLOYEE U
                            WHERE U.employee_id = A.employee_id) 
                            
                            AND  P.SSN IN (SELECT Y.SSN
                            FROM patient Y
                            WHERE Y.patient_id = A.patient_id
                            
                            )
                            
        
        ORDER BY date DESC;';

        $rdvStatement = $db->prepare($rdvQuery);
            
        
    
        $rdvStatement->execute();
        $rdvs = $rdvStatement->fetchAll();
    
}catch (Exception $e){
    
    unset($rdvs);
    
}
 


?>

<table>
<tr>

    <th> Status </th>
    <th> SSN Patient </th>
    <th> ID Patient </th>
    <th> Prestataire </th>
    <th> ID Prestataire </th>
    <th> Date </th>
    <th> Horaire</th>
    <th> Salle</th>
    
</tr>
    <?php
    
    if ( isset($rdvs)){
    foreach ($rdvs as $rdv){
        rdvRow2($rdv['status'],
                $rdv['SSN'],
                $rdv['patient_id'],
                $rdv['name'],
                $rdv['employee_id'],
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
function rdvRow2(  $status , $SSN,$patient_id ,$name, $employee_id, $date , $startH , $endH, $roomN ){
    echo '<tr>';
    td($status);
    td($SSN);
    td($patient_id);
     td($name);
    td($employee_id);
   
    td($date);
    td($endH.' - '.$endH);
    td($roomN);
    echo '</tr>';
        
}



function td($attribute){
    echo '<td>'.$attribute.'</td>' ;
}






?>

