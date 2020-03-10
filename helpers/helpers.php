<?php

class helpers{

    public static function delete_session($name)
    {
        if(isset($_SESSION[$name])){

            $_SESSION[$name]=null;
            unset($_SESSION[$name]);
        }

        return $name;
        
    }

    public static function isadmin(){

        if(isset($_SESSION['admin'])){

            return true;

        }else{
            header("location:".base_url);
        }

    }

    public  static function showcategorias(){
        require_once 'models/categoria.php';
        $consulta = new categoria();
        $categorias = $consulta->getcategorias();

         
       return $categorias;

    }

}