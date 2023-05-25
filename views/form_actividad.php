<?php
require '../models/nota.php';
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudianteController.php';

use nota\Nota;
use estudiante\Estudiante;
use estudianteController\EstudianteController;
$codigo = empty($_GET['codigoEstudiante']) ? '' : $_GET['codigoEstudiante'];
$titulo = 'Registrar actividad';
$urlAction = "accion_registro_actividad.php";
$nota = new Nota();
if(!empty($codigo)) {
    $titulo = 'Modificar Actividad';
    $urlAction = "accion_modificar_actividad.php";
    $estudianteController = new EstudianteController();
    $nota=$estudianteController->readRowAct($codigo);
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