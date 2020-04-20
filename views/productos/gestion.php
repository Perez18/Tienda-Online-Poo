                                            <h1>Gestion De Productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small"> Crear producto</a>
<?php if(isset($_SESSION['eliminar']) && $_SESSION['eliminar'] == 'complete' ):?>
    <h4 class="alert_green"><strong>producto Eliminado</strong></h4>

<?php elseif(isset($_SESSION['eliminar']) && $_SESSION['eliminar'] == 'faild'):?>
    <h4 class="alert_red"><strong>Error fallido en eliminacion</strong></h4>
<?php endif;?>
    
<?php helpers::delete_session('eliminar') ?>

<table > 
    <thead>
    <tr>
        <td>#</td>
        <td> <strong>Nombre</strong> </td>
        <td> <strong>Precio</strong> </td>
        <td> <strong>Descripcion</strong> </td>
        <td> <strong>Stock</strong> </td>
        <td><strong>Acciones</strong></td>
    </tr>
    </thead>

    <tbody>

        <?php while($producto = $productos->fetch_object()):?>
      <tr>
          <td><?=$producto->id?></td>
          <td><?=$producto->nombre?></td>
          <td><?=$producto->precio?></td>
          <td><?=$producto->descripcion?></td>
          <td><?=$producto->stock?></td>
          <td>
          <a href="<?=base_url?>producto/editar&id=<?=$producto->id?>" class="button button-button-gestion" >Editar</a>
          <a href="<?=base_url?>producto/eliminar&id=<?=$producto->id?>" class="button button-gestion button-red">Eliminar</a>
          </td>


      </tr>
        <?php endwhile; ?>

    </tbody>

</table>

