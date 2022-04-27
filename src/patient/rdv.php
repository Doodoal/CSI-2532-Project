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
    $sqlQuery = 'SELECT *
        
        
        FROM rendez-vous 
        
        WHERE  patient_id EXISTS 
        
        (SELECT patient_id 
        
        FROM  patient
        
        WHERE
        
        SSN = :SSN) 
        
        ORDER BY date';

        $dataStatement = $db->prepare($sqlQuery);
            
        $dataStatement->bindParam(':SSN', $SSN);
    
        $dataStatement->execute();
        $datas = $dataStatement->fetchAll();
    
}catch (Exception $e){
    
    unset($datas);
    
}
 


?>

<table>
<tr>

    <th> Status </th>
    <th> Prestataire </th>
    <th> Date </th>
    <th> Horaire</th>
    <th> Salle</th>
    
</tr>
    <?php
    
    if ( isset($datas)){
    foreach ($datas as $data){
        rdvRow($data['status'],
               $data['employee_id'],
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
function rdvRow(  $status ,$dentist, $date , $startH , $endH, $roomN ){
    echo '<tr>';
    td($status);
    td($dentist);
    td($date);
    td($endH.' - '.$endH);
    td($roomN);
    echo '</tr>';
        
}

function td($attribute){
    echo '<td>'.$attribute.'</td>' ;
}



?>

