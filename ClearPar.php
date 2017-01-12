<?php 
/**
* Problema 03
*/
class ClearPar
{
  
  function build($param){
    $open = FALSE;
    $final = '';
    for($i = 0; $i < strlen($param); $i++ ){
      if(!$open){
        if($param[$i] == '(' )
          $open = TRUE;
        
      }else{
        if($param[$i] == ')'){
          $open = FALSE;
          $final.='()';
        }
      } 
    }
    return $final;
  }
}
 ?>