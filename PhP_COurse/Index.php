<?php $message = "Hello world" ;
    $voitures = [
        "chevrolet" => [
            "color" => "red",
            "cheveaux" => 9,
            "vitesseM" => 350.9,
        ],
        "bugatti" => [
            "color" => "black",
            "cheveaux" => 18,
            "vitesseM" => 789.78,
        ]
    ]
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <p class= "firstclass"> <?php echo $message;
       ?> </p>
    <form action="./receptionniste.vue.php" method="get">
        <button type="submit">Patients</button>
        <p> saisir texte<input name= "patient" type="text"/> </p>
    </form>

<table>

    <thead>
        <tr>
            <th  class ="thirdClass" >color</th>
            <th class ="thirdClass" > cheveaux</th>
            <th class ="thirdClass" > vitesseM </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($voitures as $voiture){

          ?>
        <tr>
            <td  class = "secondClass"> <?php echo $voiture["color"]; ?> </td>
            <td class = "secondClass"> <?php echo $voiture["cheveaux"];?> </td>
            <td class = "secondClass"> <?php echo $voiture["vitesseM"];?> </td>
        </tr>
       <?php } ?>
    </tbody>
</table>

    
</body>
</html>