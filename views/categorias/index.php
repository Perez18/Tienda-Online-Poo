
<h1>Gestionar Categorias</h1>


<a href="<?=base_url?>categoria/crear" class="button button-small">
Crear Categoria
</a>

<?php  if(isset($_SESSION['newcategoria']) && $_SESSION['newcategoria'] == 'complete' ):?>
    <h4 class="alert_green"><strong>Categoria creada de forma correcta</strong></h4>

<?php elseif(isset($_SESSION['newcategoria']) && $_SESSION['newcategoria'] == 'faild'):?>

    <h4 class="alert_red"><strong>Verificar Datos</strong></h4>
<?php endif;?>
    
<?php helpers::delete_session('newcategoria') ?>


<table > 
    <thead>
    <tr>
        <td>#</td>
        <td> <strong>Categorias</strong> </td>
    </tr>
    </thead>

    <tbody>
        <?php while($categoria = $categorias->fetch_object()):?>
      <tr>
          <td><?=$categoria->id?></td>
          <td><?=$categoria->nombre?></td>
      </tr>
        <?php endwhile; ?>

    </tbody>

</table>

