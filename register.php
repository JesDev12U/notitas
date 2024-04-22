<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Notitas</title>
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/login.css" />
    <link rel="icon" href="./assets/img/logo.png" />
    <link rel="stylesheet" href="./css/register.css" />
</head>

<body>

    <header>
        <a href="#"><img src="./assets/img/logo.png" alt="Logo" /></a>
        <h1>Notitas</h1>
        <nav>
            <ul>
                <li><a href="./login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Registro</h1>
        <form action="register_user.php" method="post" enctype="application/x-www-form-urlencoded">
            <div class="content-form">
                <label>Nombre</label>
                <input type="text" name="name_usr" class="inputs" required />
                <br />
                <label>Apellido paterno</label>
                <input type="text" name="appat" class="inputs" required />
                <br />
                <label>Apellido materno</label>
                <input type="text" name="apmat" class="inputs" required />
                <br />
                <label>Correo electrónico</label>
                <input type="email" name="email" class="inputs" required />
                <br />
                <label>Password</label>
                <input type="password" name="passwd" class="inputs" required />
                <br />

            </div>
            <input type="submit" value="Registrar" name="send_register" />
        </form>
        <?php
        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        if ($_GET["error"] == true) {
            echo <<<HEADOC
            <script>
                alert("Error al registrar el usuario");
            </script>
            HEADOC;
        }
        if ($_GET["exists"] == true) {
            echo <<<HEADOC
            <script>
                alert("El usuario ya existe");
            </script>
            HEADOC;
        }
        ?>
    </main>
</body>

</html>