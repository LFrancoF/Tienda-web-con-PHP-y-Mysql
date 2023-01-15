<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

function ShowError(){
    $error = new ErrorController();
    $error->index();
}

if(isset($_GET['controller']) && class_exists(ucfirst($_GET['controller']).'Controller')){
    $nombre_controller= ucfirst($_GET['controller']).'Controller';
    $controlador = new $nombre_controller();
    if(($_GET['action']=="")){
        $action_default = action_default;
        $controlador->$action_default();
    }else{
        if(method_exists($controlador, $_GET['action'])){
            $action = $_GET['action'];
            $controlador->$action();
        }else
            ShowError();
    }
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controller = controller_default;
    $controlador = new $nombre_controller();
    $action_default = action_default;
    $controlador->$action_default();
    }else
        ShowError();

require_once 'views/layout/footer.php';