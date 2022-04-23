<?php
session_start();
include ('Config.php');

if(isset($_POST['BtnActualizar']))
{
    $id = $_GET['EditId'];
    $nombres = $_POST['nombre'];
    $apellidos = $_POST['apellido'];
    $edad = $_POST['edad'];
    $numexpediente = $_POST['expediente'];
    $telefono = $_POST['telefono'];
    $dui = $_POST['dui'];

    if($llamado -> Actualizar($id, $nombres, $apellidos, $edad, $numexpediente, $telefono, $dui))
    {
        $mensaje = "<div class='alert alert-success' role='alert'>
                        Registro Se Ha Actualizado!
                    </div>";
    }
    else
    {
        $mensaje = "<div class='alert alert-danger' role='alert'>
                        Operacion Actualizar Ha Fallado!
                    </div>";
    }
}

if (isset($_GET['EditId']))
{
    $Id = $_GET['EditId'];
    $establecer = $conn -> prepare("SELECT * FROM pacientes WHERE IdPaciente = ?");
    $establecer->execute([$Id]);
    $registro = $establecer -> fetch(PDO::FETCH_OBJ);
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
    <title>Pacientes</title>
</head>

<body>
    <div class="container"><br>
        <div class="row justify-content-center">
        <?php
            if(isset($mensaje))
            {
                echo $mensaje;
            }
            ?>
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <h3>Nuevo Paciente</h3>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" value="<?php echo $registro->Nombres;?>" class="form-control" type="text" name="nombre">
                    </div>

                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input id="apellido" value="<?php echo $registro->Apellidos;?>" class="form-control" type="text" name="apellido">
                    </div>

                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input id="edad" value="<?php echo $registro->Edad;?>" class="form-control" type="text" name="edad">
                    </div>

                    <div class="form-group">
                        <label for="expediente">Numero De Expediente:</label>
                        <input id="expediente" value="<?php echo $registro->NumExpediente;?>" class="form-control" type="text" name="expediente">
                    </div>

                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <input id="telefono" value="<?php echo $registro->Telefono;?>" class="form-control" type="text" name="telefono">
                    </div>

                    <div class="form-group">
                        <label for="dui">DUI:</label>
                        <input id="dui" value="<?php echo $registro->Dui;?>" class="form-control" type="text" name="dui">
                    </div> 

                    <br>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" name="BtnCancelar" type="submit">Cancelar</button>
                        <button class="btn btn-primary" name="BtnActualizar" type="submit">Actualizar</button>
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