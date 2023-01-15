<?php if(isset($prod)):?>
    <h1><?=$prod->nombre?></h1>
    <div id="detail-product">

        <div class="image">
            <?php if($prod->imagen!=null): ?>
                <img src="<?=base_url?>uploads/images/<?=$prod->imagen?>">
            <?php else: ?>
                <img src="<?=base_url?>assets/img/camiseta.png">
            <?php endif; ?>
        </div>

        <div class="data">
            <p><?=$prod->descripcion?></p>
            <p><?=$prod->precio?> Bs</p>
            <a href="<?=base_url?>carrito/add&id=<?=$prod->id?>" class="button">Comprar</a>
        </div>

    </div>

<?php else: ?>
    <h1>El Producto no existe</h1>
<?php endif; ?>