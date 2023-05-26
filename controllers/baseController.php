<?php namespace baseControler;

abstract class BaseController
{
    abstract function create($estudiante, $nota);
    abstract function read();
    abstract function update($id, $nota);
    abstract function delete($codigo);
    abstract function deleteAct($id);
    abstract function createAct($nota);
    abstract function readAct();
}
