<?php
require '../models/nota.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/ActividadController.php';


use nota\Nota;
use actividadController\ActividadController;

$nota = new Nota();

$nota->setId($_POST['id']);
$nota->setDesc($_POST['descripcion']);
$nota->setNota($_POST['nota']);
$nota->setCodEs($_POST['codigo']);



$actividadController = new ActividadController();
$resultado = $actividadController->create($nota);
if ($resultado) {
    echo '<h1>Usuarios registrado</h1>';
} else {
    echo '<h1>No se pudo registrar el usuario</h1>';
}
