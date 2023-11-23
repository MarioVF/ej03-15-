<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">

    <!--  Inicio sesión -->
    <?php session_start(); ?>
</head>
<body>

    <header>
        <h1>Inicar sesión</h1>
    </header>

    <main>
        <section id="formulario">
            <form action="">
                <div class="campoForm">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre">
                </div>

                <div class="campoForm">
                    <label for="pass">Contraseña: </label>
                    <input type="password" name="pass" id="pass">
                </div>

                <input type="submit" name="enviar" id="enviar" value="Iniciar sesión">
            </form>
        </section>
    </main>
    
</body>
</html>