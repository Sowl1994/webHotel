function validateForm() {
    var inputEmail = document.getElementById("formEmail");
    var regEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    var inputTel = document.getElementById("formTel");
    var regTel = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{3})/;
    if(!regEmail.test(inputEmail.value)){
    	return false;
    	
    }else if(!regTel.test(inputTel.value)){
    	alert("error en el numero de telefono");
    	inputTel.style.borderColor = "red";
    	return false;

    }else{ 
    	alert("Gracias por su información. Nos pondremos en contacto muy pronto!");
    	return true;
	}
}