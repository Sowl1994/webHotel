
  <!-- banner principal -->
  <div id="index-banner" class="parallax-container imgPrincipal">
    <div class="section no-pad-bot">
    </div>
    <div class="parallax"><img class='filtro-slider carro-principal' src="./images/carrousel_wall.jpg" alt="Unsplashed background img 1"></div>
  </div>



  <div class="container">
    <div class="section">
      <div class="row" id='reservaRow'>
          <form action="?secc=mireserva" method="POST">
              <div class="input-field col s12 l3">
                <i class="material-icons prefix">today</i>
                <input id="FechaEntrada" type="date" name="fechaInicio" class="datepicker c-align">
                <label for="FechaEntrada">Fecha entrada</label>
              </div>
              <div class="input-field col s12 l3">
                <i class="material-icons prefix">today</i>
                <input id="FechaSalida" type="date" name="fechaFin" class="datepicker c-align">
                <label for="FechaSalida">Fecha salida</label>
              </div>
              <div class="input-field col s12 l2">
                <i class="material-icons prefix">supervisor_account</i>
                <input id="npersonas" type="number" name="nPersonas" class="c-align">
                <label for="npersonas">Nº Personas</label>
              </div>
              <div id='reservarButton' class="input-field col s12 l4 center">
                <button class="btn waves-effect waves-light" type="submit" name="action">Reservar
                  <i class="material-icons right">send</i>
                </button>
              </div>
          </form>
      </div>
    </div>
  </div>
<!-- FIN banner principal-->
<div id='main-container'>
<!-- CONTENIDO PRINCIPAL-->
  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4><?php echo $nombre ?></h4>
          <p style=' text-align: justify;' class="left-align light"><?php echo $descripcion ?></p>
        </div>
      </div>

    </div>
  </div>


    <div class='row' id='Habitaciones'>

       <div class="col s12 l10 offset-l1 showHabs">
         <div class='showHabs' > <a href="index.php?secc=habs&tipo=1" ><img id='imagenH' src="./images/habitacion_twin2.jpg"></a></div>
         <div class='showHabs' >  <a href="index.php?secc=habs&tipo=2"><img id='imagenH' src="./images/habitacion_twin.jpg"></a></div>
         <div class='showHabs' >  <a href="index.php?secc=habs&tipo=3"><img  id='imagenH' src="./images/habitacion_suite.jpg"></a></div>
        </div>
    </div>


    <div class='espacio'>
    </div>
</div>
<!-- fin contenido principal -->
