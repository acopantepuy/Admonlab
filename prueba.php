<?php

$datos = '[{"idProducto":1,"idAnalisis":0,"nameAnalisis":"E. Coli1","nNorma":"COVENIN-1235-96","dEspecificaciones":"XXX","dLimite":"10x20","dMin":"9x20","dMax":"10x20","dPromedio":"9x20"},
 {"idProducto":1,"idAnalisis":2,"nameAnalisis":"E. Coli3","nNorma":"COVENIN-1235-96","dEspecificaciones":"XXX","dLimite":"10x20","dMin":"9x20","dMax":"10x20","dPromedio":"9x20"},
 {"idProducto":1,"idAnalisis":4,"nameAnalisis":"E. Coli5","nNorma":"COVENIN-1235-96","dEspecificaciones":"XXX","dLimite":"10x20","dMin":"9x20","dMax":"10x20","dPromedio":"9x20"}]';

$cantidadElementos = count(json_decode($datos));

$filas = json_decode($datos);



foreach($filas as $obj){
        $id_fruta = $obj->idProducto;
        $nombre_fruta = $obj->idAnalisis;
        $cantidad = $obj->nameAnalisis;
        echo $id_fruta."   ".$nombre_fruta."   ".$cantidad."<br>";
        echo " ";
}




?>

SRC_PRODUCT_ID
SRC_ANALYSIS_ID
SRC_NORM
SRC_ESPECIFICATION
SRC_RESULT
SRC_LIMIT
SRC_MIN
SRC_MAX
SRC_AVERAGE