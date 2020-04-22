<?php

class helpers
{

    public static function delete_session($name)
    {
        if (isset($_SESSION[$name])) {

            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    public static function isadmin()
    {

        if (isset($_SESSION['admin'])) {

            return true;
        } else {
            header("location:" . base_url);
        }
    }



    public static function isidentify()
    {

        if (isset($_SESSION['identify'])) {

            return true;
        } else {
            header("location:" . base_url);
        }
    }



    public  static function showcategorias()
    {
        require_once 'models/categoria.php';
        $consulta = new categoria();
        $categorias = $consulta->getcategorias();


        return $categorias;
    }

    public static function statscarrito()
    {

        #Array donde se almacenar toda la informacion de cantidad y precio
        $stats = array(

            "count" => 0,
            "precio" => 0

        );

        if (isset($_SESSION['carrito'])) {

            #Cantidad de producto en el carrito
            $stats["count"] = count($_SESSION['carrito']);

            #precio total en el carrito        
            foreach ($_SESSION['carrito'] as $carrito => $producto) {

                $stats['precio'] += $producto['precio'] * $producto['unidades'];
            }
        }

        return $stats;
    }

    public static function showestado($estado)
    {

        $state = "";

        switch ($estado) {
            case 'confirm':

                $state = "Pendiente";
                break;

            case 'preparation':

                $state = "En Preparacion";
                break;

            case 'ready':

                $state = "Preparado";
                break;

            case 'send':

                $state = "Enviado";
                break;
        }

        return $state;
    }
}
