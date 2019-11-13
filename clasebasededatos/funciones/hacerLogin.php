<?php
	session_start();

	$usuarioIngresado = $_GET['usuario'];
	$claveIngresada = $_GET['contraseña'];
	
	$booUsuario = 0;
	$booPassword = 0;

	if (empty($usuarioIngresado) || empty($claveIngresada)) 
	{
		header("Location: ../paginas/login.php?error=camposvacios");
		exit();
	}
	else
	{
		//$archivo = fopen("../archivos/registro.txt", "r") or die("Imposible arbrir el archivo");
	
		//while(!feof($archivo)) 
		//{
		//	$objeto = json_decode(fgets($archivo));
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select nombre, 	clave from usuario");
			$consulta->execute();			
			//$ArrayAsociaticoConDatos= $consulta->fetchAll(PDO::FETCH_ASSOC);		
			$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

			foreach ($datos as $usuario ) {
				
			


			if ($usuario['nombre'] == $usuarioIngresado) 
			{	
				$booUsuario = 1;
				if ($usuario['clave'] == $claveIngresada)
				{
				    $booPassword= 1;

					//fclose($archivo);
					$_SESSION['usuario']=$objeto->nombre;
					//$_SESSION['perfil']=$objeto->perfil;
					//$_COOKIE['cookiename']=$usuarioIngresado;

					header("Location: ../paginas/login.php?exito=signup");
					exit();
				}			
			}
		 	
		}	
		if ($booUsuario == 0) 
		{
			header("Location: ../paginas/no.php");
			exit();
		}
		if ($booPassword==0)
		{
            header("Location: ../paginas/no.php");
			exit();
		}
			
		//fclose($archivo);
		
	}	
	
?>