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
        INSERT INTO rendezvous ( `patient_id`, `employee_id`, `date`, `start_hour`, `end_hour`, `status`, `room`) 
                                VALUES (:patient_id , :employee_id , :date , :start_h , :end_h , 'A venir' , :room)
        
        ";

        $dataStatement = $db->prepare($sqlQuery);
            
        $dataStatement->bindParam(':employee_id', $_POST['employee_id'] );
        $dataStatement->bindParam(':patient_id', $_POST['patient_id'] );
        $dataStatement->bindParam(':date', $_POST['date'] );
        $dataStatement->bindParam(':start_h', $_POST['start_h'] );
        $dataStatement->bindParam(':end_h', $_POST['end_h'] );
        $dataStatement->bindParam(':room', $_POST['room'] );

        
        #try{
            $dataStatement-> execute();
             $_SESSION['RDVmessage'] = '';
           
        #}  catch (Exception $e){
             $_SESSION['RDVmessage'] = "ERREUR: Le rendez-vous n'a pas pu etre ajoute a la base de donneees'" ;
           
        #}
                
           
            
            
            
            
            
            
        
        
        
        





 
    
    header('Location: index.php');
   
    exit();


  ?>


