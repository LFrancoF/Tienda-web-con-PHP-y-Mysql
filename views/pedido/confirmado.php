<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == "completed"): ?>
    <h1>Tu pedido ha sido confirmado</h1>
    <p>
        Tu pedido ha sido guardado con exito, una vez que realices la transferencia bancaria a la cuenta
        7715151321ADDS00 con el coste del pedido, será procesado y enviado.
    </p>
    <br>

    <?php if(isset($pedido)):?>
        <h3>Datos del pedido:</h3>
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

<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != "completed"): ?>

    <h1>Tu pedido no se ha podido procesar</h1>

<?php endif; ?>