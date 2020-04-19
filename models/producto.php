<?php


class producto
{

    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha_registro;
    private $imagen;
    private $DB;

    public function __construct()
    {

        $this->DB = database::conexion();
    }

    public function getid()
    {

        return $this->id;
    }

    public function getcategoria_id()
    {

        return $this->categoria_id;
    }

    public function getnombre()
    {
        return $this->nombre;

    }

    public function getdescripcion()
    {
        return $this->descripcion;

    }

    public function getprecio()
    {

        return $this->precio;
    }

    
    public function getstock()
    {

        return $this->stock;
    }

    public function getoferta()
    {

        return $this->oferta;
    }  
    
    public function getfecha_registro()
    {

        return $this->fecha_registro;
    }

    public function getimagen()
    {

        return $this->imagen;
    }

     
    public function setid($id)
    {
         $this->id = $this->DB->real_escape_string($id);

    }

    
    public function setcategoria_id($categoria_id)
    {
         $this->categoria_id = $this->DB->real_escape_string($categoria_id);

    }

    public function setnombre($nombre)
    {
         $this->nombre = $this->DB->real_escape_string($nombre);

    }

    public function setdescripcion($descripcion)
    {
         $this->descripcion = $this->DB->real_escape_string($descripcion);

    }

        public function setprecio($precio)
    {
         $this->precio = $this->DB->real_escape_string($precio);

    }

    public function setstock($stock)
    {
         $this->stock = $this->DB->real_escape_string($stock);

    }

    
    public function setoferta($oferta)
    {
         $this->oferta = $this->DB->real_escape_string($oferta);

    }

    public function setimagen($imagen)
    {
         $this->imagen = $this->DB->real_escape_string($imagen);

    }

    public function getall(){

        $consulta  = $this->DB->query("SELECT * FROM productos ORDER BY id DESC");

        $respuesta = false;
          
        if($consulta){

            $respuesta = $consulta;
        }

        return $respuesta;
    }

    


    public function getrandom($limit){

        $consulta = $this->DB->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit"); 

        return $consulta;
    }


    public function getone(){

    $consulta  = $this->DB->query("SELECT * FROM productos WHERE id ={$this->getid()}");
    $producto = $consulta->fetch_object();

        $respuesta = false;
          
        if($consulta){

            $respuesta = $producto;
        }

        return $respuesta;

    }



    public function save(){
        $save = false;

        $sql = "INSERT INTO productos(id,categoria_id,nombre,descripcion,precio,stock,oferta,fecha_registro,imagen)
                VALUES(NULL,{$this->getcategoria_id()},'{$this->getnombre()}','{$this->getdescripcion()}',{$this->getprecio()},
                {$this->getstock()},'{$this->getoferta()}',CURDATE(),'{$this->getimagen()}' )";
        $resultado  = $this->DB->query($sql);

      

        if($resultado){  

            $save = true;
        }

        return $save;

    }

    public function edit(){
        $save = false;

        $sql = "UPDATE productos SET  categoria_id = {$this->getcategoria_id()} , nombre = '{$this->getnombre()}' , descripcion = '{$this->getdescripcion()}',
                precio = {$this->getprecio()}, stock = {$this->getstock()}, oferta = '{$this->getoferta()}'";
            
           if($this->getimagen() != null){
            
            $sql .=",imagen = '{$this->getimagen()}' ";
           
             }
        

        $sql .= " WHERE id = {$this->getid()};";


        $resultado  = $this->DB->query($sql);

      

        if($resultado){  

            $save = true;
        }

        return $save;

    }





    public function eliminar(){

        helpers::isadmin();

        $sql = "DELETE FROM productos WHERE id = {$this->getid()}";
        $result  = $this->DB->query($sql);

        $eliminar = false;

        if($result){

            $eliminar = true;
        }

        return $eliminar;
    }
    
    
}