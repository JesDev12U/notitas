<?php
if (isset($_POST["send_login"])) {
    include "./db/connection.php";
    $stmt = $conn->prepare("SELECT * FROM users WHERE correo=?");
    $stmt->bind_param("s", $_POST["email"]);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = "{$row["nom"]} {$row["ap_pat"]} {$row["ap_mat"]}";
        $id = $row["id"];
        $passwd = $row["passwd"];
    } else $passwd = "";

    if (password_verify($_POST["passwd"], $passwd)) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $name;
        $_SESSION['id'] = $id;
        header("Location: index.php");
    } else echo "Error de credenciales";
}
