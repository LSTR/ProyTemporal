function login(){
	return true;
}
function validar(){
    var texto=document.getElementById("txt");
    var u=(texto.value).toString();
    if(u.length<=0)
    	return false;
    var b=esNumero(u);
   return b;
}
function esNumero(n){
	var v=Number(n);
    for (var i = 0; i < n.length; i++)
    	if(n[i]<'0'||n[i]>'9')return false;
    return true;
}
function esDecimal(n){
	var i=0;
	var num="";
	var sz=n.length;
	while(i<sz&&n[i]!="."){
		num+=n.charAt(i);
		i++;			
	}
	if(esNumero(num)){
		if(i==sz){
			return true;
		}else if(i==sz-2){
			i++;
			var d1=n[i];
			i++;
			if(esNumero(d1)){
				return true;
			}else{
				return false;
			}
		}else if(i==sz-3){
			i++;
			var d1=n[i];
			i++;
			var d2=n[i];
			i++;
			if(esNumero(d1+""+d2)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}else{
		return false;
	}
}