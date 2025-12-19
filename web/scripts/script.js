function validateForm() {
  	let email = document.forms["myForm"]["email"].value;
  	let phone = document.forms["myForm"]["phone"].value;
  	if (email != "" || phone != "") {
    	return true;
  	}else{
  		alert("Поле Email или номер должно быть заполнено");
  		return false;
  	}
}