<?php

namespace estudianteController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use estudiante\Estudiante;
use nota\Nota;

class EstudianteController extends BaseController
{

function create($estudiante, $nota)
{
    $sql1 = 'INSERT INTO estudiantes ';
    $sql1 .= '(codigo, nombres, apellidos) VALUES ';
    $sql1 .= '(';
    $sql1 .= $estudiante->getCodigo() . ', ';
    $sql1 .= '"' . $estudiante->getNombre() . '", ';
    $sql1 .= '"' . $estudiante->getApellido() . '"';
    $sql1 .= ');';

    $sql2 = 'INSERT INTO actividades ';
    $sql2 .= '(id, descripcion, nota, codigoEstudiante) VALUES ';
    $sql2 .= '(';
    $sql2 .= $nota->getId() . ', ';
    $sql2 .= '"' . $nota->getDesc() . '", ';
    $sql2 .= '"' . $nota->getNota() . '", ';
    $sql2 .= $estudiante->getCodigo();
    $sql2 .= ');';

    $conexiondb = new ConexionDbController();
    $resultadoSQL1 = $conexiondb->execSQL($sql1);
    $resultadoSQL2 = $conexiondb->execSQL($sql2);
    $conexiondb->close();

    if ($resultadoSQL1 && $resultadoSQL2) {
        return true;
    } else {
        return false;
    }
}

    function read()
    {
        $sql = 'select * from estudiantes';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiantes = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiante = new Estudiante();
            $estudiante->setCodigo($registro['codigo']);
            $estudiante->setNombre($registro['nombres']);
            $estudiante->setApellido($registro['apellidos']);
            array_push($estudiantes, $estudiante);
        }


        
            
        $conexiondb->close();
        return $estudiantes;

    }
    function readd(){
        $sql = 'select * from actividades';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $notas = [];
        while ($registroo = $resultadoSQL->fetch_assoc()) {
            $nota = new Nota();
            $nota->setId($registroo['id']);
            $nota->setDesc($registroo['descripcion']);
            $nota->setNota($registroo['nota']);
            array_push($notas, $nota);
        }


        
            
        $conexiondb->close();
        return $notas;
    }

    function readRow($codigo)
    {
        $sql = 'select * from estudiantes';
        $sql .= ' where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiante = new Estudiante();
        while ($registro = $resultadoSQL->fetch_assoc()) {   
            $estudiante->setCodigo($registro['codigo']);
            $estudiante->setNombre($registro['nombres']);
            $estudiante->setApellido($registro['apellidos']);
        }
        
        $conexiondb->close();
        return $estudiante;
      
    }

    function readRowAct($codigo)
    {
        $sql = 'select * from actividades';
        $sql .= ' where codigoEstudiante=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $nota = new Nota();
        while ($registroo = $resultadoSQL->fetch_assoc()) {   
            $nota->setDesc($registroo['descripcion']);
            $nota->setNota($registroo['nota']);
        }
        return $nota;
    }

    function update($codigo, $nota)
    {
            $sql = 'update actividades set';
            $sql .= 'descripcion ="'.$nota->getDesc().'",';
            $sql .= 'nota ="'.$nota->getNota().'"';
            $sql .= ' where codigoEstudiante ='. $codigo;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
    }

    function delete($codigo)
    {
        $sql = 'delete from estudiantes where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function deleteAct($codigo)
    {
        $sql = 'delete from actividades where codigoEstudiante=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

}
