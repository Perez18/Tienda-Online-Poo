<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
    <title>Tienda-Online-Poo</title>
</head>

<body>

    <div id="container">
        <!---------- CABEZERA---------->
        <header id="header">

            <div id="logo">
                <img src="<?=base_url?>assets/img/camiseta.png" alt="camiseta">
                <a href="<?=base_url?>">
                    Tienda de Camiseta
                </a>
            </div>
        </header>

        <!---------- MENU ---------->
        <?php   $allcategorias = helpers::showcategorias(); ?>
        <nav id="menu">
      
            <ul>
                <li><a href="<?=base_url?>"> Inicio</a></li>

                <?php  while($cate = $allcategorias->fetch_object()):  ?>
                
                    <li><a href="<?=base_url?>categoria/ver&id=<?=$cate->id?>"><?=$cate->nombre?></a></li>
        
                <?php endwhile; ?>
            </ul>
        </nav>

        <div id="content">
