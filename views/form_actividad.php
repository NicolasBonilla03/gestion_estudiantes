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
$nota = new Nota();
$urlAction = "accion_registro_actividad.php?codigoEstudiante=". $nota->getCodEs();
if(!empty($id)) {
    $titulo = 'Modificar Actividad';
    $urlAction = 'accion_modificar_actividad.php';
    $actividadController = new ActividadController();
    $nota=$actividadController->readRow($id);
}else{
    $codigo = $_GET['codigo'];
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
        <?php
        if (!empty($nota->getId())){
            echo '<label>';
            echo '<span>Id: '.$nota->getId().'</span>';
            echo '<input type="hidden" name="id" value="'.$nota->getId().'" required >';
            echo '</label>';
            echo '<br>';
        }else{
            echo '<label>';
            echo '<span>Id:</span>';
            echo '<input type="number" name="id" value="'.$nota->getId().'" required >';
            echo '</label>';
            echo '<br>';
        }
        ?>
        <label>
            <span>Descripcion:</span>
            <input type="text" name="descripcion" value="<?php echo $nota->getDesc();?>" required >
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="number" name="nota" min="1" max="5" value="<?php echo $nota->getNota();?>" required >
        </label>
        <label>
            <input type="hidden" name="codigo" value="<?php echo $codigo;?>" required>
        </label>	       
        <button type="submit">Guardar</button>
    </form>
</body>

</html>