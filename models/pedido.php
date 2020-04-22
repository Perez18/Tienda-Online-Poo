<?php



class pedido
{

    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad ;
    private $direccion;
    private $costo;
    private $estado;
    private $DB;

    public function __construct()
    {

        $this->DB = database::conexion();
    }

    public function getid()
    {

        return $this->id;
    }

    public function getusuario_id()
    {

        return $this->usuario_id;
    }

    public function getprovincia()
    {
        return $this->provincia;

    }

    public function getlocalidad()
    {
        return $this->localidad;

    }

    public function getdireccion()
    {

        return $this->direccion;
    }

    
    public function getcosto()
    {

        return $this->costo;
    }

    public function getestado()
    {

        return $this->estado;
    }  
    

     
    public function setid($id)
    {
         $this->id = $this->DB->real_escape_string($id);

    }

    
    public function setusuario_id($usuario_id)
    {
         $this->usuario_id = $this->DB->real_escape_string($usuario_id);

    }

    public function setprovincia($provincia)
    {
         $this->provincia = $this->DB->real_escape_string($provincia);

    }

    public function setlocalidad($localidad)
    {
         $this->localidad = $this->DB->real_escape_string($localidad);

    }

        public function setdireccion($direccion)
    {
         $this->direccion = $this->DB->real_escape_string($direccion);

    }

    public function setcosto($costo)
    {
         $this->costo = $this->DB->real_escape_string($costo);

    }

    
    public function setestado($estado)
    {
         $this->estado = $this->DB->real_escape_string($estado);

    }

    public function getall(){

        $consulta  = $this->DB->query("SELECT * FROM pedidos ORDER BY id DESC");

        $respuesta = false;
          
        if($consulta){

            $respuesta = $consulta;
        }

        return $respuesta;
    }

    public function getallByUser(){

    $consulta  = $this->DB->query("SELECT * FROM pedidos WHERE usuario_id={$this->getusuario_id()} ORDER BY id DESC");

        $respuesta = false;
          
        if($consulta){

            $respuesta = $consulta;
        }

        return $respuesta;
    }


    public function getone(){
        
        $consulta  = $this->DB->query("SELECT * FROM pedidos WHERE id = {$this->getid()} ");
        $producto = $consulta->fetch_object();
    
            $respuesta = false;
              
            if($consulta){
    
                $respuesta = $producto;
            }
    
            return $respuesta;
    
        }

    public function getoneBYuser(){
 
        $sql = "SELECT p.id , p.costo from pedidos p "
             ."WHERE p.usuario_id = {$this->getusuario_id()} ORDER BY id DESC  LIMIT 1  ";

        $consulta  = $this->DB->query($sql);
        $pedido = $consulta->fetch_object();
    
            $respuesta = false;
              
            if($consulta){
    
                $respuesta = $pedido;
            }
    
            return $respuesta;

    }

    public function getproductoBypedido($id){

        $sql = "SELECT p.* , pl.unidades from lineas_pedidos pl "
        ."INNER JOIN productos p ON pl.producto_id = p.id WHERE pl.pedido_id = {$id}";

            $consulta = $this->DB->query($sql);

            $resultado = false;

            if($consulta){

                $resultado = $consulta;

            }

        return $resultado;


    }


    public function save(){

        $save = false;

        $sql = "INSERT INTO pedidos(id,usuario_id,provincia,localidad,direccion,costo,estado,fecha_registro,hora)
                VALUES(NULL,{$this->getusuario_id()},'{$this->getprovincia()}','{$this->getlocalidad()}','{$this->getdireccion()}',
                {$this->getcosto()},'confirm',CURDATE(),CURTIME() )";
        $resultado  = $this->DB->query($sql);
      

        if($resultado){  

            $save = true;
        }

        return $save;



    }

    public function save_linea(){

        $sql = "SELECT LAST_INSERT_ID() AS 'pedido'";
        $consulta = $this->DB->query($sql);
        $pedido_id = $consulta->fetch_object()->pedido;


        foreach ($_SESSION['carrito'] as $producto => $valor) {
            
            $carrito = $valor['Producto'];

            $sql = "INSERT INTO lineas_pedidos(id,pedido_id,producto_id,unidades)
            VALUES(NULL,$pedido_id,{$carrito->id},{$_SESSION['carrito'][$producto]['unidades']})";

            $consulta = $this->DB->query($sql); 

            $save = false;

                if($consulta){  

                    $save = true;
                }

        }

        return $save;
    }

    public function edit(){

        $sql = "UPDATE pedidos SET  estado = '{$this->getestado()}' WHERE id = {$this->getid()}";
        $resultado  = $this->DB->query($sql);

        $save = false;
        if($resultado){  

            $save = true;
        }

        return $save;

    }


}