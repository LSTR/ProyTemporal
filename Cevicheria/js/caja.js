$(document).ready(function() {
  $("#btnB").click(function( ){
    var _data="idMesa="+$("#txtMesa").val();
    $.ajax({
        type:"post",
        url:"../comprobante/boleta.php",
        data:_data,
        success:function(r){
            if(r=="0"){
               $("#pagePrint").html("");
               alert("NO EXISTEN PEDIDOS EN ESTA MESA");
            }else{
                activarBtnG(true);
               $("#pagePrint").html(r);
            }
        }
    });
  });
  $("#btnF").click(function( ){
    var _data="idMesa="+$("#txtMesa").val();
    $.ajax({
        type:"post",
        url:"../comprobante/factura.php",
        data:_data,
        success:function(r){
            if(r==0){
               $("#pagePrint").html("");
               alert("NO EXISTEN PEDIDOS EN ESTA MESA");
            }else{
                activarBtnG(true);
               $("#pagePrint").html(r);
            }
        }
    });
  });
  
});
function activarBtnG(b){
    $("#btnGuardar").attr("disabled",!b);
}
function activarBtnI(b){
    $("#btnImprimir").attr("disabled",!b);
}
function print(){
//    $("#btnImprimir").click(function( ){
        var w=window.open(null, 'Print_Page', 'scrollbars=yes');        
        w.document.write(jQuery('#pagePrint').html());
        w.document.close();
        w.print();
//      });
}
function guardar(){
    $("#parteCli input[type=text]").css("color","#000");
    var cli=$("#txtC").val();
    var dni=$("#txtD").val();
    var tlf=$("#txtT").val();
    var fec=$("#fecha").html();
    var tot=$("#totalPagar").html();
    var idPedido=$("#idPed").val();
    var tipo=$("#tipo").val();
    var pass=true;
    if(cli==""||!cli.match(/^[a-zA-Z ]+$/)){
       $("#txtC").val("").attr("placeholder","Solo letras").css("color","#DD4141");
       pass=false;
    }
    if(tlf==""||!tlf.match(/^[0-9]{7,9}$/)){
       $("#txtT").val("").attr("placeholder","Solo numero de telefono/celular").css("color","#DD4141");
       pass=false;
    }
    if(tipo=="b")
        if(!dni.match(/^[1-9]{1}[0-9]{7}$/)){
           $("#txtD").val("").attr("placeholder","Solo 8 numeros").css("color","#DD4141");
           pass=false;
        }
    if(tipo=="f")
        if(!dni.match(/^[1-9]{1}[0-9]{10}$/)){
           $("#txtD").val("").attr("placeholder","Solo 11 numeros").css("color","#DD4141");
           pass=false;
        }
    
    if(cli.length<2&&dni.length<2){
        alert("No hay suficientes datos para procesar");
        pass=false;
    }
//    if(!pass)return false;
    return false;
    activarBtnI(true);
    activarBtnG(false);
    var _data="txtAccion=s&cli="+cli+"&dni="+dni+"&tlf="+tlf+"&fec="+fec+"&tot="+tot+"&idP="+idPedido+"&tipo="+tipo;
    $.ajax({
        type:"post",
        url:"../../Controlador/comprobanteC.php",
        data:_data,
        success:function(r){
            $("#numGen").html(r);
        }
    });
    
    cli=format(cli,80);
    dni=format(dni,20);
    tlf=format(tlf,20);
    fec=format(fec,20);
    var add='<span>Se&ntilde;or: <span class="inputS">'+cli+'</span> </span><br><br><span>DNI:<span class="inputS">'+dni+'</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span>Telf:<span class="inputS">'+tlf+'</span> </span><span>&nbsp;&nbsp;Fecha:<span class="inputS">'+fec+'</span> </span>';
    $("#DCLI").html(add);
}
function format(str,t){
    var sz=t-str.length;
    for (i = 0; i < sz; i++) {
        str+="&nbsp;";
    }
    return str;
}