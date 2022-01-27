<?php header('Content-type: text/html; charset=utf-8'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pcs</title>
</head>
<link rel="stylesheet" href="../css/Service.css">
<script>
    function bigImg(x) {
  x.style.height = "300px";
  x.style.width = "300px";
}

function normalImg(x) {
  x.style.height = "200px";
  x.style.width = "200px";
}
</script>
<body onload="alert('beinvenu admin');">
    <nav class="navbarMain" id="navbarMain">
        <ul>
            <li><a href="../index.html">Mini-Project</a></li>
            <li><a href="../index.html">Home</a></li>
            <li><a href="message.php">Message</a></li>
            <li>admin</li>
            <li><a href="../pages/service.php">SignOut</a></li>

        </ul>
    </nav>

<table width="90%" bgcolor="#eee" border=1 style="transform: translate(80px,200px);">

<?php

// header('Content-type: text/plain; charset=utf-8');

$connect=mysql_connect('localhost','root','') ;
mysql_set_charset("UTF8", $connect);

mysql_select_db('miniprojet',$connect) ;
$sql = 'Select * from pc ;';
	
$req = mysql_query($sql); 
	
while ($row = mysql_fetch_array($req)){
    echo '<tr> <td>' ;
	echo '<img height=200 width=200 src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/>';
    echo '</td>';

    echo "<td><p style='margin-left: 26px;width: 88%;'>Marque : ".$row['Marque']."<br><br>";
    
    echo $row['caracterstique']."<br><br><span style='color:red'>".$row['prix']." TND </span></p></td>
    <td><button class='button' style='position: relative; '>Acheter</button></td>
    </tr>" ;
}

?>
    <tr>
        <td colspan='3' width = 20px style="border: none;padding-top: 70px;">
        <div class="buttons">
            <a href="ajout.php"><button class="button">Ajout</button></a>
            <a href="modifier.php"><button class="button">Modifier</button></a>
            <a href="supprimer.php"><button class="button">Supprimer</button></a>
        </div>
            
        </td>
    </tr>
    </table>

    <footer>
        <p>CopyRight@2021_Hedi_Smiri</p>
    </footer>
</body>
</html>