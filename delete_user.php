<?php
    include("db.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $queryde = "DELETE FROM boleto WHERE id = $id";
        $stid=oci_parse($conn,$queryde);
        oci_execute($stid);
        oci_free_statement($stid);
        $_SESSION['mensaje'] = "Boleto Eliminado";
        $_SESSION['color'] = "danger";
        include('mensajes.php');
        include('tabla.php');
    }else{
        echo "id incorrecto";
    }
?>



