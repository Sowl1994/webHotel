  <!-- NAV -->
  <body>
    <nav class="white" role="navigation">
              <a id="logo-container" href="index.php" class="brand-logo"><img class='logo-principal' alt='Hotel Plaza Nueva' src="./images/logo-esp-gray.png"></a>
        <!-- LOGIN -->
         <ul class="right hide-on-med-and-down">
          <li><a  class="dropdown-button" href="#!" data-activates="loginDesplegable"><i class="material-icons right">supervisor_account</i>Acceder</a></li>
          <ul id="loginDesplegable" class="dropdown-content">
                <li><a class="modal-trigger center" href="#modal-login">Acceder</a></li>
                <li><a class="modal-trigger center" href="#modal-registro">Registro</a></li>
              </ul>
        </ul>
        <!-- FIN LOGIN -->
      <div class="nav-wrapper container ">
        <ul class="right hide-on-med-and-down" style='padding-right: 100px;'>
         <li><a href="index.php">Hotel</a></li>
         <li><a href="index.php?secc=promo">Promociones</a></li>
         <li><a href="index.php?secc=actividades">Actividades</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="habsDesplegable">Habitaciones</a></li>
              <ul id="habsDesplegable" class="dropdown-content">
                <li><a href="index.php?secc=habs&tipo=1">Habitacion Doble</a></li>
                <li><a href="index.php?secc=habs&tipo=2">Habitacion Triple</a></li>
                <li><a href="index.php?secc=habs&tipo=3">Habitacion Doble Superior</a></li>
              </ul>

        <li><a href="index.php?secc=fotos">Fotos</a></li>
        <li><a href="index.php?secc=contacto">Contacto y mapa</a></li>
       <!-- <li><a href="index.php?secc=opiniones">Opiniones</a></li>-->
        <li><a href="index.php?secc=mireserva">Mi reserva</a></li>
        </ul>
        <!-- NAV MOBIL-->
          <ul id="nav-mobile" class="side-nav">
            <li><a href="#">Navbar Link</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <!-- FIN NAV MOBIL -->
      </div>

    </nav>
  <!-- FIN NAV -->

   <!-- Modal Login -->
  <div id="modal-login" class="modal modal-fixed-footer modal-login">
    <div class="modal-login-text">
                <form class="col s12">
                    <div class="input-field col s12">
                      <input placeholder='Introduce Nombre de usuario' id="UnUsuario" type="text" class="validate">
                      <label for="UnUsuario">Usuario</label>
                    </div>
                    <div class="input-field col s12">
                      <input placeholder='Introduce contraseña' id="Upassword" type="password" class="validate">
                      <label for="Upassword">Contraseña</label>
                    </div>
                </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Acceder</a>
    </div>
  </div>
  <!-- FIN modal login -->


   <!-- Modal registro -->
    <div id="modal-registro" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5 class='center' style='margin-top: -10px; padding-bottom: 10px;'>Formulario Registro</h5>
      <div class="row">
      <form class="col s12">

        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Escriba su nombre" id="first_name" type="text" class="validate">
          <label for="first_name">Nombre de Usuario</label>
        </div>
        <div class="input-field col s6">
          <input placeholder='Escriba su Email' id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>

        <div class="row">
        <div class="input-field col s6">
          <input placeholder='Escriba su contraseña' id="password" type="password" class="validate">
          <label for="password">Contraseña</label>
        </div>
          <div class="input-field col s6">
          <input placeholder='Confirme su contraseña' id="password" type="password" class="validate">
          <label for="password">Confirmar Contraseña</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Escriba su nombre" id="first_name" type="text" class="validate">
          <label for="first_name">Nombre</label>
        </div>
        <div class="input-field col s6">
          <input  placeholder="Escriba sus Apellidos" id="last_name" type="text" class="validate">
          <label for="last_name">Apellidos</label>
        </div>
      </div>



       <div class="input-field col s6">
          <input placeholder="Escriba su telefono" id="first_name" type="text" class="validate">
          <label for="first_name">Telefono</label>
        </div>
        <div class="input-field col s6">
          <input placeholder='Escriba su DNI' id="last_name" type="text" class="validate">
          <label for="last_name">DNI</label>
        </div>
    </form>
    </div>

  </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn ">Confirmar</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-red red btn " style='margin-right:10px;'>Cancelar</a>

    </div>
  </div>
 <!-- FIN modal regitro -->


 <script type="text/javascript">

  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
  </script>