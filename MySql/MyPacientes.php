<?php
class MyPacientes
{
    private $DB;

    function __construct($conn)
    {
        $this -> DB = $conn;
    }

    //Mostrar Todos Los Pacientes
    public function MostrarPacientes($consulta)
    {
        $establecer = $this -> DB -> prepare($consulta);
        $establecer -> execute() > 0;
         
        while($columna = $establecer -> fetch(PDO::FETCH_ASSOC))
        {
            ?> 
            <tr>
            <td><?php echo $columna['IdPaciente']?></td>
            <td><?php echo $columna['Nombres']?></td>
            <td><?php echo $columna['Apellidos']?></td>
            <td><?php echo $columna['Edad']?></td>
            <td><?php echo $columna['NumExpediente']?></td>
            <td><?php echo $columna['Telefono']?></td>
            <td><?php echo $columna['Dui']?></td>
            <td>
                <a href="UpdatePaciente.php?EditId=<?php echo $columna['IdPaciente']?>" class="btn btn-warning">
                    <i class="fa-solid fa-pencil"></i>
                </a>

                <a href="DeletePaciente.php?ElimId=<?php echo $columna['IdPaciente']?>" class="btn btn-danger">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            </td>
        </tr>
            
        <?php
        } 
    }

    public function Actualizar($id, $nombres, $apellidos, $edad, $numexpediente, $telefono, $dui)
    {
        try
        {
            $establecer = $this -> DB -> prepare("UPDATE pacientes SET nombres=:nombres,
            apellidos=:apellidos, edad=:edad, numexpediente=:numexpediente, telefono=:telefono,
            dui=:dui WHERE idpaciente=:idpaciente");
            $establecer->bindParam(":nombres", $nombres);
            $establecer->bindParam(":apellidos", $apellidos);
            $establecer->bindParam(":edad", $edad);
            $establecer->bindParam(":numexpediente", $numexpediente);
            $establecer->bindParam(":telefono", $telefono);
            $establecer->bindParam(":dui", $dui);
            $establecer->bindParam(":idpaciente", $id);
            $establecer->execute();

            return true;
        }
        catch(PDOException $Exc)
        {
            echo $Exc->getMessage();
            return false;
        }
    }

    public function Eliminar($id)
    {
        try
        {
            $establecer = $this -> DB -> prepare("DELETE FROM pacientes WHERE idpaciente=:idpaciente");
            $establecer->bindParam(":idpaciente", $id);
            $establecer->execute();

            return true;
        }
        catch(PDOException $Exc)
        {
            echo $Exc->getMessage();
            return false;
        }
    }
}