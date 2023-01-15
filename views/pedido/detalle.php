<h1>Detalle del Pedido</h1>

<?php if(isset($pedido)):?>

    <?php if(isset($_SESSION['admin'])):?>
        <h3>Cambiar estado del pedido</h3>
        <form action="<?=base_url?>pedido/estado" method="post">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id">
            <select name="estado">
                <option value="confirm" <?= $pedido->estado == "confirm" ? 'selected' : '';?>>Pendiente</option>
                <option value="preparation" <?= $pedido->estado == "preparation" ? 'selected' : '';?>>En preparación</option>
                <option value="ready" <?= $pedido->estado == "ready" ? 'selected' : '';?>>Listo para enviar</option>
                <option value="sent" <?= $pedido->estado == "sent" ? 'selected' : '';?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado">
        </form>
        <br>

        <h3>Datos del Usuario</h3>
        <strong>Nombre: </strong><?=$usuario->nombre?> <?=$usuario->apellidos?><br>
        <strong>Email: </strong><?=$usuario->email?><br><br>

    <?php endif; ?>

    <h3>Direccion de envío</h3>
    <strong>Departamento: </strong><?=$pedido->departamento?><br>
    <strong>Ciudad: </strong><?=$pedido->ciudad?><br>
    <strong>Direccion: </strong><?=$pedido->direccion?><br><br>

    <h3>Datos del pedido:</h3>
    <strong>Estado: </strong><?= Utils::showStatus($pedido->estado); ?> <br>
    <strong>Numero de pedido: </strong><?=$pedido->id?> <br>
    <strong>Total a Pagar: </strong><?=$pedido->coste?> Bs. <br><br>
    <strong>Productos:</strong>

    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while($prod = $productos->fetch_object()): ?>
            <tr>
                    <td>
                        <?php if($prod->imagen!=null): ?>
                            <img src="<?=base_url?>uploads/images/<?=$prod->imagen?>" class="img_carrito">
                        <?php else: ?>
                            <img src="<?=base_url?>assets/img/camiseta.png" class="img_carrito">
                        <?php endif; ?>
                    </td>
                    <td> <a href="<?=base_url?>producto/ver&id=<?=$prod->id?>"> <?=$prod->nombre?> </a> </td>
                    <td><?=$prod->precio?></td>
                    <td><?=$prod->unidades?></td>
                </tr>
        <?php endwhile; ?>
    </table>
        
<?php endif;?>