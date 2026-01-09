<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 18/12/2025
*   Uso:  clase UsuarioPDO con sus metodos*/

require_once 'Usuario.php';
require_once 'DBPDO.php';
class UsuarioPDO {

    public static function validarUsuario($codUsuario,$password) {
        $oUsuario=null;
        $consulta = <<<CONSULTA
            SELECT *
            FROM T01_Usuario 
            WHERE T01_CodUsuario= '{$codUsuario}' AND 
            T01_Password = sha2('{$codUsuario}{$password}',256)
            CONSULTA;
        
        $resultado= DBPDO::ejecutaConsulta($consulta);
        $oResultado=$resultado->fetchObject();
        if($resultado->rowCount()>0){
            $oUsuario=new Usuario(
                $oResultado->T01_CodUsuario,
                $oResultado->T01_Password,
                $oResultado->T01_DescUsuario,
                $oResultado->T01_NumConexiones,
                $oResultado->T01_FechaHoraUltimaConexion,
                $oResultado->T01_FechaHoraUltimaConexionAnterior=null,
                $oResultado->T01_Perfil
            );
        }
    }
}

?>

