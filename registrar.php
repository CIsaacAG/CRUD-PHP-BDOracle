<?php
    include("db.php");
?>
<?php
    include("includes/header.php");
    include("includes/navigation.php");
?>
<div class="container-fluid p-4">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-4">
            <div class="card card-body">
                <form id="formUsr" action="save_user.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido">
                    </div>
                    <div class="form-group">
                        <input type="text" name="correo" class="form-control" placeholder="Correo">
                    </div>
                    <div class="form-group">
                        <input type="text" name="n_usuario" class="form-control" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <input type="password" name="c_password" class="form-control" placeholder="Confirmar Contraseña">
                    </div>
                    <input type="submit" value="Guardar" name="guardar" class="btn btn-success btn-block">
                </form>
                <a href="index.php" class="btn btn-outline-success btn-block">Regresar</a>
            </div>
        </div>
    </div>
</div>
<?php
include("includes/footer.php");
?>