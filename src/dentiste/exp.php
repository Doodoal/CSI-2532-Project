<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	
</head>

    
<?php

if (isset($_POST['SSN'])) {
 $SSN = $_POST['SSN'];
}



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
        
        
        FROM utilisateur
        
        WHERE  
        
        SSN = :SSN
        
        ';

        $dataStatement = $db->prepare($sqlQuery);
            
        $dataStatement->bindParam(':SSN', $SSN);
    
        $dataStatement->execute();
        $datas = $dataStatement->fetchAll();
    
}catch (Exception $e){
    
    unset($datas);
    
}
 


?>

<div class ="flexbox-container">
    <div class = "flexbox-item">
    <h3>Informations du patient</h3>
    <table>
<tr>

    <th> Nom </th>
    <th> Prenoms </th>
    <th> Date de naissance </th>
    
    
</tr>
    <?php
    
    if ( isset($datas)){
    foreach ($datas as $data){
        
        echo '<tr>';
        td($data['surname']);
        td($data['Name']);
        td($data['birthday']);
        echo '</tr>';
    }
        
    }
    
    ?>
    
</table>
    </div>
    
    
    <div class = "flexbox-item">
    <h3> Rendez-vous avec ce patient</h3>
    <?php
        include('rdv1.php');
        ?>
    
    
    </div>


</div>



<?php


function td($attribute){
    echo '<td>'.$attribute.'</td>' ;
}



?>

