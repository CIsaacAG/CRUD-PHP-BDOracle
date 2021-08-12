<?php
 include("db.php");
 if(isset($_GET['id'])){
     $id = $_GET['id'];
     $query = "SELECT * FROM boleto WHERE id = $id";
     $stid=oci_parse($conn,$query);
     oci_execute($stid);
     while (oci_fetch($stid)) {
        $equipo_lp =oci_result($stid, 'EQUIPO_L');
        $equipo_vp =oci_result($stid, 'EQUIPO_V');
        $estadiop =oci_result($stid, 'ESTADIO');
        $horap =oci_result($stid, 'HORARIO');
        $fechap =oci_result($stid, 'FECHA');
        $asientop =oci_result($stid, 'ASIENTO');
        $costop =oci_result($stid, 'COSTO');
        $fechadp = date("Y-m-d", strtotime($fechap));
    }
    if(isset($_POST['edit_bol'])){
        $id = $_GET['id'];
        $equipo_le = $_POST['equipo_l'];
        $equipo_ve = $_POST['equipo_v'];
        $estadioe = $_POST['estadio'];
        $horae = $_POST['hora'];
        $fechae = $_POST['fecha'];
        $asientoe = $_POST['asiento'];
        $costoe = $_POST['costo'];
        $fechade = date("d/M/Y", strtotime($fechae));
        $queryu = "UPDATE boleto set equipo_l='$equipo_le',equipo_v='$equipo_ve',estadio='$estadioe',horario='$horae',fecha='$fechade',asiento='$asientoe',costo='$costoe' WHERE id = '$id'";
        $stid=oci_parse($conn,$queryu);
        oci_execute($stid);
        oci_free_statement($stid);
        $_SESSION['mensaje'] = "Boleto Editado";
        $_SESSION['color'] = "warning";
        header("Location: main.php");
        include('mensajes.php');
    }
 }
?>
<?php
 include("includes/header.php");
 if($_SESSION['user']==null){
     header('Location: index.php');
 }
 if(isset($_POST['salir'])){
     $_SESSION['user'] = null;
     header('Location: index.php');
 }
?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="equipo_l" class="form-control" placeholder="Equipo Local" value="<?php echo $equipo_lp; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="equipo_v" class="form-control" placeholder="Equipo Visitante" value="<?php echo $equipo_vp; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="estadio" class="form-control" placeholder="Estadio" value="<?php echo $estadiop; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="hora" class="form-control" placeholder="Horario (Ejemplo: 13:00)" value="<?php echo $horap; ?>">
                    </div>
                    <div class="form-group">
                        <input type="date" name="fecha" class="form-control" placeholder="Fecha" value="<?php echo $fechadp; ?>">
                    </div>
                    <div class="form-group">
                        <input type="number" name="asiento" class="form-control" placeholder="Asiento" value="<?php echo $asientop; ?>">
                    </div>
                    <div class="form-group">
                        <input type="number" name="costo" class="form-control" placeholder="Costo" value="<?php echo $costop; ?>">
                    </div>
                    <input type="submit" value = "Editar Usuario" name="edit_bol" class="btn btn-success btn-block">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
 include("includes/footer.php");
?>