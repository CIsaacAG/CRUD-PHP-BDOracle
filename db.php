<?php
 session_start();

 $conn = oci_connect("system","123","localhost");
    if(isset($conn)){
        echo "<script> console.log('Conectado con OCI'); </script>";
    }else{
        $error = oci_error();
        echo "<script> console.log('$error'); </script>";
        exit;
    }
?>