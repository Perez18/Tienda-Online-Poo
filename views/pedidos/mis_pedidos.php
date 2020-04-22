<?php if (isset($gestion)) : ?>
    <h1>Gestionar Pedidos</h1>

<?php else : ?>
    <h1>Mis Pedidos</h1>
<?php endif; ?>

<table>
    <tr>
        <td>N° Pedido</td>
        <td>Costo</td>
        <td>Fecha de Registro</td>
        <td>Estado</td>
    </tr>

    <?php while ($pe = $pedidos->fetch_object()) : ?>

        <tr>
            <td><a href="<?= base_url ?>pedido/detalle&id=<?= $pe->id ?>"><?= $pe->id ?></a></td>
            <td><?= $pe->costo ?></td>
            <td><?= $pe->fecha_registro ?></td>
            <td><?=helpers::showestado($pe->estado) ?></td>
        </tr>


    <?php endwhile; ?>


</table>