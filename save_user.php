<?php
    include("db.php");
    if(isset($_POST['guardar'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $usuario = $_POST['n_usuario'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        
        if($nombre!=null||$apellido!=null||$correo!=null||$usuario!=null||$password!=null){
            if($password==$c_password){
                $plaintext_password = $password;
                $hash = password_hash($plaintext_password, 
                PASSWORD_DEFAULT);
                $queryi = "INSERT INTO usuario(nombre,apellido,correo,nusuario,contrasena,tusuario) VALUES('$nombre','$apellido','$correo','$usuario','$hash', 1)";
                $oracle_ejecution=oci_parse($conn,$queryi);

                oci_execute($oracle_ejecution);
                oci_free_statement($oracle_ejecution);
                oci_close($conn);
                $_SESSION['mensaje'] = "Usuario Creado";
                $_SESSION['color'] = "success";
                header("Location: index.php");
                include('mensajes.php');
            }
        }
    }
?>