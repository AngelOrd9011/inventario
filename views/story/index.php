<?php
include('../components/head.component.php');
include('../components/navlog.component.php'); ?>
<main class="grey lighten-4">
  <div class="pagina">
    <div class="row">
      <div class="col m10 offset-m1">
        <h3 class="green-text text-darken-2">Historial</h3>
      </div>
    </div>
    <div class="row">
      <div class="col m10 offset-m1">
        <button id="limpiar" class="waves-effect waves-light btn green darken-2 modal-trigger hoverable limpiar">Limpiar historial<i class="material-icons right">clear</i></button>
      </div>
    </div>
    <div class="row tablaMargen">
      <div class="col m10 offset-m1">
        <table id="tablaHistorial" class="display cell-border" width="100%">
          <thead>
            <tr>
              <th>Fecha y hora</th>
              <th>RFC corto</th>
              <th>Nombre</th>
              <th>Equipo</th>
              <th>Nuevo equipo</th>
              <th>Evento</th>
            </tr>
          </thead>
          <tbody class="table-striped table-bordered">

          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
<?php include('../components/footer.component.php') ?>
    <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inventario/assets/js/story.js"></script>
  </body>
</html>
