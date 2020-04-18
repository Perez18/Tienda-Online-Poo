<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
session_start();
require_once 'config/parametros.php';
require_once 'autoload.php';
require_once 'helpers/helpers.php';
require_once 'config/databases.php';
require_once 'views/layout/header.php';
require_once 'views/layout/aside.php';



/************** controlador frontal  *********/ 

function show_error(){
  
    $error = new errorcontroller();
    $error->index();

    return $error;
    
}

if (isset($_GET['controlador'])) {

    $nombre_controlador = $_GET['controlador'].'controller';

   // var_dump($nombre_controlador);

}elseif(!isset($_GET['controlador']) && ! isset($_GET['action']) ){

    $nombre_controlador = controlador_default;

}else{

    show_error();
    exit();

}


if (class_exists($nombre_controlador)) {

    $controlador = new $nombre_controlador();

        if (isset($_GET['action']) && method_exists($controlador,$_GET['action'])) {
                    
            $action = $_GET['action'];
            $controlador->$action();

        }elseif (!isset($_GET['controlador']) && ! isset($_GET['action'])) {
            $action_default = action_default;
            $controlador->$action_default();

        }  else {
            show_error();
        }


} else {
    show_error();

}



require_once 'views/layout/footer.php';


   