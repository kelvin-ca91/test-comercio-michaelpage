<?php

  /*
   * Problema 01
   */
  class ChangeString
  {

    function build($param){
      // Variable de alfabeto
      $alfabeto = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

      // Inicializa la variable final
      $final = '';
      // Se recorre cada posicion del parametro
      for($i = 0; $i < strlen($param); $i++ ){
        // Se compara para saber que es una letra
        if( ctype_alpha($param[$i]) ){
          // Inicializa la variable en null para usarlo si es mayuscula
          $letterUpper = NULL;
          // Preguntamos si la letra esta en mayusculas para convertirla en minuscula
          if(ctype_upper($param[$i]))
            $letterUpper = strtolower($param[$i]);
          
          // Se busca la posicion de la letra segun el alfabeto
          $indice = array_search( ($letterUpper)? $letterUpper: $param[$i] , $alfabeto);
          // Se busca la siguiente letra en el alfabeto, si no existe como la "z" tomara la letra de la primera posición
          $letter = ($alfabeto[++$indice])? $alfabeto[$indice] : $alfabeto[0];
          // Se concatena con la siguiente letra encontrada
          $final.= ($letterUpper)? strtoupper($letter) : $letter;
        }else{
          // Si no es una letra no se realiza ningun cambio
          $final.= $param[$i];
        }
      }

      return $final;
    }
  }
?>