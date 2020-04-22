<h1> Mi Carrito </h1>
<?php if (isset($_SESSION['carrito'])) : ?>

  <table>
    <tr>
      <td>Imagen</td>
      <td>Nombre</td>
      <td>Precio</td>
      <td>Unidades</td>
      <td>Eliminar</td>

    </tr>
    <?php foreach ($carritos as $indice => $elemento) :

      $producto = $elemento['Producto'];

    ?>

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
        <td><?= $elemento['unidades'] ?></td>
        <td>    <a href="<?= base_url ?>carrito/remove&indice=<?=$indice?>" class="button button-carrito button-red">Eliminar Producto</a>
      
      </td>


      </tr>
    <?php endforeach; ?>
  </table>
  <br>

  <div class="delete-carrito">
    <a href="<?= base_url ?>carrito/delete_all" class="button button-delete button-red">Vaciar Carrito</a>
  </div>

  <div class="total-carrito">
    <?php $stats = helpers::statscarrito() ?>
    <h3>Total Del Carrito : <?= $stats['precio'] ?></h3>
    <a href="<?= base_url ?>pedido/realizar" class="button button-pedido">Realizar Pedido</a>
  </div>

<?php else : ?>

  <h1>El Carrito Esta Vacio Añade Algun Elemento</h1>

<?php endif; ?>