<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REJESTRACJA</title>
    <link rel="stylesheet" href="stylereje.css">
</head>
<body>
    <header>
        <div class="naglowek">
        CASE OPENER<br><br>
        </div>
    </header>
    <div class="rejestr">
        <h3>Zarejstruj się :)</h3>
        <form action="zarejestrowano.php" method="post">
        Podaj nazwę użytkownika<br>
        <input type="text" name="nazwa"><br>
        Podaj email<br>
        <input type="text" name="email"><br>
        Podaj hasło<br>
        <input type="password" name="haslo"><br>
        Powtórz hasło<br>
        <input type="password" name="haslo2"><br><br>
        <input type="checkbox" name="regu">Zgadam się na przetwarzanie moich danych osobowych<br><br>
        <input type="reset"><input type="submit" value="Rejestruj">
        </form>
    </div>
</body>
</html>