/* NUEVO XHTMLOBJETO */
function autocompletdos(){
// Definimos la URL que vamos a solicitar via Ajax
var ajax_url = "ajax_refresh.php";

// Definimos los parámetros que vamos a enviar
var params = document.getElementById("country_id").value;
// Añadimos los parámetros a la URL

// Creamos un nuevo objeto encargado de la comunicación
var ajax_request = new XMLHttpRequest();

  ajax_request.onreadystatechange = function() {
    if (ajax_request.readyState == 4 && ajax_request.status == 200) {
    	if(document.getElementById("country_list_id").value != ''){
			document.getElementById("country_list_id").style.display = "inline";
      		document.getElementById("country_list_id").innerHTML = ajax_request.responseText;
    	}else{
    		document.getElementById("country_list_id").style.display = "none";
    	}
     
    }
   };
// Definimos como queremos realizar la comunicación
ajax_request.open( "GET","ajax_refresh.php?keyword="+params, true );
//Enviamos la solicitud
ajax_request.send();
}
/* FIN NUEVO XHTMLOBJETO */



// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#country_id').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh.php',
			type: 'GET',
			data: {keyword:keyword},
			success:function(data){
				$('#country_list_id').show();
				$('#country_list_id').html(data);
			}
		});
	} else {
		$('#country_list_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#country_id').val(item);
	// hide proposition list
	$('#country_list_id').hide();
}