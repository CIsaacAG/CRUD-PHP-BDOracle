<table class="table table-bordered table-dark">
    <thead>
        <tr>
            <th>Equipo Local</th>
            <th>Equipo Visitante</th>
            <th>Estadio</th>
            <th>Horario</th>
            <th>Fecha</th>
            <th>Asiento</th>
            <th>Costo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $queryi = "SELECT * FROM boleto";
            $oracle_ejecution=oci_parse($conn,$queryi);
            
            oci_execute($oracle_ejecution);
            while(($row = oci_fetch_row($oracle_ejecution)) != false){ ?>
            <tr>
                <td><?php echo $row[1]; ?> </td>
                <td><?php echo $row[2]; ?> </td>
                <td><?php echo $row[3]; ?> </td>
                <td><?php echo $row[4];?></td>
                <td><?php echo $row[5]; ?> </td>
                <td><?php echo $row[6]; ?> </td>
                <td><?php echo $row[7];?></td>
                <td><?php if($_SESSION['tusuario']==0){ ?>
                        <a href="edit.php?id=<?php echo $row[0]; ?> " class="btn btn-warning btn-block"><i class="far fa-edit"></i></a>
                        <a onclick="borrar(<?php echo $row[0]; ?>)" " class="btn btn-danger btn-block"><i class="far fa-trash-alt"></i></a>
                    <?php }else{ echo "No eres administrador"; }?>
                </td>
            </tr>
        <?php   }?>
    </tbody>
</table>