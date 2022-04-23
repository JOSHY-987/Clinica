<?php
session_start();
include('Config.php');

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
    <title>Clientes</title>
</head>

<body>
    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <h3>Nuevo Paciente</h3>
                <hr>
                <form method="post" action="AddPaciente.php">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" class="form-control" type="text" name="nombre">
                    </div>

                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input id="apellido" class="form-control" type="text" name="apellido">
                    </div>

                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input id="edad" class="form-control" type="text" name="edad">
                    </div>

                    <div class="form-group">
                        <label for="expediente">Numero De Expediente:</label>
                        <input id="expediente" class="form-control" type="text" name="expediente">
                    </div>

                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <input id="telefono" class="form-control" type="text" name="telefono">
                    </div>

                    <div class="form-group">
                        <label for="dui">DUI:</label>
                        <input id="dui" class="form-control" type="text" name="dui">
                    </div> 

                    <br>

                    <div class="d-grid gap-1 col-6 mx-auto">
                        <button class="btn btn-primary" name="addpaciente" type="submit">Guardar</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>