$(document).ready(function() {
  $("#btnB").click(function( ){
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