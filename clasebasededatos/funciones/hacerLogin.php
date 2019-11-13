
<?php
	session_start();
	include 'accesoADatos.php';
$check= $_GET['usuario'];
$clave=$_GET['contraseña'];


//$archivo = fopen("registro.txt", 'r');
$contador=0;

if (empty($check) || empty($clave)) 
	{
		header("Location: ../paginas/login.php?error=camposvacios");
		exit();
	}
	else
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select nombre, 	clave from usuario");
			$consulta->execute();			
			//$ArrayAsociaticoConDatos= $consulta->fetchAll(PDO::FETCH_ASSOC);		
			$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

			foreach ($datos as $usuario ) {



//var_dump($usuario);




//while(!feof($archivo)) 
if ($usuario['nombre'] == $check){


	//$objeto = json_decode(fgets($archivo));
	
	if ($objeto->Usuario==$check)
	{	
		if ($usuario['clave'] == $clave)
		{
			$contador=1;
		}
		
	}
	if ($contador==1)
	{
		
					
		header("Location:  clasebasededatos/paginas/loginok.php");
	}
	else
	{
		header("Location: clasebasededatos/paginas/no.php");
			}
}
}
}
//fclose($archivo);
//exit();
?>