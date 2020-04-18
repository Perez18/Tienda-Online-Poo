<?php

//require_once '../config/databases.php';

require_once 'models/usuario.php';

class usuariocontroller
{


   public function index()
   {

      echo  "Controller usuario, accion index ";
   }

   public function registro()
   {

      require 'views/usuarios/registro.php';
   }

   public function save()
   {

      if ($_POST) {

         $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : false;
         $apellido = isset($_POST['apellido']) ? trim($_POST['apellido']) : false;
         $email = isset($_POST['email']) ? trim($_POST['email']) : false;
         $password = isset($_POST['password']) ? trim($_POST['password']) : false;

         if ($nombre && $apellido && $email && $password) {

            $usuario = new usuario();
            $usuario->setnombre($nombre);
            $usuario->setapellido($apellido);
            $usuario->setemail($email);
            $usuario->setpassword($password);


            $save = $usuario->save();
            if ($save) {

               $_SESSION['registro'] = 'complete';
            } else {

               $_SESSION['registro'] = 'Faild';
            }
         } else {
            $_SESSION['registro'] = 'Faild';
         }
      } else {

         $_SESSION['registro'] = 'faild';
      }

      header("location:" . base_url . 'usuario/registro');
   }


   public function login()
   {

      if (isset($_POST)) {

         $login = new usuario();
         $login->setemail($_POST['email']);
         $login->setpassword($_POST['password']);

         //VERIFICACION DE LOS DATOS
         $identify = $login->login();

         //CREACION DE SESSION
         if ($identify && is_object($identify)) {

            $_SESSION['identify'] = $identify;

            if ($identify->rol == 'admin') {

               $_SESSION['admin'] = true;
            }
         }
      } else {
         $_SESSION['error_fallida'] = true;
      }
      header("location:" . base_url);
   }

   public function logout()
   {
      if (isset($_SESSION['identify'])) {

         unset($_SESSION['identify']);
      }

      if (isset($_SESSION['admin'])) {

         unset($_SESSION['admin']);
      }

      header("location:" . base_url);
   }
}
