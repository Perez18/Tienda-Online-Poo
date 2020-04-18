            <!---------- CONTENIDO CENTRAL ---------->
            <h1>Productos Destacados</h1>

         <?php while($producto = $productos->fetch_object()):   ?>
                <div class="product">
                    <?php if ($producto->imagen != NULL): ?>
                    <img src="<?=base_url?>upload/imagenes/<?=$producto->imagen?> " alt="camiseta">
                    <?php endif; ?>

                    <h2><?=$producto->nombre?></h2>
                    <p>B/<?=$producto->precio ?></p>
                    <a href="#" class="button" >Comprar</a>
                </div>
         <?php endwhile; ?>
      
  