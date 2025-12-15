<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 15/12/2025
*   Uso:  requires de todos los archivos del modelo necesitado*/ 
//incluyo la libreria de validacion
require_once 'core/231018libreriaValidacion.php';

//aqui se incluyen todos los archivos del modelo


//array para cargar los archivos del controlador
$controller=[
    'inicioPublico' => 'controller/cInicioPublico.php'
];

//array para cargar los archivos de la vista
$view=[
    'layout' => 'view/Layout.php',
    'inicioPublico' => 'view/vInicioPublico.php'
]
?>