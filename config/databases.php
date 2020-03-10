<?php

class  database{
  

    public static function conexion()
    {
             $conexion = new mysqli("localhost","root","","tienda_master");
             $conexion->query("SET NAMES'utf8'");

             return $conexion;
    }





}