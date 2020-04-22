
<?php   if(isset($_SESSION['identify'])): ?> 


         <h1>Pedidos</h1>
  
         <a href="<?=base_url?>pedido/index">Ver Productos y Precios <br> </a>

        <br>
        
        <h3>Direccion Para El Envio </h3>
        <form action="<?=base_url?>pedido/add" method="post">
         
         <label for="Provincia">Provincia</label>
         <input type="text" name="provincia" required >

         <label for="Ciudad">Ciudad</label>
         <input type="text" name="ciudad" required >

         <label for="Direccion">Direccion</label>
         <input type="text" name="direccion" required>

        <input type="submit" value="Confirmar Pedido">
        </form>

<?php else : ?>

        <h1>Necesita estar identificado </h1>
        <p>Crea tu cuenta para realizar tus pedidos</p>
        
<?php endif; ?>

 