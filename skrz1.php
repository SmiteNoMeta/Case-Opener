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
    <title>SKRZYNIA</title>
    <link rel="stylesheet" href="styleskrz.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <a href="zalogowany.php">CASE OPENER</a>
    </header>
    <div class="obrazek">
        <img src="skrz1.png">
        <p>Skrzynia Dreams And Nightmares</p>
        <p>50</p>
    </div>
    <div class="skinki">
        <img src="skrzynia1/fs_scrawl.png">
        <img src="skrzynia1/bizon_cat.png">
        <img src="skrzynia1/beret_melon.png">
        <img src="skrzynia1/mp9_star.png">
        <img src="skrzynia1/dopler.png">
    </div>
    <div class="raffle-roller">
	<div class="raffle-roller-holder">
		<div class="raffle-roller-container" style="margin-left: 0px;">
		</div>
	</div>
    </div>
    <center><span style="font-size: 25px;">Wygrałeś:  <span style="color: green;" id="rolled">Losuje</span>
    <br>
    <form action="skrz1.php" method="post">
        <button type="submit" name="klik">Losuj</button>
    </form>
    <br>
    <div class="inventory"></div>
    <form action="skrz1.php" method="post" id="sprzedaj">
        <input type="text" style='display:none;' name="sell" id="wartosc">
    </form>

    <?php
        $nazwa = $_SESSION['user'];
        if(isset($_POST['klik'])){
            $con = mysqli_connect('localhost','root','','case');
            $q = " SELECT pieniadze FROM rejestracja WHERE nazwa = '$nazwa' ";
            $data = mysqli_query($con, $q);
            while($row = mysqli_fetch_array($data)){
                $p = $row['pieniadze'];
                if($p >= 50){
                    $p-=50;
                    $conn = mysqli_connect('localhost','root','','case');
                    $n = "UPDATE rejestracja SET pieniadze = '$p' WHERE nazwa = '$nazwa' ";
                    mysqli_query($conn, $n);
                    mysqli_close($con);
                    mysqli_close($conn);
                    echo "<span id='open' style='display:none;'>Tak</span>";
                }  
                else {
                echo("Nie masz wystarczająco środków :(");
                }
            }
        }else {
                echo "<span id='open' style='display:none;'>Nie</span>";
        }
        if(!empty($_POST['sell'])){
            $s = $_POST['sell'];
            $con = mysqli_connect('localhost','root','','case');
            $q = " SELECT pieniadze FROM rejestracja WHERE nazwa = '$nazwa' ";
            $data = mysqli_query($con, $q);
            while($row = mysqli_fetch_array($data)){
                $p = $row['pieniadze'];
                $p+=$s;
                $conn = mysqli_connect('localhost','root','','case');
                $n = "UPDATE rejestracja SET pieniadze = '$p' WHERE nazwa = '$nazwa' ";
                mysqli_query($conn, $n);
                mysqli_close($con);
            }
        }
    ?>

    <script>
        var items = {
	    simple: {
		skin: "Five-Seven | Scrawl",
		img: "skrz1/fs_scrawl.png",
        cena: 10
	    },
        little: {
        skin: "PP-Bizon | Space Cat",
        img: "skrz1/bizon_cat.png",
        cena: 30
        },
	    middle: {
		skin: "Dual Berettas | Melondrama",
		img: "skrz1/beret_melon.png",
        cena: 80
	    },
        more: {
        skin: "MP9 | Starlight Protector",
        img: "skrz1/mp9_star.png",
        cena: 150
        },
	    super: {
		skin: "Butterfly knife | Gamma Doppler",
		img: "skrz1/dopler.png",
        cena: 350
	    }
        };
    </script>
    <script src="./skrzynka.js">
    </script>
</body>
</html>