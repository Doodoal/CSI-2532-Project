<!DOCTYPE html>
        <html>
        <head>
            
              <?php 
      session_start();  
        
    
     
         
        
        if (!isset( $_SESSION['ID'])){
           $SSN = 0; 
        } else{$SSN = $_SESSION['ID'];}
            ?>

        <title>Portail Reception</title>
        
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/x-icon" href="../img/patient.png">
            
            </head>
            
            <a href = "userInfo.php"> <h2>Voir/Modifier ses informations personelles </h2></a>
            
            <div class = 'flexbox-container'>
            
            <div class = "flexbox-item">
                
                <h2> Liste des rdvs de patients</h2>
           <?php
            include('rdv2.php');
             echo '<br>
            <br>';
            
            if (isset( $_SESSION['RDVMessage'])){
           echo $_SESSION['RDVMessage'];}
            ?>
                 </div>
            
                <div class = "flexbox-item">
                
                    
                    <form action = "insert.php" method="post">
                <h2>Nouveau Rendez-vous</h2>
                
                <label>ID Patient</label>
                <input type= "number" placeholder = "ID patient" name = "patient_id" required>
                <br>
                <label>ID Prestataire</label>
                <input type= "number" placeholder = "ID prestataire" name = "employee_id" required>
                        
                <br>
                <label>Date</label>
                <input type = "date" name = "date" required>
                <br>
                <label>Heure de debut</label>
                <input type = "time" placeholder = "Heure de debut" name = "start_h" required>
                <br>
                <label>Heure de fin</label>
                <input type = "time" placeholder = "Heure de fin" name = "end_h" required>
                <br>
                
                <label>Salle</label>
                <input type = "number" placeholder = "Numero de salle" name = "room" required>
                <br>
                
                <input type =submit value = "Creer nouveau RDV">
                
            
            </form>
                </div>
                <div>
                    <h2> Index des patients et prestataires</h2>
                <br>
                <br>
                <?php 
                include("liste.php");
                ?>
                </div>
                
                
               
            </div>
            
    
            
</html>


