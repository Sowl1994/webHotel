
<div class='content'>
<div class='row'>
<div class="col l8 offset-l2 card" style='margin-top: 50px;'>
	<br>
		<div class='row'> <!-- progreso indicadores -->
			<div class=' col l8 offset-l2  proces-row center row-icon-procg'>
				<a href="#" class='row-icon-proc select-proc'><i class='fa fa-check-circle-o icon-proceso'></i><div class='labe-proceso'>Fechas</div></a>
				<a href="#" class='row-icon-proc'><i class="fa fa-bed icon-proceso" aria-hidden="true"></i></i><div class='labe-proceso'>Habitaciones</div></a>
				<a href="#" class='row-icon-proc'><i class="fa fa-users icon-proceso" aria-hidden="true"></i><div class='labe-proceso'>Datos Cliente Y pago</div></a>
        <!--<a href="#" class='row-icon-proc'><i class="fa fa-credit-card-alt icon-proceso" aria-hidden="true"></i><div class='labe-proceso'>Pago</div></a>-->
        </div>
		</div><!-- fin progreso indicadores -->


    <script>
      function validateForm() {
        var ini = document.forms["formu"]["fechaInicio"].value;
        var fin = document.forms["formu"]["fechaFin"].value;
        if (ini == null || ini == "" || fin == null || fin == "") {
            alert("Falta alguna fecha por poner");
            return false;
        }
    }
    </script>

		<div class='row'><!-- calendario -->
			<div class='input-field col l10 offset-l1'>
			<form action="?secc=mireserva" name="formu" onsubmit="return validateForm()" method="POST">
              <div class="input-field col s12 l3">
                <i class="material-icons prefix">today</i>
                <input id="FechaEntrada" type="date" name="fechaInicio" class="datepicker c-align" required>
                <label for="FechaEntrada">Fecha entrada</label>
              </div>
              <div class="input-field col s12 l3">
                <i class="material-icons prefix">today</i>
                <input id="FechaSalida" type="date" name="fechaFin" class="datepicker c-align" required>
               <label for="FechaSalida">Fecha salida</label>
              </div>
              <div class="input-field col s12 l3">
                <i class="material-icons prefix">supervisor_account</i>
                <input id="npersonas" type="number" name="nPersonas" class="c-align" required>
                <label for="npersonas">Nº Personas</label>
              </div>
              <div class="input-field col s12 l3">
                <i class="material-icons prefix">supervisor_account</i>
                <input id="nninios" type="number" name="nninios" class="c-align" required>
                <label for="nninios">Nº Niños</label>
              </div>
			</div>
		</div><!-- fin calendario -->
    <div class='row'><!-- botones continuar -->
      <div class="input-field col s12 l12  right-align ">
        <div class='col s12 l3  bt-movil right'>
                  <button class="btn col s12 waves-effect waves-light green right" type="submit" name="action">Siguiente 
                    <i class="material-icons right">trending_flat</i>
                  </button>
        </div>
        <div class='col s12 l2  bt-movil'>
            <a href="index.php" class="btn col s12 waves-effect waves-light red left">Cancelar</a>
        </div>
        <div class='col s12 l3 offset-l4 bt-derecha  bt-movil'>
            <a href="index.php" class="btn col s12 waves-effect waves-light blue-grey">Anterior<i class="material-icons left rotado">trending_flat</i></a>

        </div>
        

          </div>
    </div><!-- fin botones continuar -->
    </form>
</div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

