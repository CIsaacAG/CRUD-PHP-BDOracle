<?php
    include("db.php");
    if(isset($_POST['guardar_bol'])){
        $equipo_l = $_POST['equipo_l'];
        $equipo_v = $_POST['equipo_v'];
        $estadio = $_POST['estadio'];
        $hora = $_POST['hora'];
        $fecha = $_POST['fecha'];
        $asiento = $_POST['asiento'];
        $costo = $_POST['costo'];
        $fechad = date("d/M/Y", strtotime($fecha));
        echo "$equipo_l, $equipo_v,$estadio,$hora,$fechad,$asiento,$costo <br>";
        if($equipo_l!=null||$equipo_v!=null||$estadio!=null||$hora!=null||$fechad!=null||$asiento!=null||$costo!=null){
            $queryi = "INSERT INTO boleto(equipo_l,equipo_v,estadio,horario,fecha,asiento,costo) VALUES('$equipo_l','$equipo_v','$estadio','$hora','$fechad','$asiento','$costo')";
            $oracle_ejecution=oci_parse($conn,$queryi);
            echo $oracle_ejecution;
            oci_execute($oracle_ejecution);
            oci_free_statement($oracle_ejecution);
            $_SESSION['mensaje'] = "Boleto Creado";
            $_SESSION['color'] = "success";
            header("Location: main.php");
            include('mensajes.php');
        }
    }
?>