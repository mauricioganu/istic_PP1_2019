<?php

include 'accesoADatos.php';
$miObjeto = new stdClass();
$miObjeto->usuario = $_GET['usuario'];
$miObjeto->contraseña = $_GET['contraseña'];
//var_dump($_GET);

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$consulta =$objetoAccesoDato->RetornarConsulta("SELECT  `nombre` FROM `usuario`  ");
$consulta->execute();
$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);	

//var_dump($datos);

foreach ($datos as $usuario ) {
	if ($usuario["nombre"]==$miObjeto->usuario) {

		header("Location: ../paginas/usuarioexistente.php");
		exit();
	}
	

	}

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 

$insert="INSERT INTO `usuario`( `nombre`, `clave`)  VALUES ('$miObjeto->usuario ', '$miObjeto->contraseña')";
//var_dump($insert);
			
$consulta =$objetoAccesoDato->RetornarConsulta($insert);
$consulta->execute();	
		header("Location: ../paginas/ok.php");	


?>

