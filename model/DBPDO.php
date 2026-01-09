<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 18/12/2025
*   Uso:  clase DBPDO con su metodo*/
require_once 'config/confDBPDO.php';

class DBPDO {

  public static function ejecutaConsulta($sentenciaSQL,$parametros=null) {
    try{
        $miDB=new PDO(DNS,USERNAME,PASSWORD);
        $consultaPreparada=$miDB->prepare($sentenciaSQL);
        $consultaPreparada->execute($parametros);
        return $consultaPreparada;
    }catch(PDOException $exception){
        echo("Error: " . $exception->getMessage());
        echo("Codigo error: " . $exception->getCode());
    }finally{
        unset($miDB);
    }
  }
}
?>