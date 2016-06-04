  <?php 
  function getHabitaciones(){
      $habitaciones = "SELECT id,nombre from habitacion";
      $mbd=Conexion::conexionBD();
      foreach($mbd->query($habitaciones) as $row){
          echo "<li><a href='index.php?secc=habs&tipo=".$row['id']."'>"./*ucfirst(strtolower(*/$row['nombre']/*))*/."</a></li>";
      }
      
  }?>

  <!-- NAV -->
  <body>
    <nav class="white" role="navigation">
              <a id="logo-container" href="index.php" class="brand-logo"><img class='logo-principal' alt='Hotel Plaza Nueva' src="./images/logo-esp-gray.png"></a>
        <!-- LOGIN -->
         <ul class="right hide-on-med-and-down">
         <?php if(isset($_SESSION['session_username'])){?>
         <li><a  class="dropdown-button" href="#!" data-activates="loginDesplegable">
         <?php if($_SESSION['isAdmin'] == 1){?>
         <i class="material-icons right">account_circle</i>
          <?php }else{?>
         <i class="material-icons right">perm_identity</i>
         <?php }?>
         Bienvenido, <?php echo $_SESSION['session_username'];?></a></li>
          <ul id="loginDesplegable" class="dropdown-content">
              <li><a class="center" href="./Usuarios/usuario_controller.php?lo">Logout</a></li>
          </ul>
         <?php }else{?>
          <li><a  class="dropdown-button" href="#!" data-activates="loginDesplegable"><i class="material-icons right">supervisor_account</i>Acceder</a></li>
          <ul id="loginDesplegable" class="dropdown-content">
              <li><a class="modal-trigger center" href="#modal-login">Acceder</a></li>
              <li><a class="modal-trigger center" href="#modal-registro">Registro</a></li>
          </ul>
          <?php }?>
        </ul>
        <!-- FIN LOGIN -->
      <div class="nav-wrapper container ">
        <ul class="right hide-on-med-and-down" style='padding-right: 100px;'>
         <li><a href="index.php">Hotel</a></li>
         <li><a href="index.php?secc=promo">Promociones</a></li>
         <li><a href="index.php?secc=actividades">Actividades</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="habsDesplegable">Habitaciones</a></li>
              <ul id="habsDesplegable" class="dropdown-content">

                <!--<li><a href="index.php?secc=habs&tipo=1">Habitacion Doble</a></li>
                <li><a href="index.php?secc=habs&tipo=2">Habitacion Triple</a></li>
                <li><a href="index.php?secc=habs&tipo=3">Habitacion Doble Superior</a></li>-->
                <?php getHabitaciones();?>
              </ul>

        <li><a href="index.php?secc=fotos">Fotos</a></li>
        <li><a href="index.php?secc=contacto">Contacto y mapa</a></li>
       <!-- <li><a href="index.php?secc=opiniones">Opiniones</a></li>-->
        <!-- prueba gestion de reservas-->
          <li>
            <form method='GET'>
            <div class='input_container'>
                  <input type="text" id="country_id" name='keyword' autocomplete="off" onkeyup="autocomplet()">
                  <ul id="country_list_id"></ul>
            </div>
            </form>
          </li>
        <!-- fin gestion de reservas -->


        </ul>
        <!-- NAV MOBIL-->
          <ul id="nav-mobile" class="side-nav">
          <?php if(isset($_SESSION['session_username'])){?>
                 <li><a  class="dropdown-button" href="#!" data-activates="loginDesplegable-movil"><i class="material-icons right">perm_identity</i>Bienvenido, <?php echo $_SESSION['session_username'];?></a></li>
                <ul id="loginDesplegable-movil" class="dropdown-content">
                <li><a class="center" href="./Usuarios/usuario_controller.php?lo">Logout</a></li>
              </ul>
          <?php }else{?>
          <li><a  class="dropdown-button" href="#!" data-activates="loginDesplegable-movil"><i class="material-icons right">supervisor_account</i>Acceder</a></li>
          <ul id="loginDesplegable-movil" class="dropdown-content">
                <li><a class="modal-trigger center" href="#modal-login">Acceder</a></li>
                <li><a class="modal-trigger center" href="#modal-registro">Registro</a></li>
              </ul>
          <?php }?>   
              <li><a href="index.php">Hotel</a></li>
              <li><a href="index.php?secc=promo">Promociones</a></li>
              <li><a href="index.php?secc=actividades">Actividades</a></li>
              <li><a class="dropdown-button" href="#!" data-activates="habsDesplegable-movil">Habitaciones</a></li>
                <ul id="habsDesplegable-movil" class="dropdown-content">
                  <li><a href="index.php?secc=habs&tipo=1">Habitacion Doble</a></li>
                  <li><a href="index.php?secc=habs&tipo=2">Habitacion Triple</a></li>
                  <li><a href="index.php?secc=habs&tipo=3">Habitacion Doble Superior</a></li>
                </ul>
              <li><a href="index.php?secc=fotos">Fotos</a></li>
              <li><a href="index.php?secc=contacto">Contacto y mapa</a></li>

          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <!-- FIN NAV MOBIL -->


      </div>

    </nav>
  <!-- FIN NAV -->
 <!-- modal regitro -->

    <div id="modal-registro" class="modal modal-fixed-footer" style='height: 52%;'>
    <div class="modal-content">
      <div class="row">
      <form action="./Usuarios/usuario_controller.php" method="POST" id="formRegistro" class="col  s12 l12">

        <div class="row">
        <div class="input-field col  s12 l6">
          <input placeholder="Escriba su nombre" name="nick" id="first_name" type="text" class="validate">
          <label for="first_name">Nombre de Usuario</label>
        </div>
        <div class="input-field  col  s12 l6">
          <input placeholder='Escriba su Email' name="email" id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>

        <div class="row">
        <div class="input-field col  s12 l6">
          <input placeholder='Escriba su contraseña' name="pass" id="password" type="password" class="validate">
          <label for="password">Contraseña</label>
        </div>
          <div class="input-field col  s12 l6">
          <input placeholder='Confirme su contraseña' id="password" type="password" class="validate">
          <label for="password">Confirmar Contraseña</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col  s12 l6">
          <input placeholder="Escriba su nombre" name="first_name" id="first_name" type="text" class="validate">
          <label for="first_name">Nombre</label>
        </div>
        <div class="input-field col  s12 l6">
          <input  placeholder="Escriba sus Apellidos" name="last_name" id="last_name" type="text" class="validate">
          <label for="last_name">Apellidos</label>
        </div>
      </div>



       <div class="input-field col  s12 l6">
          <input placeholder="Escriba su telefono" name="tel" id="first_name" type="text" class="validate">
          <label for="first_name">Telefono</label>
        </div>
        <div class="input-field col  s12 l6">
          <input placeholder='Escriba su DNI' name="dni" id="last_name" type="text" class="validate">
          <label for="last_name">DNI</label>
        </div>
    </form>
    </div>

  </div>
    <div class="modal-footer" style='height: 36px;'>
    <div class='row nof'>
       <div class=" col s6 l6 " style="padding:0;">
         <a href="#!" class="modal-action modal-close waves-effect waves-red  acceder sinmar" style='background-color: #AF4141'>Cancelar</a>

       </div>
       <div class="col s6 l6 " style="padding:0;">
          <a onclick="document.getElementById('formRegistro').submit()" class="modal-action modal-close waves-effect waves-green  acceder sinmar">Registrarse</a>
       </div>
    </div>
     
    </div>
  </div>


<!--fin modal registro-->
<!--modal login-->
   <div id="modal-login" class="modal modal-fixed-footer modal-login ">

    <div class="modal-login-text">
      <form action="./Usuarios/usuario_controller.php" method="POST" class="col s12" id="formLogin">
          <div class="input-field col s12">
            <input id="UnUsuario" name="loginNick" type="text" class="validate">
            <label for="UnUsuario">Usuario</label>
          </div>
          <div class="input-field col s12">
            <input id="Upassword"  name="loginPass" type="password" class="validate">
            <label for="Upassword">Contraseña</label>
          </div>
      </form>
    </div>
    <div class="modal-footer">
      <a onclick="document.getElementById('formLogin').submit()" class="modal-action modal-close waves-effect waves-green  acceder sinmar">Entrar</a>
    </div>
 </div>
<!--fin modal login-->
 <script type="text/javascript">

  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();

  });
  </script>