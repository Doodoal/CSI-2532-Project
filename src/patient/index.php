<!DOCTYPE html>
<html>
    
    <?php 
      session_start();  
        
    
     
         $SSN = $_SESSION['ID'];   
        
        if (!isset($SSN)){
           $SSN = 0; 
        }
        
    
        
    
    ?>
    <head>
        <title>Portail Patient</title>
        
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/x-icon" href="../img/patient.png">
        
       
    </head>
    
    <?php 
    
    $Uname = "Nom non renseigné";
    
    ?>
    
    
    
    <body>
        
        <div class = "header">
            <div class="concat"> 
                <img src = "../img/client.png"> 
                <h1 >&nbsp;   Portail Patient</h1>
            
            </div>
            
            <a href = "../"><img src = "../img/Log_out.png" alt="Se déconnecter" > </a>
        </div>
        
        
        <div class = "flexbox-container">
            
             <?php include('userInfo.php'); ?>
            
            
            
             <div class = "flexbox-item"> 
                 
                 <h2> Rendez-vous</h2>
                 <div class= "userInfo">
                     <?php include('rdv.php'); ?>
                 </div>
                 
            
            
            </div>
            
            <?php
            
            
            #<div class = "flexbox-item">
            #<h2>Précédents traitements</h2>
                
             #   <div class= "userInfo">
              #       <table >

               #      </table>
                # </div>
                
            #</div>
                
                ?>
            
            
        </div>
        
    
               
               
    </body>
</html>