<?php
session_start();
if(!isset($_SESSION['user'])) {
    header('Location: logowanie.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZALOGOWANY</title>
    <link rel="stylesheet" href="stylelog.css">
</head>
<body>
    <?php
        $nazwa = $_SESSION['user'];
        if($nazwa!=""){
            $con = mysqli_connect('localhost','root','','case');
            $q = " SELECT nazwa, email, haslo, pieniadze FROM rejestracja WHERE nazwa = '$nazwa' ";
            $data = mysqli_query($con, $q);
            while($row = mysqli_fetch_array($data)){
                $n = $row['nazwa'];
                $e = $row['email'];
                $h = $row['haslo'];
                ?>
                <header>
                    <h2>CASE OPENER</h2><img src="skrzyniahead.png">
                    <div class="profil">
                        <?php
                        $p = $row['pieniadze'];
                        echo ("Witaj ".$n."!"."<br>");
                        echo ("Ilość funduszy: ".$p);
                        ?>
                    </div>
                </header>
                <?php
            }
            mysqli_close($con);
        }
    ?>
    <nav>
        <a href="darmowa.php">FREE CASE</a>
        <a href="kody.php">KODY</a>
    </nav>
    <main>
        <h2>CASES</h2>
    </main>
    <div class="skrzynki">
        <div class="skrz1">
        <a href="skrz1.php"><img src="skrz1.png" alt="skrz1"></img></a>
        <p>50</p>
        </div>
        <div class="skrz2">
        <a href="skrz2.php"><img src="skrz2.png" alt="skrz2"></img></a>
        <p>100</p>
        </div>
        <div class="skrz3">
        <a href="skrz3.php"><img src="skrz3.png" alt="skrz3"></img></a>
        <p>200</p>
        </div>
        <div class="skrz4">
        <a href="skrz4.php"><img src="skrz4.png" alt="skrz4"></img></a>
        <p>500</p>
        </div>
    </div>
    
    <footer>
        <p>AUTOR: MARCIN MIASTKOWSKI</p>
    </footer>
</body>
</html>
