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
    $sql = 'INSERT INTO estudiantes ';
    $sql .= '(codigo, nombres, apellidos) VALUES ';
    $sql .= '(';
    $sql .= $estudiante->getCodigo() . ', ';
    $sql .= '"' . $estudiante->getNombre() . '", ';
    $sql .= '"' . $estudiante->getApellido() . '"';
    $sql .= ');';



    $conexiondb = new ConexionDbController();
    $resultadoSQL = $conexiondb->execSQL($sql);

    $conexiondb->close();

    return $resultadoSQL;
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



    function update($id, $nota)
    {
            $sql = 'update actividades set';
            $sql .= 'descripcion ="'.$nota->getDesc().'",';
            $sql .= 'nota ="'.$nota->getNota().'"';
            $sql .= ' where id ='. $id;
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


}
