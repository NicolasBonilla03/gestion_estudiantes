<?php
require '../models/nota.php';
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudianteController.php';

use nota\Nota;
use estudiante\Estudiante;
use estudianteController\EstudianteController;
$codigo = empty($_GET['codigo']) ? '' : $_GET['codigo'];
$titulo = 'Registrar Estudiante';
$urlAction = "accion_registro_estudiante.php";
$estudiante = new Estudiante();
$nota = new Nota();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/form_estudiante.css">
</head>

<body>
    <h1><?php echo $titulo;?></h1>
    <form action="<?php echo $urlAction;?>" method="post">
        <label>
            <span>Codigo Estudiante:</span>
            <input type="number" name="codigo" min="1" value="<?php echo $estudiante->getCodigo();?>" required>
        </label>
        <br>
        <label>
            <span>Nombres:</span>
            <input type="text" name="nombres" value="<?php echo $estudiante->getNombre();?>" required>
        </label>
        <br>
        <label>
            <span>Apellidos:</span>
            <input type="text" name="apellidos" value="<?php echo $estudiante->getApellido();?>" required>
        </label>
        <br>
        <label>


        <button type="submit">Guardar</button>
    </form>
</body>

</html>