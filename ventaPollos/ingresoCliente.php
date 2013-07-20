<?php
require("autoCarga.php");

$dni = $_POST['dni'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$rpm = $_POST['rpm'];
$fax = $_POST['fax'];
$estado = $_POST['estado'];
$jefe = $_POST['jefe'];

$idCliente = $_GET['cliente'];

$cliente = new Cliente();

if ($idCliente) {
	$where = "idCliente = $idCliente";
	$cliente->editCliente($dni, $nombres, $apellidos, $ciudad, $direccion, $email, $celular, $rpm, $fax, $estado, $where);
	$cliente->setJefe($idCliente, $jefe);
}
else {
	$cliente->insertCliente($dni, $nombres, $apellidos, $ciudad, $direccion, $email, $celular, $rpm, $fax, $estado);	
	
	//Actualizamos el jefe del �ltimo registro ingresado
	//Para esto comprobamos que se haya seleccionado un jefe
	if ($jefe > 0) {
		$ultimoIngresado = $cliente->getUltimoClienteIngresado();
		if ($ultimoIngresado) {
			$cliente->setJefe($ultimoIngresado, $jefe);
		}
	}
}

header("Location: ".$_SERVER['HTTP_REFERER']);
?>