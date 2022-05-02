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
    $Pquery = 'SELECT A.name, B.SSN, B.patient_id
        
        
        FROM utilisateur A , patient B
        
        WHERE B.SSN in (SELECT U.SSN
                        FROM patient U
                        WHERE A.SSN = U.SSN 
                            
                            )
                            
        
        ';
    
    
        $Equery = 'SELECT A.name, B.SSN, B.employee_id
        
        
        FROM utilisateur A , employee B
        
        WHERE B.SSN in (SELECT U.SSN
                        FROM employee U
                        WHERE A.SSN = U.SSN AND U.role = "dentiste"
                            
                            )
                            
        
        ';
        
        $Estatement = $db->prepare($Equery);
        
        $Pstatement = $db->prepare($Pquery);
            
        
    
        $Pstatement->execute();
         $Estatement->execute();
    
        $patients = $Pstatement->fetchAll();
        $employees = $Estatement->fetchAll();
    
#}catch (Exception $e){
    
   # unset($patients);
    #unset($employee);
    
#}
 


?>
<div class= 'flexbox-container'>

    <div class = 'flexbox-item'>
    
            <table>
            <tr>

    
    <th> SSN Patient </th>
    <th> ID Patient </th>
    <th> Nom Patient </th>
    
        </tr>
    <?php
    
    if ( isset($patients)){
    foreach ($patients as $patient){
        Row($patient['SSN'],
                   $patient['patient_id'],
                   $patient['name'],
        );
    }
    }
    
    ?>
    
</table>
    </div>
    
    <div class = 'flexbox-item'>
    
            <table>
            <tr>

    
    <th> SSN Prestataire </th>
    <th> ID Prestataire </th>
    <th> Nom Prestataire </th>
    
        </tr>
    <?php
    
    if ( isset($employees)){
    foreach ($employees as $employee){
        Row($employee['SSN'],
                   $employee['employee_id'],
                   $employee['name'],
        );
    }
    }
    
    ?>
    
</table>
    </div>
    

</div>  




<?php
function Row(  $SSN,$id ,$name ){
    echo '<tr>';
    td($SSN);
    td($id);
     td($name);
    echo '</tr>';
        
}








?>

