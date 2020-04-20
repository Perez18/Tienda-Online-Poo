<?php if(isset($categoria)): ?>

    <h1><?=$categoria->nombre?></h1>
       
       <?php if($productos->num_rows == 0 ): ?>

        <h3>No Existe Productos En Esta Categoria</h3>
     
        <?php else : ?>

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

        <?php endif; ?>

<?php else : ?>

    <h1>Categoria No Existe</h1>


<?php endif; ?>