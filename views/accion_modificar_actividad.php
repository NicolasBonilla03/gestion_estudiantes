<?php
require '../models/estudiante.php';
require '../models/nota.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudianteController.php';

use estudiante\Estudiante;
use nota\Nota;
use estudianteController\EstudianteController;

$nota = new Nota();
$nota->setDesc($_POST['descripcion']);
$nota->setNota($_POST['nota']);

$estudianteController = new EstudianteController();
$resultado = $estudianteController->update($nota->getDesc(), $nota);
$resultado = $estudianteController->update($nota->getNota(), $nota);
if ($resultado) {
    echo '<h1>Usuarios modificado</h1>';
} else {
    echo '<h1>No se pudo modificar el estudiante</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>