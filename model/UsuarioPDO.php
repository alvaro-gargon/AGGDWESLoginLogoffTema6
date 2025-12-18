<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 18/12/2025
*   Uso:  clase UsuarioPDO con sus metodos*/

require_once 'Usuario.php';
require_once 'DBPDO.php';
class UsuarioPDO {

    public static function validarUsuario($codUsuario,$password) {
        $consulta = <<<CONSULTA
            SELECT *
            FROM T01_Usuario 
            WHERE T01_CodUsuario= :usuario AND 
            T01_Password = sha2(:passwd,256)
            CONSULTA;
        
        $resultado= DBPDO::ejecutaConsulta($sentenciaSQL, [':usuario' => $codUsuario, ':password' =>$codUsuario.$password]);
        $oResultado=$resultado->fetchObject();
        if($oResultado->rowCount()>1){
            $usuario=new Usuario(
                $oResultado['T01_CodUsuario'],
                $oResultado['T01_Password'],
                $oResultado['T01_DescUsuario'],
                $oResultado['T01_NumConexiones'],
                new DateTime($oResultado['T01_FechaHoraUltimaConexion']),
                null,
                $oResultado['T01_Perfil']
            );
        }
    }
}

?>

