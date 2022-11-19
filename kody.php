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
    <title>KODY</title>
    <link rel="stylesheet" href="stylekody.css">
</head>
<body>
    <header>
        <a href="zalogowany.php">CASE OPENER</a>
    </header>
    <main>
        <div class="formularz">
        <form action="kody.php" method="post">
        WPROWADŹ KOD: <input type="text" name="kod"><br><br>
        <input type="submit" value="Wprowadź">
        </form>
        </div>
    </main>
    <?php
        if ($_POST){
            $kod = $_POST['kod'];
            $nazwa = $_SESSION['user'];
            if($kod=="tysiac"){
                $con = mysqli_connect('localhost','root','','case'); 
                $q = " SELECT pieniadze FROM rejestracja WHERE nazwa = '$nazwa' ";
                $data = mysqli_query($con, $q);
                while($row = mysqli_fetch_array($data)){
                    $p = $row['pieniadze'];
                    $p+=1000;
                }
                $conn = mysqli_connect('localhost','root','','case');
                $n = "UPDATE rejestracja SET pieniadze = '$p' WHERE nazwa = '$nazwa' ";
                mysqli_query($conn, $n);
                mysqli_close($con);
                mysqli_close($conn);
            }
            else if($kod=="dziesiectysiecy"){
                $con = mysqli_connect('localhost','root','','case'); 
                $q = " SELECT pieniadze FROM rejestracja WHERE nazwa = '$nazwa' ";
                $data = mysqli_query($con, $q);
                while($row = mysqli_fetch_array($data)){
                    $p = $row['pieniadze'];
                    $p+=10000;
                    $row['pieniadze'] == $p;
                }
                $conn = mysqli_connect('localhost','root','','case');
                $n = "UPDATE rejestracja SET pieniadze = '$p' WHERE nazwa = '$nazwa' ";
                mysqli_query($conn, $n);
                mysqli_close($con);
                mysqli_close($conn);
            }
            else if($kod=="sekret"){
                $con = mysqli_connect('localhost','root','','case'); 
                $q = " SELECT pieniadze FROM rejestracja WHERE nazwa = '$nazwa' ";
                $data = mysqli_query($con, $q);
                while($row = mysqli_fetch_array($data)){
                    $p = $row['pieniadze'];
                    $p+=5000;
                    $row['pieniadze'] == $p;
                }
                $conn = mysqli_connect('localhost','root','','case');
                $n = "UPDATE rejestracja SET pieniadze = '$p' WHERE nazwa = '$nazwa' ";
                mysqli_query($conn, $n);
                mysqli_close($con);
                mysqli_close($conn);
            }
        }
    ?>
</body>
</html>
