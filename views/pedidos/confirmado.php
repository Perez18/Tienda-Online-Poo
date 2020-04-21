
<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'):?>

<h1>Tu Pedido Ha Sido confirmado</h1>
<p>
   Tu pedido ha sido guardado con exito, una vez que se realice la transferencia 
   bancaria 572568525ARD con el coste del pedido,sera procesado y enviado.
 
</p>

<br>

<h3>Detalle de Compra</h3>
Numero de Pedido: <?=$detalles->id?> <br>
Costo Total: B/ <?=$detalles->costo?>  <br>
productos:


<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'faild'):?>

<h1>Tu Pedido No Ha sido Procesado de forma correcta</h1>

<?php endif;?>