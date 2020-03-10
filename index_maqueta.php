<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Document</title>
</head>

<body>

    <div id="container">
        <!---------- CABEZERA---------->
        <header id="header">

            <div id="logo">
                <img src="assets/img/camiseta.png" alt="camiseta">
                <a href="index.php">
                    Tienda de Camiseta
                </a>
            </div>
        </header>

        <!---------- MENU ---------->

        <nav id="menu">
            <ul>
                <li><a href="#"> Inicio</a></li>
                <li><a href="#"> Categoria 1</a></li>
                <li><a href="#"> Categoria 1</a></li>
                <li><a href="#"> Categoria 1</a></li>
                <li><a href="#"> Categoria 1</a></li>
                <li><a href="#"> Categoria 1</a></li>
            </ul>
        </nav>


        <div id="content">
            <!---------- BARRA LATERAL ---------->
            <aside id="lateral">

                <div id="login" class="block_aside">

                <h3>Entrar al Sitio Web</h3>
                    <form action="#" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                        <label for="password">Password</label>
                        <input type="password" name="password">
                        <input type="submit" value="Entrar" class="button">
                    </form>
                    <ul>
                        <li><a href="#">Mis Pedididos</a></li>
                        <li><a href="#">Gestionar Mis Pedidos</a></li>
                        <li><a href="#">Gestionar Categoria</a></li>
                    </ul>
                   

                </div>

            </aside>

            <!---------- CONTENIDO CENTRAL ---------->
            <div id="central">
                <h1>Productos Destacados</h1>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="camiseta">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 euros</p>
                    <a href="#" class="button" >Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="camiseta">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 euros</p>
                    <a href="#" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="camiseta">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 euros</p>
                    <a href="#" class="button">Comprar</a>
                </div>

            </div>

        </div>

        <!---------- FOOTER ---------->
        <footer id="footer">
            <p>Desarrollado Por Anthony Perez &copy;<?= date('Y') ?></p>
        </footer>
    </div>
</body>

</html>