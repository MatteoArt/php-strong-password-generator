<?php    
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
        <input type="number" id="lunghezza" name="lung"><br>
        <button class="btn" type="submit">Invia</button>
    </form>
    <div class="container">
    <?php 
    if (isset($_GET["lung"])) {
        $input = trim($_GET["lung"]);
        if($input === '') {
            echo "<div class='txt-danger'>Non puoi lasciare il campo vuoto!</div>";
        } else {
            $lunghezza = intval($input);
            if ($lunghezza < 7) {
                echo "<div class='txt-danger'>La lunghezza della password deve essere di minimo 7 caratteri!</div>";
            } else {
                ?>
                <div class="password-container">
                    <span>La tua password è:</span>
                    <span class="password">
                        <?php 
                        echo genPassword($lunghezza);
                        ?>
                    </span>
                </div>
                <?php
            }
        }
    
    
        
    
    }
    
    ?>
    </div>
</body>
</html>