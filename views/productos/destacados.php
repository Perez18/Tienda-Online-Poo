                                            <!---------- CONTENIDO CENTRAL ---------->
                                            <h1>Productos Destacados</h1>

         <?php while($producto = $productos->fetch_object()):   ?>
           
           <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"> 
                <div class="product">
                    <?php if ($producto->imagen != NULL): ?>
                    <img src="<?=base_url?>upload/imagenes/<?=$producto->imagen?> " alt="camiseta">
                    <?php else: ?>
                     <img src="<?=base_url?>assets/img/camiseta.png" alt="camiseta">
                    <?php endif; ?>

                    <h2><?=$producto->nombre?></h2>
                    <p>B/<?=$producto->precio ?></p>
                    <a href="<?=base_url?>carrito/add&id=<?=$producto->id?>" class="button" >Comprar</a>
                </div>
            </a>

          <?php endwhile; ?>
      
  