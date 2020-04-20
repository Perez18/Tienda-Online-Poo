<?php if(isset($pro)): ?>

             <h1><?=$pro->nombre?></h1>
            <div class="product">
                <?php if ($pro->imagen != NULL): ?>
                <img src="<?=base_url?>upload/imagenes/<?=$pro->imagen?> " alt="camiseta">
                <?php endif; ?>
 
                <p><?=$pro->descripcion?></p>
                <p>B/<?=$pro->precio ?></p>
                <a href="<?=base_url?>carrito/add" class="button" >Comprar</a>
            </div>

 <?php else : ?>

  <h1>El Producto No Existe </h1>

<?php endif; ?>