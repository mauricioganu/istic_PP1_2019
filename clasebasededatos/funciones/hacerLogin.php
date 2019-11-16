
<?php
session_start();
include 'accesoADatos.php';
$check= $_GET['usuario'];
$clave=$_GET['contraseña'];


//$archivo = fopen("registro.txt", 'r');

//$contador=0;
$banderausuario=0;
$banderacontraseña=0;
if (empty($check) || empty($clave)) 
	{
		header("Location: ../paginas/login.php?error=camposvacios");
		exit();
	}
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT  `nombre`, `clave` FROM `usuario` ");
			$consulta->execute();			
			//$ArrayAsociaticoConDatos= $consulta->fetchAll(PDO::FETCH_ASSOC);		
			$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

	//var_dump($datos);



	
	
			

foreach ($datos as $usuario ) 
{

	if ($usuario["nombre"] == $check )
		{
			//echo "entro foreach";
			//die;

			$banderausuario=1;

			//header("Location: ../paginas/ok.php");
			//exit();

		}
	if ($usuario["clave"]== $clave)
		{
			$banderausuario=1;
			$_SESSION["usuario"]= $usuario["nombre"];
			setcookie("cookie", $_SESSION['usuario']);
			header ("Location: /clasebasededatos/index.php" );
			exit();
		}




		
}
if ($banderausuario==0)
{
	header ("Location:../paginas/usuarionoregistrado.php" );
}
if ($banderacontraseña==0)
{
	header ("Location:../paginas/usuarionoregistrado.php" );
}


?>