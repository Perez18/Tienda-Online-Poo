<?php

//require_once '../config/databases.php';

require_once 'models/producto.php';

class carritocontroller {


     public function index(){
     

        //var_dump($_SESSION['carrito']);
        $carritos = $_SESSION['carrito'];

        require_once 'views/carritos/index.php';

     }



     public function add(){
     


        if(isset($_GET['id'])){

          $producto_id = $_GET['id'];

          
        }else{

            header("location:".base_url);
        } 

      //Aumenta la cantidad de unidades de un producto
        if(isset($_SESSION['carrito'])){
             
            $contador = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
  
                if($elemento['id_producto'] == $producto_id){

                    $_SESSION['carrito'][$indice]['unidades']++;
                 
                    $contador++;
                }                
            }
          }

        
        //cantidad inicial al añadir un producto al carrito
          if(!isset($contador) || $contador == 0 ){

            //Conseguir producto
            $producto = new producto();
            $producto->setid($producto_id);
            $producto = $producto->getone();


            if(is_object($producto)){

               $_SESSION['carrito'][] = array(
               
                "id_producto" => $producto->id ,
                "precio" => $producto->precio,
                "unidades" => 1 ,
                "Producto" => $producto

               );
             }

            }

    
       header("location:".base_url.'carrito/index');

     }

     
     public function remove(){
     
        echo  "Controller carrito, accion remove  ";

     }

     
     public function delete_all(){
      
        unset($_SESSION['carrito']);

        header("location:".base_url.'carrito/index');





     }

    


}
