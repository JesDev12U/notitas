<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notitas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) die("Conexion fallida: " . $conn->connect_error);
