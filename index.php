<?php    

function genPassword($lung) {
    $letters = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r",
    "s","t","u","v","w","x","y","z"];
    $uppercase = [];
    foreach ($letters as $letter) {
        $uppercase[] = strtoupper($letter);
    }
    //array di simboli e numeri
    $numbersSymbols = ["0","1","2","3","4","5","6","7","8","9","|","£","$","%","&","/","?","*","^","@","#",
    ">","<",";",":"];

    //array dei caratteri totali
    $totalChars = array_merge($letters,$uppercase,$numbersSymbols);
    
    $password = "";
    for ($i = 1; $i <= $lung; $i++) {
        //ad ogni iterazione del ciclo estraggo un indice randomico dall'array dei caratteri totali
        $random_number = rand(0,count($totalChars)-1);
        $password = $password.$totalChars[$random_number];
    }

    return $password;
}



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