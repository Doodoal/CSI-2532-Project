<!DOCTYPE html>
        <html>
        <head>
            
             
            
            </head>
    
    <?php
        
            if (isset($_SESSION['Message'])){
                echo '
            <script>
                alert("'.$_SESSION['Message'].'");
                
        </script>';
            }
        #Connexion
        try
        {
            $db= new PDO('mysql:host=localhost;dbname=cabinet_dentaire;charset=utf8', 'root', 'root');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }

        
        $sqlQuery = 'SELECT *
        
        
        FROM utilisateur WHERE SSN = :SSN ';

        $dataStatement = $db->prepare($sqlQuery);
            
        $dataStatement->bindParam(':SSN', $SSN);
    
        $dataStatement->execute();
        $datas = $dataStatement->fetchAll();
    
        foreach ($datas as $data) {
            $Uname = $data['Name']?? 'Nom non renseigné';
            $Upassword = $data['Password']?? '---------';
            $Usurname = $data['surname']?? 'Prénom(s) non renseigné(s)';
            $Ubirthday = $data['birthday'] ?? date("Y-m-d");
            $Uemail = $data['email'] ??'Veuillez renseigner votre email';
            
            $Ustreet = $data['street'] ??'Veuillez renseigner votre rue';
            $Ucity = $data['city'] ??'Veuillez renseigner votre ville';
            $Uprovince = $data['province']?? 'Veuillez renseigner votre province' ;
            
            $Ucodepostal = $data['code_postal'] ?? 'Veuillez renseigner votre code postal' ;
        }
            $currentDate = date("Y-m-d");
            $age = $age = date_diff(date_create($Ubirthday), date_create($currentDate));
            

    ?>
    

    
    




<div class = "flexbox-item  "> 
    <h2> Données personnelles</h2>
    <div class= "userInfo">
        <form action="update.php"
              method ="post" 
              onsubmit = "return validate();">

            <div class= "box">
                <label class = "infoType"> Nom </label>

                <?php

                echo
                '<input type = "text" 
                       name = "surname" 
                       value= "'.$Uname.' " 
                       disabled= "disabled"
                       >'

                ?>
            </div>

             <div class= "box">
                <label class = "infoType"> Prénom(s) </label>
                 
                 <?php
                 
                 echo '<input type = "text" 
                       name = "name" 
                       value= "'.$Usurname.'" 
                       disabled= "disabled">'
                 ?>
                

            </div>

            <div class= "box">
                <label class = "infoType"> Date de Naissance </label>
                
                <?php
                    
                echo '<input type = "date" 
                       name = "birthday" value="'.$Ubirthday.'" 
                       disabled= "disabled">'
                    
                ?>
            </div>



            <div class= "box">
                <label class = "infoType"> Age</label>
                <?php
                
                    echo '<input type = "number" 
                       name = "age" 
                       value = "'.$age->format("%y").'"
                       disabled= "disabled">'
                    
                    ?>
            </div>


            <div class= "box">
                <label class = "infoType"> Email</label>
                
                <?php
                    
                echo '<input type = "email"
                       name = "email" 
                       value = "'.$Uemail.'"
                       required> '
                
                ?>
                
            </div>


            <h3> Adresse</h3>


            <div class= "box">
                <label class = "infoType"> Numéro et Nom de rue</label>
                
                <?php
                    
                echo '<input type = "text" 
                       name = "street" 
                       value = "'.$Ustreet.'"
                       required> '
                
                ?>
                
            </div>

            <div class= "box">
                <label class = "infoType"> Ville</label>
                
                <?php
                    
                echo ' <input type = "text" 
                       name = "city" 
                       value = "'.$Ucity.'"
                       required> '
                
                ?>
                
            </div>

            <div class= "box">
                <label class = "infoType"> Province</label>
                
                <?php
                    
                echo ' <input type = "text" 
                       name = "province" 
                       value = "'.$Uprovince.'"
                       required> '
                
                ?>
                
            </div>

            <div class= "box">
                <label class = "infoType"> Code postal</label>
                <?php
                    
                echo ' <input type = "text" 
                       name = "code_postal" 
                       value = "'.$Ucodepostal.'"
                       required> '
                
                ?>
                
            </div>



            <h3> Informations de connexion</h3>
            <div class= "box">
                <label class = "infoType"> SSN </label>
                
                <?php

                echo
                 '<input type = "number" 
                       name = "ssn" 
                       value = "'.$SSN.'"
                       disabled= "disabled"
                       required>'
                
                     

                ?>
                
                
               
            </div>

            <div class= "box">
                <label class = "infoType"> Mot de passe </label>
                
                 <?php

                echo
                 '<input type = "password" 
                       name = "password" 
                       value = "'.$Upassword.'"
                       required>'
                     

                ?>
                
            </div>

            <div class= "box">
                <label class = "infoType"> Confirmation Mot de passe </label>
                <?php

                echo
                 '<input type = "password" 
                       name = "Npassword" 
                       value = "'.$Upassword.'"
                       required>'
                     

                ?>
            </div>

            <div class = "submitBtn">
            <input type = "submit" value = "Modifier Informations">
            </div>




        </form>
    </div>

</div>


</html>