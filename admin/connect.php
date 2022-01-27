<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/connect.css">
    <title>Login</title>
    <style>
        #php{
            color: red;
            font-size: 20px;
            position: absolute;
            left: 80vh;
            top: 24vh;
        }
    </style>
</head>
<body>
    <form class="box" action="" method="POST">
        <h1>Login</h1>
        <input type="text" name = 'Username' placeholder="Username" required>
        <input type="password" name='Password' placeholder="Password" required>
        <input type="submit" name='submit' value="Login">
        <a href="">Forgot Password</a><br>
        <a href="">Create account</a>^
        <?php $result?>
    </form>
</body>
</html>

<?php

    $connect=mysql_connect('localhost','root','') ;
    mysql_set_charset("UTF8", $connect);
    mysql_select_db('miniprojet',$connect) ;

    if (isset($_POST['submit']))
    {
        $email = $_POST['Username'];
        $password = $_POST['Password'];
        $req = 'SELECT * from admin ;';
        $res = mysql_query($req);
        while ($row = mysql_fetch_array($res)){
            if (($email == $row['email']) and ($password ==$row['pass'])){
                header("Location: service.php");
                die();
            }
        }
        echo '<p id="php">Error email ou mot de passe incorrect</p>';

    }
    

?>