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

        
        $sqlQuery = "
        INSERT INTO utilisateur (`SSN`, `Name`, `Password`, `Role`, `email`, `surname`, `birthday`, `street`, `city`, `province`, `code_postal`)
        VALUES (
        :SSN, 
        :name,
        :password, 
        :role, 
        :email, 
        :surname, 
        :birthday,
        'Veuillez renseigner votre rue',
        'Veuillez renseigner votre ville',
        'Veuillez renseigner votre province',
        '___-___')
        
        ";

        $dataStatement = $db->prepare($sqlQuery);
            
        $dataStatement->bindParam(':SSN', $_POST['ssn'] );
        $dataStatement->bindParam(':email', $_POST['email'] );
        $dataStatement->bindParam(':password', $_POST['password'] );
        $dataStatement->bindParam(':name', $_POST['name'] );
        $dataStatement->bindParam(':surname', $_POST['surname'] );
        $dataStatement->bindParam(':birthday', $_POST['birthday'] );
        $dataStatement->bindParam(':role', $_POST['role'] );

        
           

            
        if ($_POST['password'] == $_POST['Npassword'] ){
            
            
            $dataStatement->execute();  
            
            
              switch($_POST['role']){
                  
                case 'patient':
                       $newPatient = $db->prepare(
                       "INSERT INTO `patient` (`SSN`) VALUES (:SSN)");
                       $newPatient->bindParam(':SSN', $_POST['ssn'] );
                       $newPatient->execute(); 
                       break;
                case 'receptionniste':
                      $newEmployee = $db->prepare( "
                      INSERT INTO employee
                      (`SSN`, `role`,`salary`) 
                      VALUES (:SSN , :role, 100000)"
                                                 );
                      
                    $newEmployee->bindParam(':SSN', $_POST['ssn'] );
                    $newEmployee->bindParam(':role', $_POST['role'] );                    
                    $newEmployee->execute();
                      break;
                case 'dentiste':
                      $newEmployee = $db->prepare( "
                      INSERT INTO employee
                      (`SSN`, `role`,`salary`) 
                      VALUES (:SSN , :role, 150000)"
                                                 );
                      $newEmployee->bindParam(':SSN', $_POST['ssn'] );
                      $newEmployee->bindParam(':role', $_POST['role'] );
            
                    
                      $newEmployee->execute();  
                      break;
              }
                
           
            
            
            
            
            
            
            $_SESSION['Rmessage'] = 'Inscription effectuée \nVous pouvez vous connecter'; 
            redirect("../index.php");
        } else{
             $_SESSION['Rmessage'] = 'Inscription annulée \nCause : Differents mots de passe renseignés '; 
            redirect("index.php");
        }
        
        
        
        
        





   function redirect($url) {
    
    header('Location: '.$url);
   
    exit();

  }

  ?>


