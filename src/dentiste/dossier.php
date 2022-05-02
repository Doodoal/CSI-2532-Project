

<!DOCTYPE html>
<html>
    <?php 
      session_start();  
        
    
     
         $ID = $_SESSION['ID'];   
        
        if (!isset($SSN)){
           $SSN = 0; 
        }?>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<title> BLOC DENTISTE </title>
</head>
<body  >
	<h1> BIENVENUE AU PORTAIL DES DENTISTES </h1>
	<h2> <img src="sante.jpg" width="300"> </h2>
	
    <p>
    <a href = "userInfo.php"> <h2>Voir/Modifier ses informations personelles </h2></a>
    </p>
	<p>Chercher un patient par SSN </p>

	<ul>
		-Entrer les informations suivantes pour identifier le patient 
		<br>
	    -Si le patient est nouveau à la clinique assurez-vous qu'un dossier a été créé afin de pouvoir
	    remplir son dossier et y accéder 
        <br>

		<h3>
			<strong> CES INFORMATIONS DOIVENT ETRE CONFIDENTIELLES ET NON PARTAGEES </strong>
		</h3>
	</ul>
	<form action="dossier.php" method="POST">
		<div>
		<label> SSN:</label>
		<input type="number" name="SSN" placeholder="Entrez le SSN du patient" required>
            <input type = submit value = "Voir informations patient">
	</div>
	
	</form>
    
        <?php include('exp.php'); ?>
	
        
        <p>
        <br>
        <br>
        </p>
        <div class = "flexbox-container">
        
            <div class="flexbox-item">
            <h2>Rendez vous avec tous vos patients</h2>
            <br>
            
            <?php include('rdv2.php');?>
        
            
            </div>
        
	
        </div>


</body>
</html>
