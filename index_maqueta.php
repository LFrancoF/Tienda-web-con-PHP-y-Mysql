<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Tienda de Camisetas</title>
</head>
<body>
<div id="container">
    <!--Cabezera-->
    <header id="header">
        <div id="logo">
            <img src="assets/img/camiseta.png" alt="Camiseta logo">
                <a href="index.php">
                    TIENDA DE CAMISETAS
                </a>
        </div>
    </header>
    <!--Menu-->
    <nav id="menu">
        <ul>
            <li>
                <a href="#">
                    Inicio
                </a>
            </li>
            <li>
                <a href="#">
                    Inicio
                </a>
            </li>
            <li>
                <a href="#">
                    Inicio
                </a>
            </li>
            <li>
                <a href="#">
                    Inicio
                </a>
            </li>
        </ul>
    </nav>
    <div id="content">

        <!--Barra Lateral-->
        <aside id="lateral">
            <div id="login" class="block_aside">
                <h3>Entrar a la Web</h3>
                <form action="#" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                    <input type="submit" value="Enviar">
                </form>
                <ul>
                    <li><a href="#">Mis Pedidos</a></li>
                    <li><a href="#">Gestionar Pedidos</a></li>
                    <li><a href="#">Gestionar Categorias</a></li>
                </ul>
            </div>
        </aside>

        <!--Contenido Central-->
        <div id="central">
        <h1>Productos destacados</h1>
            <div class="product">
                <img src="assets/img/camiseta.png">
                <h2>Camiseta Azul Colgada Ancha</h2>
                <p>30 Bs.</p>
                <a href="#" class="button">Comprar</a>
            </div>
            <div class="product">
                <img src="assets/img/camiseta.png">
                <h2>Camiseta Azul Colgada Ancha</h2>
                <p>30 Bs.</p>
                <a href="#" class="button">Comprar</a>
            </div>
            <div class="product">
                <img src="assets/img/camiseta.png">
                <h2>Camiseta Azul Colgada Ancha</h2>
                <p>30 Bs.</p>
                <a href="#" class="button">Comprar</a>
            </div>
        </div>
    </div>

    <!--Footer-->
    <footer id="footer">
        <p>Desarrollado por Gustavo Franco &copy; <?=date('Y')?></p>
    </footer>
</div>
</body>
</html>