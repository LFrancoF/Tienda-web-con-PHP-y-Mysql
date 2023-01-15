<h1>Algunos de Nuestros Productos</h1>
<?php while($prod = $productos->fetch_object()): ?>
    <div class="product">
        <!--La imagen y el nombre del producto sera un enlace para ver detalles del producto-->
        <a href="<?=base_url?>producto/ver&id=<?=$prod->id?>">
            <?php if($prod->imagen!=null): ?>
                <img src="<?=base_url?>uploads/images/<?=$prod->imagen?>">
            <?php else: ?>
                <img src="<?=base_url?>assets/img/camiseta.png">
            <?php endif; ?>
            <h2><?=$prod->nombre?></h2>
        </a>

        <p><?=$prod->precio?></p>
        <a href="<?=base_url?>carrito/add&id=<?=$prod->id?>" class="button">Comprar</a>
    </div>
<?php endwhile; ?>