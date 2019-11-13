<?php
include 'accesoadatos.php';
 $miObjeto = new stdClass();

 date_default_timezone_set('America/Argentina/Buenos_Aires');
 $hora=mktime();

 $miObjeto->patente = $_GET['patente'];
 //var_dump($_GET);
 $miObjeto->horaIngreso = $hora;
 
 //$archivo = fopen('../archivos/vehiculos.txt', 'a');
 //fwrite($archivo, json_encode($miObjeto2)."\n");
 //fclose($archivo);
$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select patente,  from patentes");
			$consulta->execute();			
			$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);	
foreach ($datos as $patentes ) {
	if ($patentes["patente"]==$miObjeto->patente) {

		
 header("Location: ../paginas/vehiculoregistrado.php");
		exit();
	}
	

	}

	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 

$insert="INSERT INTO patentes(patente, hora_ingreso)  VALUES ('$miObjeto->patente','$miObjeto->horaIngreso')";
//var_dump($insert);
			
			$consulta =$objetoAccesoDato->RetornarConsulta($insert);
			$consulta->execute();	
header("Location: ../paginas/ingresook.php");

?>