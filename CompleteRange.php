<?php 
/**
* Problema 02
*/
 class CompleteRange
 {
  
  function build($param){
    // Inicializa las variables que necesitaremos
    $final = [];
    $number = NULL;

    // Recorremos todos los numeros del arreglo
    for ($i=0; $i < count($param); $i++) { 
      // Preguntamos si la variable tiene valor 
      if($number){
        // Relalizamos un bucle para saber si el valor anterior es menor al valor actual del parametro pasado
        while (++$number < $param[$i]) {
          // Si es menor agregamos el numero al arreglo final
          $final[] = $number;
        }
        
        $final[] = $number;

      // Si no tiene valor es por que es la primera posicion
      }else{
        // Reemplazamos la variable $number con el primer valor
        $number = $param[$i];
        // Agregamos al arreglo final el valor inicial
        $final[] = $param[$i];
      }
    }
    return $final;
   }
 }
 ?>