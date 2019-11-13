<?php
include 'accesADdatos.php';
//$miObjeto = new stdClass();
$id = $_GET['hacer'];
$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$select="DELETE FROM `registrovehiculo` WHERE id=$id";
$consulta =$objetoAccesoDato->RetornarConsulta($select);
$consulta->execute();
header("Location: ../paginas/vehiculosenestacionamiento.php");
?>