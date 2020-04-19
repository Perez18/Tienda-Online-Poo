<?php


class categoria
{

    private $id;
    private $nombre;
    private $DB;

    public function __construct()
    {

        $this->DB = database::conexion();
    }

    public function getid()
    {

        return $this->id;
    }

    public function getnombre()
    {
        return $this->nombre;

    }

    public function setid($id)
    {
         $this->id = $this->DB->real_escape_string($id);

    }


    public function setnombre($nombre)
    {
         $this->nombre = $this->DB->real_escape_string($nombre);

    }

     public function getcategorias()
    {
        $sql = "SELECT * FROM categorias ORDER BY id DESC";
        $consulta = $this->DB->query($sql);

        return $consulta;

    }


     public function getone()
     {

     $sql="SELECT nombre FROM categorias WHERE id = {$this->getid()}";
     $consulta = $this->DB->query($sql);

     return $consulta->fetch_object();


     }


    public function save(){
       
        $save = false;

        $sql =  "INSERT INTO categorias(id,nombre) VALUES(NULL,'{$this->getnombre()}')" ;
        $result = $this->DB->query($sql);

        if($result){

            $save = true;

        }

        return $save;

    }

    
    
    
}