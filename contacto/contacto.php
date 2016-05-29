   	<div id="contacto">
  		<br>
  		<h3  style='padding-bottom: 20px; text-align: center;' class=' separador separadorDots'>Contacta con nosotros</h3>
 
  		<div id="googleMap" >
  			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1589.4856902063739!2d-3.5973872973582024!3d37.177151109482814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fcb8cb9390e1%3A0x9253186efccf153a!2sHotel+Plaza+Nueva!5e0!3m2!1ses!2ses!4v1457608850736"  id='mapa-contacto' frameborder="0" style="border:0" allowfullscreen></iframe>
  		</div>
  		<br>
  		<h3 style='padding-bottom: 20px; text-align: center;' class=' separador separadorDots'>Formulario de contacto</h3>


  <div class="container">
  <div class="row">
    <form class="col s12 l6"  action="./contacto/mandaMail.php" onsubmit="return validateForm()" method="POST">
      <div class="row">
        <div class="input-field col s6 l12">
          <input  id="first_name" type="text" name="nombre" class="validate" required>
          <label for="first_name">Nombre completo</label>
        </div>
        <div class="input-field col s6 l12">
          <input id="formTel" type="tel" class="validate" required>
          <label for="formTel">Telefono</label>
        </div>  

        <div class="input-field col s12 l12">
          <input id="formEmail" type="email" name="mail" class="validate" required>
          <label for="formEmail">Email</label>
        </div>
        <div class="input-field col s12 l12">
          <textarea rows="4" cols="20" id="textarea1" name="contenido" class="materialize-textarea"  placeholder="aquí..." required></textarea>
          <label for="textarea1">Escriba lo que necesite</label>
        </div>
        <div class="input-field col s12 l12 center">
            <input class="btn waves-effect waves-light"  id='boton-enviar' type='submit'></input>
        </div>
       
       </div>
      </form>
     <div class="input-field col s12 l4 offset-l2">
  		<div  id='direccion'>
  			<p id='centered-contact-info'>
			Hotel Plaza Nueva <br>
			Imprenta, nº 2. 18010 Granada, Granada, España<br>
			Teléfono: +34 958 215 273. <br>
			Fax: +34 958 225 765 <br>
			info@hotel-plazanueva.com
			</p>
		 </div>
	</div>
	</div>
  </div>
</div>
