<?php
include 'accesADdatos.php';
$id = $_GET['hacer'];
$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$select="DELETE FROM `patentes` WHERE id=$id";
$consulta =$objetoAccesoDato->RetornarConsulta($select);
$consulta->execute();
header("Location: ../paginas/estacionados.php");
?>