<?php
include('../components/head.component.php');
include('../components/navlog.component.php'); ?>
<main class="grey lighten-4">
  <div class="pagina">
    <div class="row">
      <div class="col m6 offset-m1">
        <h3 class="green-text text-darken-2">Inventario</h3>
      </div>
    </div>

    <div class="tablaMargen">
        <div class="row">
            <div class="col m10 offset-m1">
                <table class="cell-border display" id="tablaAdmin" width="100%">
                    <thead>
                        <tr>
                            <th>#Empleado</th>
                            <th>RFC corto</th>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Administración</th>
                            <th>Equipo</th>
                            <th>Administrar</th>
                            <th>IP Address</th>
                            <th>Perfil</th>
                            <th>Tipo de entrega</th>
                            <th>Proveedor</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped table-bordered botones">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
      <div id="infoEmpleado" name="infoEmpleado">

      </div>
  </div>
</main>
<?php include('../components/footer.component.php') ?>
    <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inventario/assets/js/admin.js"></script>
    <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inventario/assets/js/pdfUsuario.js"></script>
  </body>
</html>
