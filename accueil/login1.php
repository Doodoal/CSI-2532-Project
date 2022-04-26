<?php
try
{
	$db= new PDO('mysql:host=localhost;dbname=cabinet_dentaire;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['SIN']) &&  isset($_POST['password'])){
    //cette partie consiste a verifier si l'information est dans la base de donnee.
    $sqlquery='SELECT *  FROM login' ;
    $sqlstatement= $db -> prepare($sqlquery);
    $sqlstatement-> execute();
    $users= $sqlstatement->fetchAll();

    foreach ($users as $user) {
        if (
            $user['SIN'] === $_POST['SIN'] &&
            $user['Password'] === $_POST['password']
        ) {
            $loggedUser = $user['Type'];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $_POST['SIN'],
                $_POST['password']
            );
        }
    }
}
 if(!isset($loggedUser)){
    include 'formulaire1.php';
 }else{
    switch($loggedUser){
        case'A':
            redirect('x.php');
        case'B':
            redirect('y.php');
    }
 }
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
  }
?>
    