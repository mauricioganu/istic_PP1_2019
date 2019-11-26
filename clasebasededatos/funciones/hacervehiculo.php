<?php
include 'accesoADatos.php';

 $miObjeto2 = new stdClass();

 date_default_timezone_set('America/Argentina/Buenos_Aires');
 $hora=mktime();
 //$hora2=date("d-m-y H:i",$hora);

 

 $miObjeto2->patente = $_GET['patente'];
 $miObjeto2->horaIngreso = $hora;

    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta =$objetoAccesoDato->RetornarConsulta("select patente from patentes");
	$consulta->execute();			
	$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);		
	//var_dump($datos);
	foreach ($datos as $patentes) 
		{
			if($patentes["patente"]==$miObjeto2->patente)
			{
				header("Location: ../paginas/vehiculoregistrado.php");
		        exit();
			}
		}


    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
    $select="INSERT INTO patentes ( patente, hora_ingreso) VALUES ('$miObjeto2->patente','$miObjeto2->horaIngreso')";
    $consulta =$objetoAccesoDato->RetornarConsulta($select);
    $consulta->execute();

    header("Location: ../paginas/okVehiculo.php");
 

?>