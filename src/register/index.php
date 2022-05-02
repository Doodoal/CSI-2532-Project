<!DOCTYPE html>
        <html>
            
            <?php

session_start();
            
             if (isset($_SESSION['Rmessage'])){
                echo '
                <script>
                alert("'.$_SESSION['Rmessage'].'");
                
                </script>';
                 session_unset();
                 
            }
            
            
?>
        <head>
           
        <title>S'inscrire</title>
        
        <link rel="stylesheet" href="style.css">
       
        
       
    
             
            
            </head>
    
   <body>
            
            
         <div class = "center-it  "> 
    <h2> Veuillez renseigner vos données</h2>
    <div class= "userInfo">
        <form action="insert.php"
              method ="post" 
             >

            <div class= "box">
                <label class = "infoType"> Nom </label>

               <input type = "text" 
                       name = "surname" 
                       placeholder = "Nom"
                       required
                       
                       >
            </div>

             <div class= "box">
                <label class = "infoType"> Prénom(s) </label>
                 
                 <input type = "text" 
                        name = "name" 
                        placeholder = "Prénom(s)"
                        required 
                 >
                

            </div>

            <div class= "box">
                <label class = "infoType"> Date de Naissance </label>
                
                <input type = "date" 
                       name = "birthday" 
                       required
                       
                    >
            </div>



            <div class= "box">
                <label class = "infoType"> Email</label>
                
                <input type = "email"
                       name = "email" 
                       placeholder = "email"
                       required> 
                
                
                
            </div>


           



        
            <div class= "box">
                <label class = "infoType"> SSN </label>
                
               <input type = "number" 
                       name = "ssn" 
                       placeholder = "SSN"
                      minlength = "9"
                       required>
                
                     

               
                
                
               <div id = "roleID">
             
                 <label> Vous etes : </label>
                 <select name = "role" required > 
                    <option value = "" disabled selected>
                        
                    </option>
                    <option value = "dentiste"> 
                     Dentiste/ Hygieniste
                     </option>
                     
                    <option value ="receptionniste" >
                     Receptionniste
                    </option>
                     
                    <option value = "patient">
                     Patient
                     </option>
             </select>
                 
             </div>
                
                
            </div>

            <div class= "box">
                <label class = "infoType"> Mot de passe </label>
                
              

                
                 <input type = "password" 
                       name = "password" 
                        placeholder = "Mot de passe"
                        minlength = 6
                       required>
                     

                
                
            </div>

            <div class= "box">
                <label class = "infoType"> Confirmation Mot de passe </label>
               <input type = "password" 
                       name = "Npassword" 
                       placeholder = "Confirmation Mot de passe"
                       minlength = 6
                       required>
            </div>

            <div class = "submitBtn">
            <input type = "submit" value = "S'inscrire">
            </div>




        </form>
    </div>

</div>

   
   </body>


</html>