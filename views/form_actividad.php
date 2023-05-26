<?php
require '../models/nota.php';
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/ActividadController.php';

use nota\Nota;
use estudiante\Estudiante;
use actividadController\ActividadController;
$id = empty($_GET['id']) ? '' : $_GET['id'];
$titulo = 'Registrar actividad';
$urlAction = "accion_registro_actividad.php";
$nota = new Nota();
if(!empty($codigo)) {
    $titulo = 'Modificar Actividad';
    $urlAction = "accion_modificar_actividad.php";
    $actividadController = new ActividadController();
    $nota=$actividadController->readRowAct($id);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h1><?php echo $titulo;?></h1>
    <form action="<?php echo $urlAction;?>" method="post">
        <label>
            <span>Id:</span>
            <input type="number" name="id" value="<?php echo $nota->getId();?>" >
        </label>
        <label>
            <span>Descripcion:</span>
            <input type="text" name="descripcion" value="<?php echo $nota->getDesc();?>" >
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="number" name="nota" value="<?php echo $nota->getNota();?>" >
        </label>

        <button type="submit">Guardar</button>
    </form>
</body>

</html>