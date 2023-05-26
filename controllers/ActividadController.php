<?php

namespace actividadController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use estudiante\Estudiante;
use nota\Nota;

class ActividadController extends Basecontroller
{


function create($estudiante,$nota)
{

    $sql = 'INSERT INTO actividades ';
    $sql .= '(id, descripcion, nota, codigoEstudiante) VALUES ';
    $sql .= '(';
    $sql .= $nota->getId() . ', ';
    $sql .= '"' . $nota->getDesc() . '", ';
    $sql .= '"' . $nota->getNota() . '", ';
    $sql .= $estudiante->getCodigo();
    $sql .= ');';

    $conexiondb = new ConexionDbController();
    $resultadoSQL = $conexiondb->execSQL($sql);
    $conexiondb->close();
    return $resultadoSQL;
}



function read(){
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


    function readRow($id)
    {
        $sql = 'select * from actividades';
        $sql .= ' where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $nota = new Nota();
        while ($registroo = $resultadoSQL->fetch_assoc()) {   
            $nota->setDesc($registroo['descripcion']);
            $nota->setNota($registroo['nota']);
        }
        return $nota;
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


    function delete($id)
    {
        $sql = 'delete from actividades where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

}
