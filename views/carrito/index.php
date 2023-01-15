<h1>Carrito de Compra</h1>

<?php if(isset($carrito) && count($carrito) != 0): ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
        
        <?php
            foreach($carrito as $indice => $elemento):
            $producto = $elemento['producto'];    
        ?>
            <tr>
                <td>
                    <?php if($producto->imagen!=null): ?>
                        <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img_carrito">
                    <?php else: ?>
                        <img src="<?=base_url?>assets/img/camiseta.png" class="img_carrito">
                    <?php endif; ?>
                </td>
                <td> <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"> <?=$producto->nombre?> </a> </td>
                <td><?=$producto->precio?></td>
                <td>
                    <?=$elemento['unidades']?>
                    <div class="updown-unidades">
                        <a href="<?=base_url?>carrito/down&index=<?=$indice?>" class="button">-</a>
                        <a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="button">+</a>
                    </div>
                </td>
                <td><a href="<?=base_url?>carrito/remove&index=<?=$indice?>" class="button button-carrito button-red">Quitar producto</a></td>
            </tr>
            
        <?php endforeach; ?>      
    </table>

    </br>

    <div class="delete-carrito">
        <a href="<?=base_url?>carrito/deleteAll" class="button button-delete button-red">Vaciar carrito</a>
    </div>
    <div class="total-carrito">
        <?php $stats = Utils::statsCarrito(); ?>
        <h3>Precio Total : <?= $stats['total'] ?> Bs.</h3>
        <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer Pedido</a>
    </div>

<?php else: ?>
    <strong>No tienes productos en el carrito</strong>

<?php endif;?>