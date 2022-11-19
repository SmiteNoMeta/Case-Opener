<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZAREJESTROWANO</title>
    <link rel="stylesheet" href="stylereje.css">
</head>
<body>
<div class="podsumowanie">
<?php
        $nazwa = $_POST['nazwa'];
        $email = $_POST['email'];
        $haslo = $_POST['haslo'];
        $haslo2 = $_POST['haslo2'];
        $regu = $_POST['regu'];

        if(empty($regu)){
            echo("Nie potwierdziłeś regulaminu!!!<br><br>");
        }
        if(!empty($nazwa) && !empty($email) && !empty($haslo) && !empty($haslo2) && !empty($regu)){
            if($haslo == $haslo2){
                if(strlen($haslo)>=10){
                    $con = mysqli_connect('localhost','root','','case');
                    $q = " INSERT INTO rejestracja VALUES ('$nazwa','$email',MD5('$haslo'),'','1000')";
                    mysqli_query($con, $q);
                    mysqli_close($con);
                    echo("Witaj ".$nazwa."!<br>");
                    echo("Miło cię poznać!"."<br>");
                    echo("Teraz tylko logowanie, a później otwieranie :)"."<br>");
                    ?><a href="logowanie.php">Kliknij by się zalogować</a><?php
                }
                else{
                    echo("Hasło, które podałeś jest za krótkie");
                }
            }
            else{
                echo("Hasła się różnią");
            }
        }
        else{
            echo("Nie uzupełniłeś wszystkiego");
        }

    ?>
</div>
</body>
<html>