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
            $pedido_linea = $pedido->save_linea();

          # var_dump($_SESSION['carrito']);

          
            if($save && $pedido_linea){

               $_SESSION['pedido'] = 'complete';

            }else{

               $_SESSION['pedido'] = 'faild';

            }


         }else
         {

            $_SESSION['pedido'] = 'faild';

         }
         
        header("location:".base_url.'pedido/confirmados');

       }else{

         #Redigir si no existe Session activa

         header("location:".base_url);


       }


   }


   public function confirmados(){


      $login = $_SESSION['identify'];

      $usuario_id = $login->id;
 
      #Informacion de pedido segun el usuario logeado
      $detalle_pedido = new pedido();
      $detalle_pedido->setusuario_id($usuario_id);
      $detalles = $detalle_pedido->getoneBYuser();


      #productos para detalle
      $id_pedido = $detalles->id;
      $detalle_pedido->setid($id_pedido);
      $productos = $detalle_pedido->getproductoBypedido();

      var_dump($productos);


      require_once 'views/pedidos/confirmado.php';

   }



}