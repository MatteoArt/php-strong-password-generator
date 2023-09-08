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



//bonus milestone 4
//funzione per la gestione avanzata delle password
//-----> QUI 
?>