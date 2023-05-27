<?php

namespace actividadController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use estudiante\Estudiante;
use nota\Nota;

class ActividadController 
{

function create($nota)
{

     $sql = 'insert into actividades ';
        $sql .= '(id,descripcion,nota,codigoEstudiante) values ';
        $sql .= '(';
        $sql .= $nota->getId() . ',';
        $sql .= '"' . $nota->getDesc() . '",';
        $sql .= '"' . $nota->getNota() . '",';
        $sql .= '"' . $nota->getCodEs() . '"';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
}

function read($codigo){
        $sql = 'select * from actividades where codigoEstudiante = '.$codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $notas = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $nota = new Nota();
            $nota->setId($registro['id']);
            $nota->setDesc($registro['descripcion']);
            $nota->setNota($registro['nota']);
            array_push($notas, $nota);
        }             
        $conexiondb->close();
        return $notas;
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