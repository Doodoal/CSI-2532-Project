<?php

session_start();



try
{
	$db= new PDO('mysql:host=localhost;dbname=cabinet_dentaire;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['SSN']) &&  isset($_POST['password'])){
    //cette partie consiste a verifier si l'information est dans la base de donnee.
    $sqlquery='SELECT *  FROM utilisateur' ;
    $sqlstatement= $db -> prepare($sqlquery);
    $sqlstatement-> execute();
    $users= $sqlstatement->fetchAll();

    foreach ($users as $user) {
        if (
            $user['SSN'] === $_POST['SSN'] &&
            $user['Password'] === $_POST['password']
        ) {
            $loggedUser = $user['Role'];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $_POST['SSN'],
                $_POST['password']
            );
        }
    }
}
 if(!isset($loggedUser)){
    include 'index.php';
 }else{
     $_SESSION['ID'] = $_POST['SSN'];
    switch($loggedUser){
        case'patient':
            
            redirect('patient/index.php');
        case'dentiste':
            redirect('dentiste/index.php');
    }
 }



function redirect($url) {
    
    header('Location: '.$url);
   
    exit();

  }
?>
    