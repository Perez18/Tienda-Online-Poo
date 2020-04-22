<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>

   <h1>Tu Pedido Ha Sido confirmado</h1>
   <p>
      Tu pedido ha sido guardado con exito, una vez que se realice la transferencia
      bancaria 572568525ARD con el coste del pedido,sera procesado y enviado.

   </p>

   <br>

   <h3>Detalle de Compra</h3>
   Numero de Pedido: <?= $detalles->id ?> <br>
   Costo Total: B/ <?= $detalles->costo ?> <br> <br>

   Productos:
   <table>

      <tr>
         <td>Imagen</td>
         <td>Nombre</td>
         <td>Precio</td>
         <td>Unidades</td>

      </tr>
      <?php while ($producto = $productos->fetch_object()) : ?>

         <tr>

            <td>
               <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>">
                  <?php if ($producto->imagen != NULL) : ?>
                     <img src="<?= base_url ?>upload/imagenes/<?= $producto->imagen ?> " class="img_carrito">
                  <?php else : ?>
                     <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito">
                  <?php endif; ?>
               </a>
            </td>

            <td><a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a></td>

            <td><?= $producto->precio ?></td>
            <td><?= $producto->unidades ?></td>

         </tr>

      <?php endwhile; ?>
   </table>

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'faild') : ?>

   <h1>Tu Pedido No Ha sido Procesado de forma correcta</h1>

<?php endif; ?>