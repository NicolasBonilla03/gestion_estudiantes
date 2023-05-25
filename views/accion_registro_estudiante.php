<?php
require '../models/estudiante.php';
require '../models/nota.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudianteController.php';

use estudiante\Estudiante;
use nota\Nota;
use estudianteController\EstudianteController;

$estudiante = new Estudiante();
$nota = new Nota();
$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombre($_POST['nombres']);
$estudiante->setApellido($_POST['apellidos']);
$nota->setId($_POST['id']);
$nota->setDesc($_POST['descripcion']);
$nota->setNota($_POST['nota']);
$nota->setCodEs($_POST['codigo']);


$estudianteController = new EstudianteController();
$resultado = $estudianteController->create($estudiante,$nota);
if ($resultado) {
    echo '<h1>Usuarios registrado</h1>';
} else {
    echo '<h1>No se pudo registrar el usuario</h1>';
}
