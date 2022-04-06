<header>
  <div class="navbar-fixed">
    <nav class="nav grey lighten-2">
      <div class="container">
        <form id="login-form" class="infoCopyPaste" method="post">
          <div class="nav-wrapper">
            <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inventario/views/home">
              <img class="responsive-img imagen_logo" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inventario/assets/images/Logo_HACIENDA_SAT.png">
            </a>
              <ul class="right grey-text text-darken-3">
                <div class="row">
                <li>
                  <div class="input-field col m10 s4 green-text text-darken-2">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="name" name="name" type="text" class="validate validaAlfanumerico" maxlength="10" required autocomplete="off">
                    <label for="name">Administrador</label>
                  </div>
                </li>
                <li>
                  <div class="input-field col m10 s4 green-text text-darken-2">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" name="password" type="password" class="validate validaAlfanumerico" maxlength="10" required>
                    <label for="password">Contraseña</label>
                  </div>
                </li>
                <li>
                  <button id="enviar" name="enviar" class="green darken-2 white-text btn hoverable">Entrar</button>
                </li>
                </div>
              </ul>
          </div>
        </form>
      </div>
    </nav>
  </div>
</header>
