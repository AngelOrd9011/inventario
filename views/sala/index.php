<?php
include('../components/head.component.php');
include('../components/navlog.component.php'); ?>
<main class="grey lighten-4">
  <div class="pagina">
    <div class="row">
      <div class="col m6 offset-m1">
        <h3 class="green-text text-darken-2">Sala de Internet</h3>
      </div>
    </div>

    <div class="tablaMargen">
        <div class="row">
            <div class="col m10 offset-m1">
                <table id="tablaSala" class="display cell-border " width="90%">
                    <thead>
                        <tr>
                            <th>N.Serie</th>
                            <th>Dirección IP</th>
                            <th>Tipo de entrega</th>
                            <th>Perfil</th>
                            <th>Administración</th>
                            <th>Proveedor</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped table-bordered">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</main>
<?php include('../components/footer.component.php') ?>
    <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inventario/assets/js/sala.js"></script>
  </body>
</html>
