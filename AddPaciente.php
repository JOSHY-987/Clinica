<?php
include('Config.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: Index.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <?php require_once "Partes/Menu.php"; ?>
    <title>Nuevo Paciente</title>
</head>

<body>
    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-8 p-5 bg-white shadow-lg rounded">
                <?php
                if (isset($_POST['addpaciente'])) {

                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $edad = $_POST['edad'];
                    $numexpediente = $_POST['expediente'];
                    $telefono = $_POST['telefono'];
                    $dui = $_POST['dui'];

                        $query = $conn->prepare("INSERT INTO pacientes (Nombres, Apellidos, Edad, NumExpediente, Telefono, Dui) 
                        VALUES (:nombre, :apellido, :edad, :numexpediente, :telefono, :dui)");
                        $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
                        $query->bindParam("apellido", $apellido, PDO::PARAM_STR);
                        $query->bindParam("edad", $edad, PDO::PARAM_STR);
                        $query->bindParam("numexpediente", $numexpediente, PDO::PARAM_STR);
                        $query->bindParam("telefono", $telefono, PDO::PARAM_STR);
                        $query->bindParam("dui", $dui, PDO::PARAM_STR);
                        $result = $query->execute();

                        if ($result) 
                        {
                            echo '<div class="alert alert-success" role="alert">Tu registro fue exitoso!</div>';
                        } 
                        else 
                        {
                            echo '<div class="alert alert-danger" role="alert">¡Algo salió mal!</div>';
                        }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>