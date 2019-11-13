<?php
include 'accesoADatos.php';
$miObjeto = new stdClass();
$miObjeto->usuario = $_GET['usuario'];
$miObjeto->contraseña = $_GET['contraseña'];
//var_dump($_GET);

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select nombre, 	clave from usuario");
			$consulta->execute();
			$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);	



foreach ($datos as $usuario ) {
	if ($usuario["usuario"]==$miObjeto->usuario) {

		header("Location: ../paginas/ok.php");
		exit();
	}
	

	}

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 

$insert="INSERT INTO usuario(nombre,clave) VALUES ('$miObjeto->usuario ', '$miObjeto->contraseña')";
//var_dump($insert);
			
			$consulta =$objetoAccesoDato->RetornarConsulta($insert);
			$consulta->execute();	
		header("Location: ../paginas/ok.php");	


?>

