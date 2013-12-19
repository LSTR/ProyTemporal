$(document).ready(function() {
  $("#btnB").click(function( ){
    activarBtnG(true);
    $.ajax({
        type:"post",
        url:"../comprobante/boleta.php",
//        data:_data,
        success:function(r){
            $("#pagePrint").html(r);
        }
    });
  });
  $("#btnF").click(function( ){
    activarBtnG(true);
    $.ajax({
        type:"post",
        url:"../comprobante/factura.php",
//        data:_data,
        success:function(r){
            $("#pagePrint").html(r);
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
        w=window.open(null, 'Print_Page', 'scrollbars=yes');        
        w.document.write(jQuery('#pagePrint').html());
        w.document.close();
        w.print();
//      });
}
function guardar(){
    activarBtnI(true);
    var cli=$("#txtC").val();
    var dni=$("#txtD").val();
    var tlf=$("#txtT").val();
    cli+="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n\
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    dni+="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    tlf+="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    var add='<span>Se&ntilde;or: <span class="inputS">'+cli+'</span> </span><br><br><span>DNI: <span class="inputS">'+dni+'</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span>Telf:&nbsp;<span class="inputS">'+tlf+'</span> </span>';
    $("#DCLI").html(add);
}