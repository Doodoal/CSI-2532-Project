<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	
</head>

    
<?php

if (isset($_POST['SSN'])) {
 $SSN = $_POST['SSN'];
}

include('index.php');

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


<?php


function td($attribute){
    echo '<td>'.$attribute.'</td>' ;
}



?>