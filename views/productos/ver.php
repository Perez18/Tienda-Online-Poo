<?php if(isset($pro)): ?>

             <h1><?=$pro->nombre?></h1>
                <div id="detail-product">

                   <div class="image">
                          <?php if ($pro->imagen != NULL): ?>
                          <img src="<?=base_url?>upload/imagenes/<?=$pro->imagen?> " alt="camiseta">
                          <?php else: ?>
                          <img src="<?=base_url?>assets/img/camiseta.png" alt="camiseta">
                          <?php endif; ?>
                    </div>

                    <div class="data">
                          <p><?=$pro->descripcion?></p>
                          <p>B/<?=$pro->precio ?></p>
                          <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button" >Comprar</a>
                    </div>


                </div>

 <?php else : ?>

  <h1>El Producto No Existe </h1>

<?php endif; ?>