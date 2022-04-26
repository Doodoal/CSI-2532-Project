<!DOCTYPE html>
<html>
    <head>
        <title>Portail Patient</title>
        
        <link rel="stylesheet" href="style.css">
        
    </head>
    
    <?php 
    
    $Uname = "Nom non renseigné";
    
    ?>
    
    
    
    <body>
        
        <div class = "header">
        <h1 >&nbsp;   Bienvenue</h1>
        <a href = "blank.php"><img src = "Log_out.png" alt="Se déconnecter" > </a>
        </div>
        
        
        <div class = "flexbox-container">
            
             <?php include('userInfo.php'); ?>
            
            
            
             <div class = "flexbox-item"> 
                 
                 <h2> Rendez-vous</h2>
                 <div class= "userInfo">
                     <table >

                     </table>
                 </div>
                 
            
            
            </div>
            
            
            <div class = "flexbox-item">
            <h2>Précédents traitements</h2>
                
                <div class= "userInfo">
                     <table >

                     </table>
                 </div>
                
            </div>
            
            
        </div>
        
    
               
               
    </body>
</html>