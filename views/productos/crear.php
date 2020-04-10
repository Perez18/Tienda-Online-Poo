

<?php  if(isset($editar) && isset($pro) && is_object($pro) ):?>
    <h1>Editar Productos <?=$pro->nombre?> </h1>
    <?php $url_action = base_url."producto/actualizar&id=$pro->id";?>
<?php else:?>
    <h1>Creacion de Productos </h1>
    <?php $url_action = base_url."producto/save";?>
<?php endif;?>


<?php  if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete' ):?>
    <h4 class="alert_green"><strong>Categoria creada de forma correcta</strong></h4>

<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == 'faild'):?>

    <h4 class="alert_red"><strong>Verificar Datos</strong></h4>
<?php endif;?>
    
<?php helpers::delete_session('producto') ?>



<form action="<?=$url_action?>" method="post" enctype="multipart/form-data">

<label for="nombre">Categoria</label>
<select name="categoria" id="" >
        <?php  $categoriasall =  helpers::showcategorias() ?>
        <option value=""></option>
        <?php while($cate = $categoriasall->fetch_object()):?>
        <option value="<?=$cate->id?>" <?=isset($pro) && is_object($pro) && $cate->id == $pro->categoria_id ? 'selected' : '' ?>> 
            
           <?=$cate->nombre?>

         </option>
        <?php endwhile; ?>
</select> 

<label for="nombre">Nombre De Producto</label>
<input type="text" name="nombre"  value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''  ?>">

<label for="precio">Precio De Producto</label>
<input type="number" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : ''  ?>">

<label for="stock">Stock</label>
<input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''  ?>" >

<label for="oferta">Oferta</label>
<input type="number" name="oferta" value="<?=isset($pro) && is_object($pro) ? $pro->oferta : ''  ?>">

<label for="descpricion">Descripcion</label>
<textarea name="descripcion" id="" cols="20" rows="9">
<?=isset($pro) && is_object($pro) ? $pro->descripcion : ''  ?>
</textarea>

<label for="imagen">Imagen</label>
<?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
   <img src="<?=base_url?>upload/imagenes<?=$pro->imagen?>" class="thumb" >
<?php endif; ?>

<input type="file" name="imagen" id="" >

<input type="submit" value="enviar">


</form>