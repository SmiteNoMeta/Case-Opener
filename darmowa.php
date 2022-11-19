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
    <title>PROFIL</title>
    <link rel="stylesheet" href="stylekody.css">
</head>
<body>
    <header>
        <a href="zalogowany.php">CASE OPENER</a>
    </header>
    <img src="darmowa.png">
    <main>
        <form action="darmowa.php" method="post">
            ODBIERZ SWOJĄ DARMOWĄ SKRZYNKĘ!!!<br>
            <input type="submit" name="klik">
        </form>
    </main>

    <?php
        if(isset($_POST['klik'])){
            $nazwa = $_SESSION['user'];
            $con = mysqli_connect('localhost', 'root', '', 'case');
            $q = "SELECT data, pieniadze from rejestracja WHERE nazwa = '$nazwa' ";
            $data = mysqli_query($con, $q);
            while ($row = mysqli_fetch_array($data)) {
                $dat = $row['data'];
                $pie = $row['pieniadze'];
            }
            if($dat=='0'){
                $nowadat = time()-86400;
                $n = " UPDATE rejestracja SET data='$nowadat' WHERE nazwa = '$nazwa' ";
                mysqli_query($con, $n);
            }
            else{
                $time = time();
                $czas = $time - $dat;
                if($czas >= 86400) {
                    $p = rand(0,4);
                    if($p==0){
                        echo("Twoja nagroda: 500 Kredytów");
                        $pie+=500;
                        $c = " UPDATE rejestracja SET pieniadze = '$pie' WHERE nazwa = '$nazwa' ";
                        mysqli_query($con, $c);
                    }
                    else if($p==1){
                        echo("Twoja nagroda: 300 Kredytów");
                        $pie+=300;
                        $c = " UPDATE rejestracja SET pieniadze = '$pie' WHERE nazwa = '$nazwa' ";
                        mysqli_query($con, $c);
                    }
                    else if($p==2){
                        echo("Twoja nagroda: 700 Kredytów");
                        $pie+=700;
                        $c = " UPDATE rejestracja SET pieniadze = '$pie' WHERE nazwa = '$nazwa' ";
                        mysqli_query($con, $c);
                    }
                    else if($p==3){
                        echo("Twoja nagroda: 2000 Kredytów");
                        $pie+=2000;
                        $c = " UPDATE rejestracja SET pieniadze = '$pie' WHERE nazwa = '$nazwa' ";
                        mysqli_query($con, $c);
                    }
                    else{
                        echo("Twoja nagroda: 100 Kredytów");
                        $pie+=100;
                        $c = " UPDATE rejestracja SET pieniadze = '$pie' WHERE nazwa = '$nazwa' ";
                        mysqli_query($con, $c);
                    }
                }
                else{
                    echo("Nie możesz jeszcze otworzyć darmowej skrzyni! Poczekaj muszą minąć 24h od otworzenia darmowej skrzynki :)");
                }
                $s = " UPDATE rejestracja SET data='$time' WHERE nazwa = '$nazwa' ";
                mysqli_query($con, $s);
            }
            mysqli_close($con);
        }
        
    ?>
</body>
</html>