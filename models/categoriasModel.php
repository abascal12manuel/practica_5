<?php

class CategoriasModel extends AppModel
{
    private static $nombre = "categorias";

    public function listarCategorias(){
        $categorias = $this->_db->query("SELECT * FROM categorias");

        return $categorias->fetchall();
    }

    public function guardar($dato){
        $consulta = $this->_db->prepare("INSERT INTO categorias (nombre) VALUES (:nombre)");

        $consulta->bindParam(":nombre", $dato["nombre"]);

        if ($consulta->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function buscarPorId($id){
        $categorias = $this->_db->prepare(
            "SELECT * FROM categorias WHERE id=:id");
        $categorias->bindParam(":id", $id);
        $categorias->execute();
        $registro = $categorias->fetch();

        if ($registro){
            return $registro;
        }else{
            return false;
        }
    }

    public function actualizar($dato){
        $consulta = $this->_db->prepare("UPDATE categorias SET nombre=:nombre WHERE id=:id");

        $consulta->bindParam(":id", $dato["id"]);
        $consulta->bindParam(":nombre", $dato["nombre"]);

        if ($consulta->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function eliminarPorId($id){
        $consulta = $this->_db->prepare("DELETE FROM categorias WHERE id=:id");
        $consulta->bindParam(":id", $id);
        if ($consulta->execute()){
            return true;
        }else{
            return false;
        }
    }
}