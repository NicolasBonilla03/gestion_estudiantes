<?php

namespace nota;

class Nota
{

    private $id;
    private $descripcion;
    private $nota;
    private $codigoestudiante;

    public function getId()
    {
        return $this->id;
    }
    public function setId($value)
    {
        $this->id = $value;
    }
    public function getDesc()
    {
        return $this->descripcion;
    }
    public function setDesc($value)
    {
        $this->descripcion = $value;
    }
    public function getNota()
    {
        return $this->nota;
    }
    public function setNota($value)
    {
        $this->nota = $value;
    }
    public function getCodEs()
    {
        return $this->codigoestudiante;
    }
    public function setCodEs($value)
    {
        $this->codigoestudiante = $value;
    }
    
}