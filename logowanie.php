<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGOWANIE</title>
    <link rel="stylesheet" href="stylereje.css">
</head>
<body>
    <div class="podsumowanie">
    <form action="logowanie.php" method="post">
        <h1>Logowanie</h1>
        Podaj nazwe użytkownika:<br> 
        <input type="text" name="nazwa"><br>
        Podaj haslo:<br>
        <input type="password" name="haslo"><br>
        <input type="submit" value="Zaloguj sie">
    </form>
    <?php
        if($_POST){
            $nazwa = $_POST['nazwa'];
            $haslo = $_POST['haslo'];
            if($nazwa!="" && $haslo!=""){
                $con = mysqli_connect('localhost','root','','case');
                $q = " SELECT nazwa, email, haslo, pieniadze FROM rejestracja WHERE haslo = MD5('$haslo') AND nazwa = '$nazwa' ";
                $_SESSION['user'] = $nazwa;
                $data = mysqli_query($con, $q);
                while($row = mysqli_fetch_array($data)){
                    $n = $row['nazwa'];
                    $e = $row['email'];
                    $h = $row['haslo']; 
                }
                header('Location: zalogowany.php');
                mysqli_close($con);
            }
        }
    ?>
    </div>
</body>
</html>