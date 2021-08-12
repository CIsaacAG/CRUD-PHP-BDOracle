<?php
    include("db.php");
?>
<?php
    include("includes/header.php");
    if($_SESSION['user']==null){
        header('Location: index.php');
    }
    if(isset($_POST['salir'])){
        oci_free_statement($stid);
        oci_close($conn);
        header('Location: index.php');
        session_unset();
    }
?>
<script>
    function borrar(id){
        datos = "id= "+ id;
        $.ajax({
            type: "GET",
            url: "delete_user.php",
            data:datos,
            success: function(result){
                $("#tableContainer").html(result);
            }
        })
    }
</script>
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
    <a href="" class="navbar-brand">Venta de Boletos de Fútbol</a>
        <form id="out" action="" method="POST">
            <div class="navbar-brand"><?php echo $_SESSION['user']?></div>
            <input type="submit" name="salir" class="btn btn-outline-light" value="Salir"></input>
        </form>
    </div>
</nav>
<div class="container-fluid p-4">
    <div class="row">
        <div class="col-md-4 mt-4">
            <div class="card card-body">
                <form id="formMai" action="save_boleto.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="equipo_l" class="form-control" placeholder="Equipo Local">
                    </div>
                    <div class="form-group">
                        <input type="text" name="equipo_v" class="form-control" placeholder="Equipo Visitante">
                    </div>
                    <div class="form-group">
                        <input type="text" name="estadio" class="form-control" placeholder="Estadio">
                    </div>
                    <div class="form-group">
                        <input type="text" name="hora" class="form-control" placeholder="Horario (Ejemplo: 13:00)">
                    </div>
                    <div class="form-group">
                        <input type="date" name="fecha" class="form-control" placeholder="Fecha">
                    </div>
                    <div class="form-group">
                        <input type="number" name="asiento" class="form-control" placeholder="Asiento">
                    </div>
                    <div class="form-group">
                        <input type="number" name="costo" class="form-control" placeholder="Costo">
                    </div>
                    <input  type="submit" value="Crear boleto" name="guardar_bol" class="btn btn-success btn-block">
                </form>
            </div>
        </div>
        <div id="tableContainer" class="col-md-8 mt-4 table-responsive">
        <?php include('mensajes.php'); ?>
            <?php
                include('tabla.php');
            ?>
        </div>
    </div>
</div>
<?php
    include("includes/footer.php");
?>