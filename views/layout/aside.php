<!---------- BARRA LATERAL ---------->
<aside id="lateral">

    <div class="block_aside">

    <h3>Mi Carrito</h3>
    <?php  $stats =  helpers::statscarrito()?>
    <li><a href="#">Producto(<?=$stats['count']?>)</a></li>
    <li><a href="#">Total B/<?=$stats['precio']?> </a></li>
    <li><a href="<?=base_url?>carrito/index">Ver Carrito</a></li>

    </div>

    <div id="login" class="block_aside">
        <?php if (!isset($_SESSION['identify'])) : ?>

            <h3>Entrar al Sitio Web</h3>
            <form action="<?= base_url ?>usuario/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" required>
                <label for="password">Password</label>
                <input type="password" name="password" required>
                <input type="submit" value="Entrar" class="button">
            </form>
        <?php else : ?>
            <h3><?= $_SESSION['identify']->nombre . '&nbsp' . $_SESSION['identify']->apellidos ?></h3>
        <?php endif ?>
        
        <ul>
            <?php if (isset($_SESSION['admin'])) : ?>
                <li><a href="<?= base_url ?>categoria/index">Gestionar Categorias</a></li>
                <li><a href="<?=base_url?>producto/gestion">Gestionar Productos</a></li>
                <li><a href="<?=base_url?>carrito/index">Gestionar Pedidos</a></li>
            <?php endif; ?>

            <?php if (isset($_SESSION['identify'])) : ?>
                <li><a href="#">Mis Pedididos</a></li>
                <li><a href="<?= base_url?>usuario/logout">Cerrar Session</a></li>
            <?php else: ?>
                <li><a href="<?=base_url?>usuario/registro">Registrate</a></li>
            <?php endif; ?>
        </ul>

    </div>


</aside>

<div id="central">