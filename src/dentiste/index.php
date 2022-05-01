<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<title> BLOC DENTISTE </title>
</head>
<body bgcolor="pink" >
	<h1> BIENVENUE AU PORTAIL DES DENTISTES </h1>
	<h2> <img src="sante.jpg" width="300"> </h2>
	

	<p>Veillez lire attentivement les directives afin d'accéder au dossier du patient :</p>

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
	<form action="exp.php" method="POST">
		<div>
		<label> SSN:</label>
		<input type="number" name="SSN" placeholder="Entrez le SSN du patient" required>
            <input type = submit value = "Voir informations patient">
	</div>
	<br>
	<div>
	
	
	<p> 
		
		<br>
		<br>
		<hr> 
		

        </p>
		
	</form>


</body>
</html>