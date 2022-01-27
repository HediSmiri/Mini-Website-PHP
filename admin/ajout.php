<?php

    
    $connect=mysql_connect('localhost','root','') ;
    mysql_set_charset("UTF8", $connect);

    mysql_select_db('miniprojet',$connect) ;
    
    if (isset($_POST['submit'])){        
        $marque = $_POST['Marque'];
        $carac = $_POST['carac'];
        $prix = $_POST['prix'];
        $file = $_FILES['img']['tmp_name'];

        if (!isset($file))
            $result= "inserer une image";
        else
        {
        $image = addslashes(file_get_contents($_FILES['img']['tmp_name']));
        $image_name = addslashes($_FILES['img']['name']);
        $image_size = getimagesize($_FILES['img']['tmp_name']);

        if ($image_size==FALSE)
            echo "That isn't a image.";
        else
        {
            $sql = "INSERT INTO pc (Marque ,caracterstique,photo,prix)
            VALUES('{$marque}','{$carac}', '{$image}','{$prix}')";
        }
    }      
        
        $current_id = mysql_query($sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysql_error($conn));
        
        if($current_id)
            $result = "l'element a ajouter avec succes .";
        else
            $result = "error de l'importation ressailler ";
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
    <a href="service.php" id='back'>back</a>
    <form action="" method ='post' enctype="multipart/form-data">
        <table border=1 width=50% cellpadding=20px>
            <th colspan="3" style="font-size: 34px;font-family: monospace;">Ajouter Des Pc</th>
            <tr>
                <td class="text">Marque : </td>
                <td><input type="text" name="Marque" id="Marque"></td>
            </tr>
            <tr>
                <td class="text">caracterstique : </td>
                <td><input type="text" name="carac" id="carac"></td>
            </tr>
            <tr>
                <td class="text">Prix : </td>
                <td><input type="text" name="prix" id="prix"></td>
            </tr>
            <tr>
                <td class="text">image : </td>
                <td><input type="file" name="img" id="img"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="buttons">
                        <input type="submit" class="button" name="submit" value="submit" onclick='return verif()'>
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