function validar(){
    var usu=document.getElementById("txtUsu");
    var pass=document.getElementById("txtPass");
    var u=(usu.value).toString();
    var p=(pass.value).toString();
   if(u.length>0&&p.length>0&&p.length<=10)
        return true;
   alert("Datos con Error");
   return false;
}