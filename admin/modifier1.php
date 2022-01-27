<?php   
        // Initialize the session
        session_start();
        // Store the submitted data sent
        // via POST method, stored 
        // Temporarily in $_POST structure.

        $connect=mysql_connect('localhost','root','') ;
        mysql_set_charset("UTF8", $connect);
        mysql_select_db('miniprojet',$connect) ;
        global $x ;
        if(isset($_POST['submit']))
            if (!empty($_POST['sss'])){
                $select= $_POST['sss'];
                $_SESSION['select'] = $select;    
                $sql ="Select Marque , caracterstique , prix , photo from pc where Marque = '".$select."';";
                $req = mysql_query($sql);
                $row = mysql_fetch_array($req);
                $x = $row ;
                $marque = $x['Marque'];
                $carac = $x['caracterstique'];
                $prix = $x['prix'];
                $_SESSION['photo'] = $x['photo'];
            }
        if(isset($_POST['submit1'])){     
            $marque = $_POST['Marque'];
            $carac = $_POST['carac'];
            $prix = $_POST['prix'];

            $sql2 = "UPDATE `miniprojet`.`pc` SET `Marque` = '{$marque}' , `caracterstique` = '{$carac}' , `prix` = '{$prix}' WHERE `pc`.`Marque` ='{$_SESSION['select']}';" ;
            $current_id = mysql_query($sql2) or die(mysql_error($connect)) ;

            if($current_id)
                $result = "l'element est modifier avec succes .";
            else
                $result = "error de modification ressailler ";    
        }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajout</title>
    <link rel="stylesheet" href="../css/ajout.css">
</head>
<body>
    <a href="modifier.php" id='back'>back</a>
    <form action="" method ='post' enctype="multipart/form-data">
        <table border=1 width=50% cellpadding=20px style="margin:56px auto;">
            <th colspan="3" style="font-size: 34px;font-family: monospace;">Modifier Pc</th>
            <tr>
                <td class="text">Marque : </td>
                <td><input type="text" name="Marque" id="Marque" value="<?php echo $marque;?>"></td>
            </tr>
            <tr>
                <td class="text">caracterstique : </td>
                <td><input type="text" name="carac" id="carac" value="<?php echo $carac;?>"></td>
            </tr>
            <tr>
                <td class="text">Prix : </td>
                <td><input type="text" name="prix" id="prix" value="<?php echo $prix;?>"></td>
            </tr>
            <tr>
                <td class="text">image : </td>
                <td>
                <?php 
                	echo '<img id ="mod" height=100 width=100 src="data:image/jpeg;base64,'.base64_encode($_SESSION['photo']).'"/>';
                ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="buttons">
                        <input type="submit" class="button" name="submit1" value="submit" onclick='return verif1()'>
                        <input type="reset" class="button" name="" id="">
                    </div>
                   
                </td>
                
            </tr>
        </table>
        <p id="php1">
            <?php
                if (!empty($result))
                    echo $result ;
            ?>
        </p>
    </form>
    <script src="../js/jquery.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>