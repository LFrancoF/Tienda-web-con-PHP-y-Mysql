<?php if(isset($_SESSION['identity'])): ?>

    <h1>Hacer pedido</h1>
    <p> <a href="<?=base_url?>carrito/index">Ver Productos y precio del pedido</a> </p>
    <br>
    
    <h3>Direccion para el envio</h3>
    <form action="<?=base_url?>pedido/add" method="post">
        <label for="departamento">Departamento</label>
        <input type="text" name="departamento" required>

        <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad" required>

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" required>

        <input type="submit" value="Confirmar Pedido">

    </form>

<?php else: ?>
    <h1>No estas logueado</h1>
    <p>Necesitas ingresar a la web para hacer tu pedido</p>
    
<?php endif; ?>