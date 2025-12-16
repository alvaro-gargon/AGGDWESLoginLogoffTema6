<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 16/12/2025
*   Uso:  controlador del detalle*/

    if(isset($_REQUEST['VOLVER'])){
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: indexLoginLogoff.php');
        exit;
    }
    require_once $view['layout'];
    ?>