<?php

require_once 'models/producto.php';

class productocontroller
{


  public function index()
  {

    // echo  "Controller producto, accion index ";

    $destacados = new producto();

    $productos = $destacados->getrandom(5);


    //renderizar vista 
    require_once 'views/productos/destacados.php';

  }


  public function gestion()
  {
    helpers::isadmin();

    $gestion = new producto();
    $productos = $gestion->getall();


    require_once 'views/productos/gestion.php';
  }

   public function ver(){

    if(isset($_GET['id'])){
      $id = $_GET['id'];

      $producto = new producto();
      $producto->setid($id);
      $pro =  $producto->getone();

    }

    require_once 'views/productos/ver.php';


   }



  public function crear()
  {
    helpers::isadmin();
    require_once 'views/productos/crear.php';
  }

  public function save()
  {

    if (isset($_POST)) {

     // var_dump($_POST);
      var_dump($_FILES);

//       die();
    
      //validar datos
      $categoria = isset($_POST['categoria']) ? trim($_POST['categoria']) : false;
      $nombre =  isset($_POST['nombre']) ? trim($_POST['nombre']) : false;
      $precio = isset($_POST['precio']) ? trim($_POST['precio']) : false;
      $stock = isset($_POST['stock']) ? trim($_POST['stock']) : false;
      $oferta =  isset($_POST['oferta']) ? trim($_POST['oferta']) : false;
      $descipcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : false;

      if ($categoria && $nombre && $precio && $stock)  {

        //instanciamos la clase
        $producto = new producto();
        $producto->setcategoria_id($categoria);
        $producto->setnombre($nombre);
        $producto->setprecio($precio);
        $producto->setstock($stock);
        $producto->setoferta($oferta);
        $producto->setdescripcion($descipcion);

        //guardar archivo de imagen
        
        if(isset($_FILES['imagen'])){

        $file = $_FILES['imagen'];
        $filename = $file['name'];
        $mimetype = $file['type'];
        $tmp_name = $file['tmp_name'];

  
        if ($mimetype == "image/gif" || $mimetype == "image/jpeg	" || $mimetype == "image/png" || $mimetype == "image/svg+xml" || 
         $mimetype = "application/octet-stream") {

          //si no existe el directorio , se crea
             if (!is_dir("./upload/imagenes")) {

               mkdir("./upload/imagenes",0755,true);


             }
           
             // mueve la imagen original a nuestro proyecto en la carpeta creada  
             move_uploaded_file($tmp_name, './upload/imagenes/'.$filename);
             $producto->setimagen($filename);

          }
       }

       if(isset($_GET['id'])){
        $id = $_GET['id'];
        $producto->setid($id);
        $save = $producto->edit();

       }else{

        $save = $producto->save();
       
      }


        

 
        if ($save) {

          $_SESSION['producto'] = 'complete';
        } else {
          $_SESSION['producto'] = 'faild';
        }
          } else {

            $_SESSION['producto'] = 'faild';
          }
        } else {

          $_SESSION['producto'] = 'faild';
        }

        header("location:" . base_url . 'producto/crear');
  }

  

  public function editar()
  {
      helpers::isadmin();

    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $editar = true;
      $producto = new producto();
      $producto->setid($id);
      $pro =  $producto->getone();

      require_once 'views/productos/crear.php';

    }else{

      header("location".base_url.'producto/gestion');

    }


  }



  public function eliminar()
  {

        helpers::isadmin();

        if (isset($_GET['id'])) {

          $id_producto = isset($_GET['id']) ? $_GET['id'] : false;
          $producto = new producto();
          $producto->setid($id_producto);
          $eliminar =  $producto->eliminar();

          if ($eliminar) {

            $_SESSION['eliminar'] = 'complete';
          } else {

            $_SESSION['eliminar'] = 'faild';
          }
        } else {

          $_SESSION['eliminar'] = 'faild';
        }

        header("location:" . base_url . 'producto/gestion');
      }
}
