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


      var_dump($_POST);
      die();


   }



}