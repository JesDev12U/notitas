<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Notitas</title>
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/login.css" />
    <link rel="icon" href="./assets/img/logo.png" />
</head>

<body>
    <header>
        <a href="#"><img src="./assets/img/logo.png" alt="Logo" /></a>
        <h1>Notitas</h1>
        <nav>
            <ul>
                <li><a href="./register.php">Registro</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Inicio de sesión</h1>
        <form action="check_login.php" method="post" enctype="application/x-www-form-urlencoded">
            <label>Correo electrónico</label>
            <br />
            <input type="email" name="email" />
            <br />
            <label>Password</label>
            <br />
            <input type="password" name="passwd" />
            <br />
            <input type="submit" value="Entrar" name="send_login" />
        </form>
    </main>
</body>

</html>