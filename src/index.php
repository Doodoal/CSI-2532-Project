<!DOCTYPE html>
<html>
    <?php
    
   
    if (isset($_SESSION['Rmessage'])){
                echo '
                <script>
                alert("'.$_SESSION['Rmessage'].'");
                
                </script>';
                session_unset();
            }
    
                    

    
    ?>
<head>
<link rel="stylesheet" href="rr.css">
    
     
    
<title> Cabinet dentaire </title>
<link rel="shorcut icon" href="projet/pngs.png">
</head>
<body>
  <header>
  <div id="error"> SI VOUS ETES DE NOUVEAU REDIRIGE ICI ALORS VOS INFORMATIONS SONT INCORRECTES </div>
  </header>
  <body>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>PAGE DE CONNEXION</h3>
            <p>Veuillez entrer vos informations de connexions.</p>
          </div>
        </div>
        <form class="login-form" action="login1.php" method="POST">
          <input type="number" placeholder="SSN" name="SSN"/>
          <input type="password" placeholder="MOT DE PASSE" name="password" />
          <button>CONNEXION</button>
          <p class="message">Vous n'avez pas de compte? <a href="register/">Creez en un</a></p>
        </form>
      </div>
    </div>
</body>
<footer> © 2021 Copyright </footer>

</body>
</html>