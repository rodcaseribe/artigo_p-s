function valida_form (){
if(document.getElementById("ip").value == ""){
	alert('Por favor, preencha o campo IP');
	document.getElementById("ip").focus();}
if(document.getElementById("ip").value.length < 3){
	alert('Por favor, preencha o campo IP corretamente');
	document.getElementById("ip").focus();}


if(document.getElementById("barra").value == ""){
        alert('Por favor, preencha o campo CIDR');
        document.getElementById("barra").focus();}
if(document.getElementById("barra").value.length > 2){
        alert('Por favor, preencha o campo CIDR corretamente');
        document.getElementById("barra").focus();
 	
    
return false


	}
    }
