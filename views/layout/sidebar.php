<!--Barra Lateral-->
<aside id="lateral">
    <div id="login" class="block_aside">
    <!--Mostrar menu o no, si el usuario ya esta logueado-->
        <?php if(!isset($_SESSION['identity'])):?>
            <h3>Entrar a la Web</h3>
            <form action="<?=base_url?>usuario/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email">
                <label for="password">Password</label>
                <input type="password" name="password">
                <input type="submit" value="Enviar">
            </form>
            <?php else:?>
            <h3><?='User: '.$_SESSION['identity']->nombre.' '.$_SESSION['identity']->apellidos?></h3>    
        <?php endif;?>
        <ul>
            <!--Mostrar enlaces depende del usuario-->    
            <?php if(isset($_SESSION['admin'])):?>
                <li><a href="<?=base_url?>categoria/index">Gestionar Categorias</a></li>
                <li><a href="<?=base_url?>producto/gestion">Gestionar Productos</a></li>
                <li><a href="<?=base_url?>pedido/gestion">Gestionar Pedidos</a></li>
            <?php endif;?>
            <?php if(isset($_SESSION['identity'])):?>
                <li><a href="<?=base_url?>pedido/mis_pedidos">Mis Pedidos</a></li>
                <li><a href="<?=base_url?>usuario/logout">Cerrar Sesion</a></li>
            <?php else:?>    
                <li><a href="<?=base_url?>usuario/registro">Registrate</a></li>
            <?php endif;?>
        </ul>
    </div>
    
    <!--Carrito de compra-->
    <div id="carrito" class="block_aside">
        <h3>Mi Carrito</h3>
        <ul>
            <?php $stats = Utils::statsCarrito(); ?>
            <li><a href="<?=base_url?>carrito/index">Productos (<?= $stats['count'] ?>)</a></li>
            <li><a href="<?=base_url?>carrito/index">Total: (<?= $stats['total'] ?> Bs.)</a></li>
            <li><a href="<?=base_url?>carrito/index">Ver el Carrito</a></li>
        </ul>
    </div>
</aside>

<!--Contenido Central-->
<div id="central">