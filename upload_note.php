<?php

session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
}


if (isset($_POST["send_notita"])) {
    include "db/connection.php";
    $stmt = $conn->prepare("INSERT INTO notitas VALUES (DEFAULT, ?, ?, ?)");
    $stmt->bind_param("ssi", $_POST["title"], $_POST["content"], $_SESSION["id"]);
    $stmt->execute();

    if ($conn->affected_rows === 0) {
        echo <<<HEADOC
            <script>
                alert("No se pudo guardar la notita :(");
            </script>
        HEADOC;
    }
    header("Location: index.php");
}
