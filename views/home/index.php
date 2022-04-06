<?php session_start();
@$varsesion=$_SESSION['usu']['id'];
if($varsesion==null || $varsesion=''){
include('../components/head.component.php');
include('../components/navegation.component.php');
?>
<main class="grey lighten-4">
    <div class="container">
    <h3 class="green-text text-darken-2">Inventario</h3>
    <div class="tablaMargen">
        <div class="row">
            <div class="col m12">
                <table class="cell-border display infoCopy" id="tablaHome" width="100%">
                    <thead>
                        <tr>
                            <th>#Empleado</th>
                            <th>RFC corto</th>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Admon.</th>
                            <th>Serie Equipo</th>
                            <th>Ver mas</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-striped table-bordered">

                    </tbody>
                </table>
            </div>
        </div>
        <div id="infoEmpleado" name="infoEmpleado" class="infoCopy">

        </div>
    </div>
    </div>
</main>
<?php include('../components/footer.component.php');
}
else {
header('location:../admin/');
} ?>
    <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inventario/assets/js/home.js"></script>
    </body>
</html>
