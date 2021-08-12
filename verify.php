<?php
    include("db.php");
    if(isset($_POST['log'])){
        $usuario = $_POST['usu'];
        $password = $_POST['pass'];
        $derror = "";
        $success = "";
        $plaintext_password = $password;
        
        $query = "select * from usuario where NUSUARIO='$usuario'";
        $stid=oci_parse($conn,$query);
        oci_execute($stid);
        
        while (oci_fetch($stid)) {
            $tusu=oci_result($stid, 'TUSUARIO');
            $hash =oci_result($stid, 'CONTRASENA');
        }
        $verify = password_verify($plaintext_password, $hash);
        oci_free_statement($stid);
        oci_close($conn);
        
        if($verify){
            $_SESSION['user'] = $usuario;
            $_SESSION['tusuario'] = $tusu;
            header('Location: main.php');
            die;
            echo "contrasena correcta";
        }else{
            $_SESSION['mensaje'] = "Contraseña Incorrecta";
            $_SESSION['color'] = "danger";
            header("Location: index.php");
            include('mensajes.php');
        }
    }
?>