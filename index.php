<?php
session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/img/logo.png">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Notitas</title>
    <script src="https://kit.fontawesome.com/ecae724dfb.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <a href="#"><img src="./assets/img/logo.png" alt="Logo" /></a>
        <h1>Notitas</h1>
        <nav>
            <ul>
                <?php
                echo "<li>{$_SESSION["username"]}</li>"
                ?>
                <li><a href="./close_session.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="notes-container">
            <div class="generate-note">
                <h1>Generar nota</h1>
                <form action="upload_note.php" method="post" enctype="application/x-www-form-urlencoded">
                    <label>Titulo</label>
                    <input type="text" name="title" />
                    <br>
                    <label>Contenido</label><br>
                    <textarea name="content" cols="30" rows="10" maxlength="255"></textarea><br>
                    <input type="submit" value="Subir" name="send_notita">
                </form>
            </div>
            <div class="notes">
                <?php
                include "db/connection.php";
                $stmt = $conn->prepare("SELECT titulo, notita FROM notitas WHERE id_usr=?");
                $stmt->bind_param("i", $_SESSION['id']);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo <<<HEREDOC
                            <div>
                                <h1>{$row["titulo"]}</h1>
                                <p>{$row["notita"]}</p>
                            </div>
                        HEREDOC;
                    }
                } else {
                    echo <<<HEREDOC
                        <div>
                            <h1>¡Crea tu primer nota!</h1>
                            <p>Ingresa la nota en el formulario de la izquierda</p>
                        </div>
                    HEREDOC;
                }
                ?>
            </div>
        </div>

    </main>

</body>

</html>