<?php

if(!empty($_POST)){
	//print_r($_POST);
	$string = $_POST['validar'];
	$testa = strlen($string);
	for ($t = 0; $t < $testa; $t++) {
	    $tamanho = strlen($string);
	    $abre = array();
	    $result = true;
	    for ($i = 0; $i < $tamanho; $i++) {
	        $char = substr($string, $i, 1);
	        if ($char == "{" || $char == "(" || $char == "[")
	        	$abre[count($abre)] = $char;
	        else if ($char == "}" || $char == ")" || $char == "]") {
	            if (! $abre) {
	                $result = false;
	                break;
	            }
	            $pos_fim = count($abre) - 1;
	            //compara com os anteriores digitados
	            if ($char == "}" && $abre[$pos_fim] != "{") $result = false;
	            else if ($char == ")" && $abre[$pos_fim] != "(") $result = false;
	            else if ($char == "]" && $abre[$pos_fim] != "[") $result = false;
	            if (!$result) break;
	            unset($abre[$pos_fim]);
	        }
	    }
	    if (count($abre) >= 1)
	    	$result = false;
	}
	if($result){
    	echo 'Válido';
    }else
    	echo 'Inválido';
}
?>