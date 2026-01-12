<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 16/12/2025
*   Uso:  controlador del login*/ 
    if(isset($_REQUEST['CANCELAR'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: indexLoginLogoff.php');
        exit;
    }
    $entradaOK=true; //boolean para comprobar si el formulario esta correcto o no
    //array donde recojo los errores si los hubiera
    $aErrores=[
        'usuario'=>null,
        'contraseña'=>null
    ];
    if(isset($_REQUEST['ENTRAR'])){
        $oUsuarioActivo= UsuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['contraseña']);
        if($oUsuarioActivo===null){
            $entradaOK=false;
        }
        $aErrores['usuario']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'],obligatorio:1);//validacion sintactica del campo usuario
        foreach ($aErrores as $clave => $valor){
            if($valor!=null){
                $entradaOK=false;
            }
        }
    }else{
        $entradaOK=false;
    }
    
    
    if($entradaOK){
        UsuarioPDO::actualizarUltimaConexion($oUsuarioActivo);
        $_SESSION['usarioMiAplicacion']=$oUsuarioActivo;
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: indexLoginLogoff.php');
        exit;
    }
    require_once $view['layout'];
?>
