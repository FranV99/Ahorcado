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
        $letra = readline("Dime una letra: \n");
        echo "\n";
        if(mb_strlen($letra) != 1) { 
            echo "\n";
            echo "Error: '$letra'  no es una letra\n";
            echo "\n";
        } else if ($letra >= 0 && $letra <= 9) {
            echo "\n";
            echo "Error: no es un letra\n";
            echo "\n";
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


function resolver():int{

    echo "\n";
    $valor = readline("¿Quieres resolver? s:Si  n:No\n");
    echo "\n";
    $numero = 0;
    if(mb_strtolower($valor) == "n"){
        $numero = 1;
    } else if(mb_strtolower($valor) == "s"){
        $numero = 2;
    } else {
        echo "\n";
        echo "Error: escribe s para si o n para no. \n";
        echo "\n";
        $numero = 0;
    }

    return $numero;
}


function imprimirEnmascarada($enmascarada,$frases,$clave){
    foreach($enmascarada as $c) {
        echo $c;
    }
    echo "\n";
    echo "\n";
    echo "$frases[$clave] \n";
    echo "\n";

}

function imprimirOportunidades($oportunidades){
    echo "\n";
    echo "Te quedan $oportunidades oportunidades"; 
    echo "\n";
}

//Principal
$victoria = false;
//Imprime el primer dibujo
dibujo1();
imprimirEnmascarada($enmascarada,$frases,$clave);

//$acierto = coincideLetra(pedirLetra(),$frase,$enmascarada);

do { 
    $acierto = coincideLetra(pedirLetra(),$frase,$enmascarada);
    //Si hay una letra imprime el dibujo y la enmascarada con la letra sustituida
    if($acierto > 0){
        dibujo1();
        imprimirEnmascarada($enmascarada,$frases,$clave);

        //Si quieres resolver
        if(resolver() == 2){
            imprimirEnmascarada($enmascarada,$frases,$clave);
            $fraseTemp = readline("Escibe la frase: \n");
            $fraseTemp = mb_strtolower($fraseTemp);

            //echo $fraseTemp, "\n";
            //echo implode("", $frase), "\n";

            //Si acierta la frase
            if($fraseTemp == mb_strtolower(implode("", $frase))){ 
                imprimirEnmascarada($enmascarada,$frases,$clave);            
                echo "Felicidades has acertado\n";
                $victoria = true;
            //Si no acierta la frase
            } else {
                //Resta una oportunidad
                $oportunidades--;
                imprimirEnmascarada($enmascarada,$frases,$clave);
                echo "Lo siento, no es correcto\n";
                imprimirOportunidades($oportunidades);
                //Si tiene 5 oportunidades
                if($oportunidades == 5){
                    dibujo2();
                    imprimirEnmascarada($enmascarada,$frases,$clave);   
                

                } else if($oportunidades == 4){
                    dibujo3();
                    imprimirEnmascarada($enmascarada,$frases,$clave);
                 

                } else if($oportunidades == 3){
                    dibujo4();
                    imprimirEnmascarada($enmascarada,$frases,$clave);
                  

                }else if($oportunidades == 2){
                    dibujo5();
                    imprimirEnmascarada($enmascarada,$frases,$clave);
                 

                } else if($oportunidades == 1){
                    dibujo6();
                    imprimirEnmascarada($enmascarada,$frases,$clave);
                      

                } else if($oportunidades == 0){
                    dibujo7();
                    imprimirEnmascarada($enmascarada,$frases,$clave);
                    echo "Has perdido\n";  
                }             
            }
        //Si no se quiere resolver
        } else {
            imprimirEnmascarada($enmascarada,$frases,$clave);

            if($acierto == 0){
                $oportunidades--;

                if($oportunidades == 5){
                    dibujo2();
                    imprimirEnmascarada($enmascarada,$frases,$clave);   
                
    
                } else if($oportunidades == 4){
                    dibujo3();
                    imprimirEnmascarada($enmascarada,$frases,$clave);
 
    
                } else if($oportunidades == 3){
                    dibujo4();
                    imprimirEnmascarada($enmascarada,$frases,$clave);
 
    
                } else if($oportunidades == 2){
                    dibujo5();
                    imprimirEnmascarada($enmascarada,$frases,$clave);

    
                } else if($oportunidades == 1){
                    dibujo6();
                    imprimirEnmascarada($enmascarada,$frases,$clave);   
    
                } else if($oportunidades == 0){
                    dibujo7();
                    imprimirEnmascarada($enmascarada,$frases,$clave);
                    echo "Has perdido\n";  
                }

            }
            
          }
    //Si se falla
    } else {
        $oportunidades--;
        imprimirEnmascarada($enmascarada,$frases,$clave);

        if($oportunidades == 5){
            dibujo2();  
            imprimirEnmascarada($enmascarada,$frases,$clave);


        } else if($oportunidades == 4){
            dibujo3();
            imprimirEnmascarada($enmascarada,$frases,$clave);
  

        } else if($oportunidades == 3){
            dibujo4();
            imprimirEnmascarada($enmascarada,$frases,$clave);
 

        } else if($oportunidades == 2){
            dibujo5();
            imprimirEnmascarada($enmascarada,$frases,$clave);

             
        } else if($oportunidades == 1){
            dibujo6();
            imprimirEnmascarada($enmascarada,$frases,$clave);


        }else if($oportunidades == 0){
            dibujo7();
            echo "Has perdido\n";   
        }
    }         
      
} while ($oportunidades != 0 && !$victoria);


