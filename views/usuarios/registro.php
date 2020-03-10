<h1>Registro De Usuario</h1>
 
<?php if(isset($_SESSION['registro'])  && $_SESSION['registro'] == 'complete' ):?>
      <h5 style="color:green;" > Registro completado correctamente </h5>
<?php elseif(isset($_SESSION['registro'])  && $_SESSION['registro'] == 'Faild'):?>
    <h5  style="color:red;"> Registro Fallido, verifique los datos </h5>
<?php  endif; ?>

<?php  helpers::delete_session('registro') ?>
     
<form action="<?=base_url?>usuario/save" method="post">

    <label for="Nombre">Nombre</label>
     <input type="text" name="nombre" required >

     <label for="Apellido">Apellido</label>
     <input type="text" name="apellido" required>

     <label for="email">email</label>
     <input type="email" name="email" required>

     <label for="password">Password</label>
     <input type="password" name="password" required >

     <input type="submit" value="Enviar">
</form>