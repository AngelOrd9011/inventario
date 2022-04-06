<?php
include('../components/head.component.php');
include('../components/navlog.component.php'); ?>
<main class="grey lighten-4">
    <div class="pagina">
        <div class="row">
            <div class="col m6 offset-m1">
                <h3 class="green-text text-darken-2">Equipos</h3>
            </div>
        </div>
        <div class="row">
            <div class="botones col m6 offset-m1">
                <a
                    class="waves-effect waves-light btn green darken-2 modal-trigger hoverable"
                    href="#modalEquipos">Agregar equipo<i class="material-icons right">add</i>
                </a>
                <a
                    class="waves-effect waves-light btn green darken-2 modal-trigger hoverable"
                    href="#modalProveedores">Agregar proveedor<i class="material-icons right">add</i>
                </a>
            </div>
        </div>
        <div class="tablaMargen">
            <div class="row">
                <div class="col m6 offset-m1">
                    <table
                        class="cell-border display centered infoPaste"
                        id="tablaEquipos"
                        width="90%">
                        <thead>
                            <tr>
                                <th>No. Serie</th>
                                <th>Proveedor</th>
                                <th>Administrar</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped table-bordered botones"></tbody>
                    </table>
                </div>
                <div class="col m3 offset-m1">
                    <h5 class="green-text text-darken-2">Proveedores:</h5>
                    <ul id="listaProveedores" name="listaProveedores" class="collapsible"></ul>
                </div>
            </div>
        </div>
        <div class="row">
            <form id="formAgregar" method="POST">
                <div id="modalEquipos" class="modal equiposModal">
                    <div class="modal-content">
                        <h5>Agregar equipo</h5>
                        <div class="row">
                            <div class="input-field col s12 green-text text-darken-2">
                                <input
                                    id="equipo"
                                    name="equipo"
                                    type="text"
                                    class="validate validaAlfanumerico infoPaste"
                                    onkeyup="capital(this)"
                                    maxlength="15"
                                    autocomplete="off">
                                <label for="equipo">No. Serie del equipo</label>
                            </div>
                            <div class="input-field col s12 green-text text-darken-2">
                                <select id="proveedor" name="proveedor"></select>
                                <label>Proveedores</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer flexbox">
                        <button
                            type="button"
                            name="Cancelar"
                            class="modal-close green darken-2 white-text btn">Cancelar</button>
                        <button
                            type="button"
                            name="AgregarEquipo"
                            class="green darken-2 white-text btn agregarEquipo">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <form id="formAgregar2" method="POST">
                <div id="modalProveedores" class="modal equiposModal">
                    <div class="modal-content">
                        <h5>Agregar proveedor</h5>
                        <div class="row">
                            <div class="input-field col s12 green-text text-darken-2">
                                <input
                                    id="proveedorAdd"
                                    name="proveedorAdd"
                                    type="text"
                                    class="validate validaAlfanumerico infoPaste"
                                    maxlength="15"
                                    autocomplete="off">
                                <label for="proveedorAdd">Nuevo proveedor</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer flexbox">
                        <button
                            type="button"
                            name="Cancelar"
                            class="modal-close green darken-2 white-text btn">Cancelar</button>
                        <button
                            type="button"
                            name="AgregarProveedor"
                            class="green darken-2 white-text btn agregarProveedor">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include('../components/footer.component.php'); ?>
<script
    type="text/javascript"
    src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inventario/assets/js/equipos.js"></script>
</body>
</html>