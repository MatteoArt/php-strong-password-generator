<?php
session_start();

include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>PHP Strong Password Generator</h1>
    <form action="" method="get">
        <label for="lunghezza">Lunghezza password:</label>
        <input type="number" id="lunghezza" name="lung">
        <div class="input-group">
            <input type="checkbox" id="minuscole" name="minuscole">
            <label class="check-label" for="minuscole">Lettere minuscole (abc)</label>
        </div>
        <div class="input-group">
            <input type="checkbox" id="maiuscole" name="maiuscole">
            <label class="check-label" for="maiuscole">Lettere maiuscole (ABC)</label>
        </div>
        <div class="input-group">
            <input type="checkbox" id="numeri" name="numeri">
            <label class="check-label" for="numeri">Numeri (123)</label>
        </div>
        <div class="input-group">
            <input type="checkbox" id="simboli" name="simboli">
            <label class="check-label" for="simboli">Simboli casuali (!#$)</label>
        </div>
        <div class="input-group">
            <input type="checkbox" id="ripeti" name="ripeti">
            <label class="check-label" for="ripeti">Ripeti caratteri uguali</label>
        </div>
        <button class="btn" type="submit">Invia</button>
    </form>
    <div class="container">
        <?php
        if (isset($_GET["lung"])) {
            $input = trim($_GET["lung"]);
            if ($input === '') {
                echo "<div class='txt-danger'>Non puoi lasciare il campo vuoto!</div>";
            } else {
                $lunghezza = intval($input);
                if ($lunghezza < 7) {
                    echo "<div class='txt-danger'>La lunghezza della password deve essere di minimo 7 caratteri!</div>";
                } else {
                    $password = genPassword($lunghezza);
                    $_SESSION["password"] = $password;

                    /********************
                     * salvo dati input delle checkbox
                     *******************/
                    $_SESSION["minusc"] = $_GET["minuscole"];
                    $_SESSION["maiusc"] = $_GET["maiuscole"];
                    $_SESSION["num"] = $_GET["numeri"];
                    $_SESSION["simb"] = $_GET["simboli"];
                    $_SESSION["uguali"] = $_GET["ripeti"];

                    header('Location: ./password.php');
                }
            }
        }

        ?>
    </div>
</body>

</html>