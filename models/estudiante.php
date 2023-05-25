<?php

namespace estudiante;

class Estudiante
{
    private $codigo;
    private $nombres;
    private $apellidos;
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($value)
    {
        $this->codigo = $value;
    }

    public function getNombre()
    {
        return $this->nombres;
    }
    public function setNombre($value)
    {
        $this->nombres = $value;
    }   
    public function getApellido()
    {
        return $this->apellidos;
    }
    public function setApellido($value)
    {
        $this->apellidos = $value;
    }   
}
