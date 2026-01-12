<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 16/12/2025
*   Uso:  controlador del inicoPrivado*/ 
    if(isset($_REQUEST['LOGOFF'])){
        $_SESSION['paginaEnCurso']='login';
        header('Location: indexLoginLogoff.php');
        exit;
    }
    if(isset($_REQUEST['DETALLE'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='detalle';
        header('Location: indexLoginLogoff.php');
        exit;
    }
    
    $avInicioPrivado=[
        'descUsuario' => $_SESSION['usuarioMiAplicacion']->getDescUsuario(),
        'numConexiones' => $_SESSION['usuarioMiAplicacion']->getNumAccesos(),
        'fechaHoraUltimaConexionAnterior' => $_SESSION['usuarioMiAplicacion']->getFechaHoraUltimaConexionAnterior()
    ];
    require_once $view['layout'];
?>