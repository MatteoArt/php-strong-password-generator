<?php
session_start();
var_dump($_SESSION);
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