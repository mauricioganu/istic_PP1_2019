<?php
include 'accesoADatos.php';
$miObjeto = new stdClass();
$miObjeto->nombre = $_GET['nombre'];
$miObjeto->clave = $_GET['clave'];
$c=0;

 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$consulta =$objetoAccesoDato->RetornarConsulta("select nombre from usuario");
$consulta->execute();			
$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);		
//var_dump($datos);

	foreach ($datos as $usuario) 
		{
			if($usuario["nombre"]==$miObjeto->nombre)
			{
				$c=1;
		        
				break;
			}
			if ($c==1)
			{
					header("Location: ../paginas/usuarioexistente.php");
			}
			
			else {

				
			

			


        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $select="INSERT INTO usuario( nombre, clave) VALUES ('$miObjeto->nombre','$miObjeto->clave')";
        $consulta =$objetoAccesoDato->RetornarConsulta($select);
        $consulta->execute();

        header("Location: ../paginas/ok.php");
        exit();
        } 
}
  ?>