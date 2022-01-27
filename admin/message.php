<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message coming</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="service.php" id="back">back</a>
    <h1 style="margin: 20px auto;text-align: center;color: red;">Les Message d'utilisateurs</h1>
    <table border=1 id="customers">
        <tr>
            <td>EMAIL</td>
            <td>NOM</td>
            <td>PRENOM</td>
            <td>PAYS</td>
            <td colspan=2>Messages</td>
        </tr>
        <?php
            $connect=mysql_connect('localhost','root','') ;
            mysql_set_charset("UTF8", $connect);
            mysql_select_db('miniprojet',$connect) ;
            $req = 'SELECT * from contact ;';
            $res = mysql_query($req);
            while ($row = mysql_fetch_array($res)){
                  echo '
                    <tr>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['nom'].'</td>
                        <td>'.$row['prenom'].'</td>
                        <td>'.$row['pays'].'</td>
                        <td>'.$row['subjectt'].'</td>
                        <td><button type ="submit"  class="button">Repondre</button></td>
                    </tr>
                  ';      
                    
            }

        ?>
    </table>
</body>
</html>