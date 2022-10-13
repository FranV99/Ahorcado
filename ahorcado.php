<?php

$frases = [
    "IES La Encanta",
    "La vida de Brian",
    "Java es divertido",
    "Matrix es una gran pelicula",
    "Ojo con el ajo",
    "Pirineos y Alpes",
    "Comunidad Valenciana",
    "Informatica es CS en ingles",
    "Africa y Europa",
    "Asia y America",
    "Chincheta",
    "Frigorifico",
    "Chimenea",
    "Rojales",
    "Rio Segura"
];

function dibujo1(){
    echo "\n";
    echo "Juego del ahorcado\n";
    echo "
         ____
        |    |
        |    
        |   
        |   
        |
       ---
        \n";
}
function dibujo2(){
    echo "\n";
    echo "Juego del ahorcado\n";
    echo "
         ____
        |    |
        |    O
        |   
        |   
        |
       ---
        \n";
}
function dibujo3(){
    echo "\n";
    echo "Juego del ahorcado\n";
    echo "
         ____
        |    |
        |    O
        |    |
        |   
        |
       ---
        \n";
}
function dibujo4(){
    echo "\n";
    echo "Juego del ahorcado\n";
    echo "
         ____
        |    |
        |    O
        |   /|
        |   
        |
       ---
        \n";
}
function dibujo5(){
    echo "\n";
    echo "Juego del ahorcado\n";
    echo "
         ____
        |    |
        |    O
        |   /|\
        |   
        |
       ---
        \n";
}
function dibujo6(){
    echo "\n";
    echo "Juego del ahorcado\n";
    echo "
         ____
        |    |
        |    O
        |   /|\
        |   /
        |
       ---
        \n";
}
function dibujo7(){
    echo "\n";
    echo "Juego del ahorcado\n";
    echo "
         ____
        |    |
        |    O
        |   /|\
        |   / \
        |
       ---
        \n";
}
//Funcion que pide numeros y verifica si es un número
function pedirLetra(): string
{
    $valido = false;

    do {
        echo "\n";
        $letra = readline("Dime una letra: ");
        echo "\n";
        if(mb_strlen($letra) != 1) { 
            echo "Error: '$letra'  no es una letra\n";
        } else if ($letra >= 0 && $letra <= 9) {
            echo "Error: no es un letra\n";
        } else {
            $valido = true;
        }
    } while($valido == false);

    return $letra;
}

/**
 * Esta función va a comprobar si la letra está en la frase y, si está,
 * la añade a la enmascarada en la posición correspondiente.
 * 
 * Devuelve el número de veces que está letra en la frase.
 */
function coincideLetra($letra, $frase, &$enmascarada): int
{  
    $contador = 0;
    foreach($frase as $i => $valor){
        if(mb_strtolower($valor) == mb_strtolower($letra)){
            $enmascarada[$i] = $valor;
            $contador++;
        }
    }
    foreach($enmascarada as $c) {
        echo $c;
    }
    echo "\n";
    echo "\n";
    echo "La letra aparece $contador veces.";
    echo "\n";
    echo "\n";
    return $contador;
}
//Para verificar si la letra está en la palabra oculta
$acierto = false;
//Oportunidades para resolver
$oportunidades = 6;
//Elige la posición de un número aleatorio del array
$clave = array_rand($frases);

//Se divide el string en caracteres
$frase = mb_str_split($frases[$clave], 1, "UTF-8");
//Por cada carácter se genera un guión y si hay un espacio no se genera
$enmascarada = array_map(fn($c) => $c == " " ? "  " : "_", $frase);
//Recorre el array enmascarado para imprimirlo
foreach($enmascarada as $c) {
    echo $c;
}
echo "\n";
echo "\n";
echo "$frases[$clave] \n";
echo "\n";

//Principal
dibujo1();
do { 

    if(coincideLetra(pedirLetra(),$frase,$enmascarada) == 0){
            $oportunidades--;
            if($oportunidades == 5){
                dibujo2();   
            }else if($oportunidades == 4){
                dibujo3();   
            }else if($oportunidades == 3){
                dibujo4();   
            }else if($oportunidades == 2){
                dibujo5();   
            }else if($oportunidades == 1){
                dibujo6();   
            }else if($oportunidades == 0){
                dibujo7();   
            }

            echo "\n";
            echo "Te quedan $oportunidades oportunidades"; 
            echo "\n";
    }

    $victoria = $frase == $enmascarada;
        
} while ($oportunidades != 0 && !$victoria);


