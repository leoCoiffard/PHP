<?php

include "View/View.php";
include "Model/Model.php";
include "Controller/Controller.php";


include 'Controller/ClientController.php';
include 'Controller/DevisController.php';
include 'Controller/FactureController.php';


if (isset($_GET['controller'])) {
    $controllerStart = ucfirst($_GET['controller']) . "Controller";
} else {
    $controllerStart  = 'ClientController';
}

$controller = new $controllerStart();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action ='start';
}
// var_dump($action);

$controller->$action();
// $controller->addForm();
