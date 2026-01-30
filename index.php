<?php
require_once __DIR__ . '/../app/Controladores/ControladorTareas.php';

session_start();

$accion = $_GET['accion'] ?? 'listar';
$controlador = new ControladorTareas();

switch ($accion) {
    case 'listar':
        $controlador->listar();
        break;
    case 'crear':
        $controlador->crear();
        break;
    case 'guardar':
        $controlador->guardar();
        break;
    case 'borrar':
        $controlador->borrar();
        break;
    default:
        $controlador->listar();
}
