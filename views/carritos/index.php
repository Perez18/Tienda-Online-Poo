<h1> Carrito </h1>

<table>
 <tr>
      <td>Imagen</td>
      <td>Nombre</td>
      <td>Precio</td>
      <td>Unidades</td>

 </tr>
   
 <?php  foreach ($carritos as $indice => $elemento): 
    
   $producto = $elemento['Producto']; 
    
  ?>
  
   <tr>
       
       <td>
       <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>">
         <?php if ($producto->imagen != NULL): ?>
         <img src="<?=base_url?>upload/imagenes/<?=$producto->imagen?> " class="img_carrito">
         <?php else: ?>
            <img src="<?=base_url?>assets/img/camiseta.png" class="img_carrito">
         <?php endif; ?>
         </a>
       </td>

       <td><a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a></td>
      
       <td><?=$producto->precio?></td>
       <td><?=$elemento['unidades']?></td>
    
   </tr>
 <?php endforeach; ?>
</table>

<div class="total-carrito">
  <?php $stats = helpers::statscarrito() ?>
  <h3>Total Del Carrito : <?=$stats['precio']?></h3>
  <a href="<?=base_url?>pedido/realizar" class="button button-pedido">Realizar Pedidos</a>


</div>