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
    $sqlQuery = 'SELECT A.status, A.date, A.start_hour, A.end_hour, A.room
        
        
        FROM rendezvous A 
        
        WHERE A.patient_id IN
        
        (SELECT patient_id 
        
        FROM  patient
        
        WHERE
        
        SSN = :SSN) AND A.employee_ID IN (SELECT U.employee_id
                                    FROM EMPLOYEE U
                                    WHERE U.SSN = :Self)
        
        ORDER BY date DESC;';

        $dataStatement = $db->prepare($sqlQuery);
            
        $dataStatement->bindParam(':SSN', $SSN);
        $dataStatement->bindParam(':Self', $_SESSION['ID']);
    
        $dataStatement->execute();
        $datas = $dataStatement->fetchAll();
    
}catch (Exception $e){
    
    unset($datas);
    
}
 


?>

<table>
<tr>

    <th> Status </th>
    <th> Date </th>
    <th> Horaire</th>
    <th> Salle</th>
    
</tr>
    <?php
    
    if ( isset($datas)){
    foreach ($datas as $data){
        rdvRow($data['status'],
               $data['date'],
               $data['start_hour'],
               $data['end_hour'],
               $data['room']
        );
    }
    }
    
    ?>
    
</table>


<?php
function rdvRow(  $status , $date , $startH , $endH, $roomN ){
    echo '<tr>';
    td($status);
    td($date);
    td($endH.' - '.$endH);
    td($roomN);
    echo '</tr>';
        
}





?>

