<h1>Detalles de Pedido</h1>

<?php if(isset($pedidos)): ?>

   <?php if( isset($_SESSION['admin'])): ?>

   <form action="<?= base_url ?>pedido/estado" method="post">

   <!-- Pedidos Id-->
   <input type="hidden" name="pedido_id" value="<?=$pedidos->id ?>">

    <select name="estado" id="">

           <option value="confirm" <?=$pedidos->estado == 'confirm'? 'selected' : ''?> >Pendiente</option>
           <option value="preparation"  <?=$pedidos->estado == 'preparation'? 'selected' : ''?>  >En Preparacion</option>
           <option value="ready"  <?=$pedidos->estado == 'ready'? 'selected' : ''?>  >Preparado</option>
           <option value="send"  <?=$pedidos->estado == 'send'? 'selected' : ''?>  >Enviado</option>

     </select>

     <input type="submit" value="Cambiar Estado">

   </form>

   <?php endif; ?>

<br>
<h3>Detalle De Usuario</h3>
<p>Usuario: <?=$pedidos->nombre?>&nbsp;<?=$pedidos->apellidos?> </p>
<p>Email: <?=$pedidos->email?></p>

<br>

<h3>Direccion de Envio</h3>
<p>Provincia: <?= $pedidos->provincia ?></p>
<p>Ciudad: <?= $pedidos->localidad ?></p>
<p>Direccion: <?= $pedidos->direccion ?></p>

<br>

<h3>Datos de Pedido</h3>
<p>Estado: <?=helpers::showestado($pedidos->estado) ?></p>
Numero de Pedido: <?= $pedidos->id ?> <br>
Costo Total: B/ <?= $pedidos->costo ?> <br>
Direccion : <?= $pedidos->direccion ?>
<br> <br>
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

<?php endif; ?>
