<?php
session_start();
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
    <div class="container">
        <div class="password-container mt-pas">
            <?php 
            if ($_SESSION["eliminati"] > 0) {
                $eliminati = $_SESSION["eliminati"];
                echo "<div id='ripeti'>Sono stati eliminati $eliminati caratteri che si ripetono</div>";
            }
            ?>
            <?php 
            $lunghezza = strlen($_SESSION["password"]);
            if ($lunghezza < 8) {
                echo "<span class='msg-danger '>Debole</span>";
            } else if ($lunghezza >= 8 && $lunghezza <= 12) {
                echo "<span class='msg-medium'>Media</span>";
            } else if ($lunghezza > 12) {
                echo "<span class='msg-strong'>Forte</span>";
            }
            ?>
            <div style="margin: 10px 0;">Lunghezza password: <?php
                echo "<span class='visual'>$lunghezza</span> caratteri";
            ?></div>
            <span>La tua password è:</span>
            <span class="password">
                <?php
                echo $_SESSION["password"];
                ?>
            </span>
            <div style="margin-top: 15px;">
                <div class="reset">
                    <a href="reset.php">Resetta password</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>