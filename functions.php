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
    ">","<",";",":","!"];

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

//bonus: funzione per la gestione della ripetizione caratteri
function isRepeatChar($pass, $repeat) {
    $lung = strlen($pass);

    $substring = "";

    //array contenente i caratteri ripetuti
    $repeatChar = [];

    for ($i = 0; $i < $lung; $i++) {
        if (str_contains($substring,$pass[$i])) {
            $repeatChar[] = $pass[$i];
        }
        $substring = $substring.$pass[$i];
    }

    var_dump($repeatChar);

    if ($repeat) {
        return $substring;
    } else if (!$repeat) { //se i caratteri non si possono ripetere
        $ris = str_replace($repeatChar,'',$substring);
        return $ris;
    }
}


//bonus milestone 4
//funzione per la gestione avanzata delle password
function advancedPassword($lung, $minusc, $maiusc, $num, $simbol) {
    //array totale dei caratteri sui quali generare la password
    $totalChars = [];
    if ($minusc) {
        $letters = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r",
    "s","t","u","v","w","x","y","z"];
    } else {
        $letters = [];
    }

    if ($maiusc) {
        $lettersMinusc = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r",
    "s","t","u","v","w","x","y","z"];
        $uppercase = [];
        foreach ($lettersMinusc as $letter) {
            $uppercase[] = strtoupper($letter);
        }
    } else {
        $uppercase = [];
    }

    if ($num) {
        $numbers = ["0","1","2","3","4","5","6","7","8","9"];
    } else {
        $numbers = [];
    }

    if ($simbol) {
        $simbolsChar = ["|","£","$","%","&","/","?","*","^","@","#",
        ">","<",";",":","!"];
    } else {
        $simbolsChar = [];
    }

    $totalChars = array_merge($letters,$uppercase,$numbers,$simbolsChar);

    $password = "";

    for ($i = 1; $i <= $lung; $i++) {
        $random_number = rand(0,count($totalChars)-1);
        $password = $password.$totalChars[$random_number];
    }


    return $password;
}
?>