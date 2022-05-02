<?php

session_start();

  #Connexion
        try
        {
            $db= new PDO('mysql:host=localhost;dbname=cabinet_dentaire;charset=utf8', 'root', 'root');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }

        
        $sqlQuery = '
        UPDATE utilisateur
        SET email = :email ,
            street = :street ,
            city = :city,
            province = :province,
            code_postal = :code_postal,
            password = :password
            
        WHERE SSN = :SSN;
        
        ';

        $dataStatement = $db->prepare($sqlQuery);
            
        $dataStatement->bindParam(':SSN', $_SESSION['ID'] );
        $dataStatement->bindParam(':email', $_POST['email'] );
        $dataStatement->bindParam(':city', $_POST['city'] );
        $dataStatement->bindParam(':street', $_POST['street'] );
        $dataStatement->bindParam(':province', $_POST['province'] );
        $dataStatement->bindParam(':code_postal', $_POST['code_postal'] );
        $dataStatement->bindParam(':password', $_POST['password'] );



        if ($_POST['password'] == $_POST['Npassword'] ){
            $dataStatement->execute();  
            header('Location: index.php');
            exit();
        } else{
             $_SESSION['Message'] = 'Modification annulée \nCause : Differents mots de passe renseignés '; 
        }
        
        
        
        
        





    
    header('Location: userInfo.php');
   
    exit();

  ?>


