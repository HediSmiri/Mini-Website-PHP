<?php

$connect=mysql_connect('localhost','root','') ;

mysql_select_db('miniprojet',$connect) ;

if (isset($_POST['submit'])) {

  $firstname=$_POST["firstname"];
  $lastname=$_POST["lastname"];
  $email=$_POST["email"];
  $country=$_POST["country"];
  $subject=$_POST["subject"];


  //requête pour insérer des lignes dans la table personne

  $sql='INSERT INTO contact (nom,prenom,email,pays,subjectt) VALUES ("'.$firstname.'", "'.$lastname.'", "'.$email.'", "'.$country.'","'.$subject.'")';
  
  //on lance la requête (mysql_query) et on impose un message d’erreur si la requête ne se passe pas bien (or die)
  $req =mysql_query($sql) or die ('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()) ;

  //afficher un message de succès si mysql_query() ne retourne pas false.

  if ($req) 
      $result ='Merci de contacter en va repondre dans 24 h ';
  else
      $result ='Verfier votre information';

}
    
//fermer la connexion MySQL
mysql_close() ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/contact.css">
</head>
<body>
    <div class="back">
    <div class="container">
        <a href="../index.html" id="back">back</a>
        <div class="php"><?php if (!empty($result)) echo $result; ?></div>
        <form action="" method="POST">
      
          <label for="fname">Nom</label>
          <input type="text" id="fname" name="firstname" placeholder="Your name.." >
      
          <label for="lname">Prenom</label>
          <input type="text" id="lname" name="lastname" placeholder="Your last name..">
          
          <label for="lname">Email</label>
          <input type="email" id="email" name="email" placeholder="Your email.." >
      
          <label for="country">Pays</label>
          <select id="country" name="country">
            <option value="">Select</option>
            <option value="Tunisia">Tunisia</option>
            <option value="australia">Australia</option>
            <option value="canada">Canada</option>
            <option value="usa">USA</option>
          </select>
      
          <label for="subject">Sujet</label>
          <textarea id="subject" name="subject" placeholder="Write something.." style="height:100px"></textarea>
      
          <input type="submit" value="Envoyer" name="submit" onclick="return formulaire()">

        </form>
      </div>
    </div>
    <script src="../js/contact.js"></script>
</body>
</html>

