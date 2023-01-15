<h1>Gestion de Productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>

<!--Mostrar mensajes de error o exito al agregar nuevo producto-->
<?php if(isset($_SESSION['producto']) && $_SESSION['producto']=="completed"): ?>
    <strong class="alert_green">El Producto se ha agregado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']!="completed"): ?>
    <strong class="alert_red">Error, el producto No se ha agregado</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

<!--Mostrar mensajes de error o exito al eliminar nuevo producto-->
<?php if(isset($_SESSION['delete']) && $_SESSION['delete']=="completed"): ?>
    <strong class="alert_green">El Producto se ha eliminado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete']!="completed"): ?>
    <strong class="alert_red">Error, el producto No se ha eliminado</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>
    <?php while($prod = $productos->fetch_object()):?>
        <tr>
            <td><?=$prod->id;?></td>
            <td><?=$prod->nombre;?></td>
            <td><?=$prod->precio;?></td>
            <td><?=$prod->stock;?></td>
            <td>
                <a href="<?=base_url?>producto/editar&id=<?=$prod->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>producto/eliminar&id=<?=$prod->id?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>