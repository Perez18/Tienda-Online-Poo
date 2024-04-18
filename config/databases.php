<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'tienda_master');

class  database{
  

    public static function conexion()
    {   
             $conexion = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
             $conexion->query("SET NAMES'utf8'");

             return $conexion;
    }





}