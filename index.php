<?php
    include("db.php");
?>
<?php
    include("includes/header.php");
    include("includes/navigation.php");
?>
<div class="container-fluid p-4">
    <div class="row justify-content-center">
        <div class="col-md-4 mt-4">
        <?php include('mensajes.php'); session_unset(); ?>
            <div class="card card-body">
                <form id="formLog" action="verify.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="usu" class="form-control" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="Contraseña">
                    </div>
                    <input  type="submit" value="Iniciar" name="log" class="btn btn-success btn-block">
                </form>
                <a href="registrar.php" class="btn btn-outline-success btn-block">Registrar Nuevo Usuario</a>
            </div>
        </div>
    </div>
</div>
<?php
include("includes/footer.php");
?>