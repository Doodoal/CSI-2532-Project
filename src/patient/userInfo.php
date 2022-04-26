<!DOCTYPE html>
<html>
  
    <?php 
    
        #Connexion
        try
        {
            $db= new PDO('mysql:host=localhost;dbname=cabinet_dentaire;charset=utf8', 'root', 'root');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }

    
    $Uname = "Nom non renseigné";
    
    ?>
    

    
    




<div class = "flexbox-item  "> 
    <h2> Données personnelles</h2>
    <div class= "userInfo">
        <form action="_blank"
              method ="get" >

            <div class= "box">
                <label class = "infoType"> Nom </label>

                <?php

                echo
                '<input type = "text" 
                       name = "surname" 
                       placeholder= "'.$Uname.' " 
                       disabled= "disabled"
                       >'

                ?>
            </div>

             <div class= "box">
                <label class = "infoType"> Prénom(s) </label>
                <input type = "text" 
                       name = "name" 
                       placeholder= "Prénom(s) non renseigné(s)" 
                       disabled= "disabled">

            </div>

            <div class= "box">
                <label class = "infoType"> Date de Naissance </label>
                <input type = "date" 
                       name = "birthday" 
                       disabled= "disabled">
            </div>



            <div class= "box">
                <label class = "infoType"> Age</label>
                <input type = "number" 
                       name = "age" 
                       placeholder = "0"
                       disabled= "disabled">
            </div>


            <div class= "box">
                <label class = "infoType"> Email</label>
                <input type = "email"
                       name = "email" 
                       placeholder = "Veuillez renseigner un email"
                       required>
            </div>


            <h3> Adresse</h3>


            <div class= "box">
                <label class = "infoType"> Numéro et Nom de rue</label>
                <input type = "text" 
                       name = "street" 
                       placeholder = "Veuillez renseigner votre rue"
                       required>
            </div>

            <div class= "box">
                <label class = "infoType"> Ville</label>
                <input type = "text" 
                       name = "city" 
                       placeholder = "Veuillez renseigner votre ville"
                       required>
            </div>

            <div class= "box">
                <label class = "infoType"> Province</label>
                <input type = "text" 
                       name = "province" 
                       placeholder = "Veuillez renseigner votre province"
                       required>
            </div>

            <div class= "box">
                <label class = "infoType"> Code postal</label>
                <input type = "text" 
                       name = "code-postal" 
                       placeholder = "Veuillez renseigner votre province"
                       required>
            </div>



            <h3> Informations de connexion</h3>
            <div class= "box">
                <label class = "infoType"> SSN </label>
                <input type = "number" 
                       name = "ssn" 
                       placeholder = "0000"
                       disabled= "disabled"
                       required>
            </div>

            <div class= "box">
                <label class = "infoType"> Mot de passe </label>
                <input type = "password" 
                       name = "password" 
                       placeholder = "Veuillez entrer un mot de passe"
                       required>
            </div>

            <div class= "box">
                <label class = "infoType"> Confirmation Mot de passe </label>
                <input type = "password" name = "password" 
                       placeholder = "Re-entrez le nouveau mot de passe"
                        required>
            </div>

            <div class = "submitBtn">
            <input type = "submit" value = "Modifier Informations">
            </div>




        </form>
    </div>

</div>


</html>