<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
    <title>Tienda Shop Online</title>
</head>
<body>
<div id="container">
    <!--Cabezera-->
    <header id="header">
        <div id="logo">
            <img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta logo">
                <a href="<?=base_url?>">
                    TIENDA SHOP ONLINE
                </a>
        </div>
    </header>
    <!--Menu-->
    <?php $categorias = Utils::showCategorias(); ?>
    <nav id="menu">
        <ul>
            <li>
                <a href="<?=base_url?>">
                    Inicio
                </a>
            </li>
            <?php while($cat = $categorias->fetch_object()): ?>
                <li>
                    <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>">
                        <?= $cat->nombre ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    </nav>
    <div id="content">