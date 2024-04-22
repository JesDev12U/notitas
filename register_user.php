<?php
if (isset($_POST["send_register"])) {
    include "./db/connection.php";

    //Verificar si existe el usuario
    function exists()
    {
        include "./db/connection.php";
        $stmt = $conn->prepare("SELECT * FROM users WHERE correo= ?");
        $stmt->bind_param("s", $_POST["email"]);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) return true;
        else return false;
    }

    if (!exists()) {
        $stmt = $conn->prepare("INSERT INTO users VALUES (DEFAULT, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "sssss",
            $_POST["name_usr"],
            $_POST["appat"],
            $_POST["apmat"],
            $_POST["email"],
            password_hash($_POST["passwd"], PASSWORD_DEFAULT)
        );
        $stmt->execute();

        if ($conn->affected_rows > 0) header("Location: login.php");
        else header("Location: register.php?error=true");
    } else {
        header("Location: register.php?exists=true");
    }
}
