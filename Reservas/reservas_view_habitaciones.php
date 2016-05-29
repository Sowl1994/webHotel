<form action="index.php?secc=mireserva2" method="POST" >
  <div class='content'>
    <div class='row'>
      <div class="col s12 l7 offset-l1 card" style='margin-top: 50px;'>
      <br>
        <div class='row'> <!-- progreso indicadores -->
          <div class=' col s12 l8 offset-l2  proces-row center row-icon-procg'>
            <a href="#" class='row-icon-proc '><i class='fa fa-check-circle-o icon-proceso'></i><div class='labe-proceso'>Fechas</div></a>
            <a href="#" class='row-icon-proc select-proc'><i class="fa fa-bed icon-proceso" aria-hidden="true"></i></i><div class='labe-proceso'>Habitaciones</div></a>
            <a href="#" class='row-icon-proc'><i class="fa fa-users icon-proceso" aria-hidden="true"></i><div class='labe-proceso'>Datos Cliente</div></a>
            <a href="#" class='row-icon-proc'><i class="fa fa-credit-card-alt icon-proceso" aria-hidden="true"></i><div class='labe-proceso'>Pago</div></a>
          </div>
        </div><!-- fin progreso indicadores -->
        <div class='row'><!-- habitaciones -->
          <div class='col l12'>
            <?php $reserva->listaHabitaciones($fechaIn,$fechaS);?>
          </div>
        </div><!-- fin habitaciones -->
        <div class='row'><!-- botones continuar -->
          <div class="input-field col s12 l12  right-align " id="next-habs">
            <div class='col s12 l2  bt-movil'>
                <a href="index.php" class="btn col s12 waves-effect waves-light red left">Cancelar</a>
            </div>
            <div class='col s12 l3 offset-l4 bt-derecha  bt-movil'>
               <a href="index.php" class="btn col s12 waves-effect waves-light blue-grey">Anterior<i class="material-icons left rotado">trending_flat</i></a>

            </div>
            <div class='col s12 l3  bt-movil'>
                      <a href="#"><button class="btn col s12 waves-effect waves-light green right" type="submit" name="action">Siguiente 
                        <i class="material-icons right">trending_flat</i>
                      </button></a>
            </div>

              </div>
        </div><!-- fin botones continuar -->
      </div>

    <!-- segunda columna -->
    <div class="col s12 l3 card" id='big-res-carrito' >
          <h2 class ='big-text-cart'> Entrada </h2>
            <p class='date-cart'><?php 
              setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
              $fecha = strftime("%A, %d de %B de %Y", strtotime($fechaIn));
              echo $fecha . "(Estancia de ".$dias." dias)";
             ?><br></p>
            <p class='small-text-cart'> A partir de las 13:00</p>
            <hr class='separador-cart'></hr>
          <h2 class ='big-text-cart'> Salida </h2>
            <p class='date-cart'><?php 
              setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
              $fecha = strftime("%A, %d de %B de %Y", strtotime($fechaS));
              echo $fecha;
            ?><br></p>
            <p class='small-text-cart'>Hasta las 12:00 </p><br>
    </div>

    <div class="col s12 l3 card" id='big-res-carrito-second'>
    <br>
      <!--<div class='row' style=' margin-bottom: 0px; padding-top: 5px;'>
        <div class='col l6' ><p class='hab-cart'>Carrito de la compra</p></div>
        <div class='col l2 '><p class='hab-cart'></p></div>
        <div class='col l4 right' style='margin-right: -10px;' ><p class='hab-cart'></p></div>
      </div><hr class='separador-compra-cart'></hr>
      <div class='row' style=' margin-bottom: 0px; padding-top: 5px;'>
        <div class='col l6' ><p class='hab-cart'>Habitacion Doble</p></div>
        <div class='col l2' ><p class='hab-cart'>x 0</p></div>
        <div class='col l4 right' style='margin-right: -10px;' ><p class='hab-cart'>0 EUR</p></div>
      </div><hr class='separador-compra-cart'></hr>-->
      <div class='row' style=' margin-bottom: 10px;'>
        <div class='col l3' style='margin-top:5px;' ><a style="color: #26a69a; font-size: 1.3em; margin-top:10px;"><span id="totalPersonas"><?php echo $_SESSION['nPersonas']?></span> <i class="fa fa-users" aria-hidden="true"></i></a></div>
        <div class='col l2' ><p class='hab-cart'>Total:</p></div>
        <div class='col l5 right' style='margin-right: -40px;' ><p id="total" class='hab-cart'>0€/noche</p></div>  
      </div>
    </div>
    <div class="col s12 l3 card" id='big-res-carrito-second'>
      <div class="input-field col s12">
            <input id="codigoprom" type="text" class="validate">
            <label for="codigoprom">Codigo promocional</label>
      </div>
      <div class="input-field col s12">
            <h4 class="big-text-cart" >Contratación Actividades</h4>
            <?php $reserva->listaActividades();?>
            <br>
      </div>
    </div>
    <!-- fin segunda columna -->

    </div><!-- fin row--> 
  </div><!-- fin content-->
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <input type="hidden" id="ped" name="totalHabs"></input>
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script>
    var pedido = [];
    function aniadeHabitacion(id,precio,nombre){

        var nPersonas = parseInt(document.getElementById("totalPersonas").innerHTML);
        precio = parseInt(precio)*1;

        if(pedido.indexOf(id) == -1){
          var nombreHabitacion = document.createElement("div");
          nombreHabitacion.className="col l7";
          var parrafoNombre = document.createElement("p");
          parrafoNombre.innerHTML=nombre;

          var totalHabitacion = document.createElement("div");
          totalHabitacion.className="col l2";
          var parrafoTotal = document.createElement("p");
          parrafoTotal.id="t"+id;
          parrafoTotal.innerHTML="x "+ 1;

          var precioHabitacion = document.createElement("div");
          precioHabitacion.className="col l3 right";
          precioHabitacion.style.marginRight = "-10px";
          var parrafoPrecio = document.createElement("p");
          parrafoPrecio.innerHTML=precio+" €";

          var divSubcont = document.createElement("div");
          divSubcont.className="row";
          divSubcont.style.marginBottom = "0px";
          divSubcont.style.paddingTop = "5px";
          var divCont = document.getElementById("big-res-carrito-second");

          nombreHabitacion.appendChild(parrafoNombre);
          totalHabitacion.appendChild(parrafoTotal);
          precioHabitacion.appendChild(parrafoPrecio);

          divSubcont.appendChild(nombreHabitacion);
          divSubcont.appendChild(totalHabitacion);
          divSubcont.appendChild(precioHabitacion);
          divCont.appendChild(divSubcont);          
        }else{
          var nH = (document.getElementById("t"+id).innerHTML).split("x");
          var nHi = parseInt(nH[1])+ 1;
          document.getElementById("t"+id).innerHTML = "x "+nHi;
        }

        
        var precioTotal = parseInt(document.getElementById("total").innerHTML);
        document.getElementById("total").innerHTML = (precioTotal+precio)+"€/noche";

        pedido.push(id);
        $('#ped').val(JSON.stringify(pedido.sort()));

    }
  </script>
</form>