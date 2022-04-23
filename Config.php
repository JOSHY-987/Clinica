<?php
define('USER', 'root');
define('PASSWORD', '');
define('HOST', '');
define('DATABASE', 'clinica');
try {
    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    die('Error : ' . $e->getMessage());
}

include_once ('MySql/MyPacientes.php');
$llamado = new MyPacientes($conn);
?>