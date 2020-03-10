<?php

require_once 'models/categoria.php';

class categoriacontroller
{


   public function index()
   {

      helpers::isadmin();
      $consulta = new categoria();
      $categorias = $consulta->getcategorias();

      require_once 'views/categorias/index.php';
   }

   public function crear()
   {

      helpers::isadmin();
      require_once 'views/categorias/crear.php';
   }

   public function save()
   {

      helpers::isadmin();

      if (isset($_POST)) {

         $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : false;

         if ($nombre) {

            $categorias = new categoria();
            $categorias->setnombre($nombre);
            $save =  $categorias->save();

            if ($save) {

               $_SESSION['newcategoria'] = 'complete';
            } else {

               $_SESSION['newcategoria'] = 'faild';
            }
         } else {

            $_SESSION['newcategoria'] = 'faild';
         }
      } else {
         $_SESSION['newcategoria'] = 'faild';
      }

      header("location:" . base_url . 'categoria/index');
   }


}