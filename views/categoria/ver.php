<?php if(isset($categoria)):?>
    <h1><?=$categoria->nombre?></h1>
    <!--Mostrar productos de esta categoria seleccionada si hay-->
    <?php if($productos->num_rows == 0): ?>
        <p>No hay productos para mostrar</p>
    <?php else: ?>
        <?php while($prod = $productos->fetch_object()): ?>
            <div class="product">
                <!--La imagen y el nombre del producto seran un enlace para ver detalles-->
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
    <?php endif; ?>
<?php else: ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>