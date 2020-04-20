<?php

//require_once '../config/databases.php';

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

         var_dump($_POST);

         die();


      }else{

         #Redigir si no existe Session activa

         header("location:".base_url);


      }


   }



}