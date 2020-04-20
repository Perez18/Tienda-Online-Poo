<?php

require_once 'models/pedido.php';

class pedidocontroller {


     public function index(){
     
        echo  "Controller pedido, accion index ";

     }

     public function realizar(){
  
      require_once 'views/pedidos/realizar.php';
   }
   
   
   public function add(){

  
      if(isset($_SESSION['identify'])){
 
         #Agregar Pedido a la DB

         if(isset($_POST)){

            #Informacion de usuario
            $login = $_SESSION['identify'];
            $usuario_id =  $login->id;
           
            #Infomarcion de envio
            $provincia = isset($_POST['provincia']) ? trim($_POST['provincia']) : false;
            $localidad = isset($_POST['ciudad']) ? trim($_POST['ciudad']) : false;
            $direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : false;

            #informacion de Carrito
            $stats = helpers::statscarrito();
            $Costo_Total =  $stats['precio'];

            #Añadir a la DB

            $pedido = new pedido();
            $pedido->setusuario_id($usuario_id);
            $pedido->setprovincia($provincia);
            $pedido->setlocalidad($localidad);
            $pedido->setdireccion($direccion);
            $pedido->setcosto($Costo_Total);
            $save = $pedido->save();
            
            $pedido_id = $pedido->save_linea();

            var_dump($pedido_id);
        
          
            if($save){

               $_SESSION['pedido'] = 'complete';

            }else{

               $_SESSION['pedido'] = 'faild';

            }

            var_dump($_SESSION['pedido']);


            header("location:".base_url.'pedido/realizar');

            
         }else
         {

            header("location:".base_url);

         }


       }else{

         #Redigir si no existe Session activa

         header("location:".base_url);


       }


   }



}