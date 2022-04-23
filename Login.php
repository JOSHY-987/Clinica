<?php
include('Config.php');
session_start();
 
if (isset($_POST['login'])) {
 
    $username = $_POST['usuario'];
    $password = $_POST['password'];
 
    $query = $conn->prepare("SELECT * FROM usuarios WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        header("location: Index.php");
            echo '<p class="error">Convinacion Incorrecta!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['Id'];
            header("location: Principal.php");
            //echo '<p class="success">Ingresaste!</p>';
        } else {
            header("location: Index.php");
            echo '<p class="error">Convinacion Incorrecta!</p>';
        }
    }
}