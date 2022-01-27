<?php

    $conn=mysql_connect('localhost','root','');
    mysql_set_charset("UTF8", $conn);
    mysql_select_db('miniprojet',$conn);
    $sql = 'Select Marque from pc ;';
    $req = mysql_query($sql);
    $arr = array();
    while ($row = mysql_fetch_array($req)){
        $arr[$row['Marque']] = $row['Marque'];
    } 

    if (isset($_POST['submit'])){        
        
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
<script>
    function verif(){
        var pc = document.getElementById('sss');
        var selectedValue = pc.options[pc.selectedIndex].value;
        if (selectedValue == ''){
            alert("ton selection n'est pas just");
            return false ;
        }
    }
</script>
<body>
    <a href="service.php" id='back'>back</a>
    <form action="modifier1.php" method ='post'>
        <table border=1 width=50% cellpadding=20px>
            <th colspan="3" style="font-size: 34px;font-family: monospace;">Modifier donner Pc</th>
            <tr>
                <td>Select Pc : </td>
                <td><select name="sss" id="sss">
                    <option value="">select</option>
                    <?php
                        foreach($arr as $i){
                            echo "<option value='".$i."'>".$i."</option>";
                        };
                    ?>
                    
                </select></td>
            </tr>
            <tr>
                <td colspan="2">
                    
                    <div class="buttons">
                        <input type="submit" class="button" value="submit" name='submit' onclick=" return verif()">
                        <input type="reset" class="button" name="" id="">
                    </div>
                </td>         
            </tr>
        </table>
        <p id="php">
            <?php
                if (!empty($r))
                    echo $r ;
            ?>
        </p>
    </form>
</body>
</html>