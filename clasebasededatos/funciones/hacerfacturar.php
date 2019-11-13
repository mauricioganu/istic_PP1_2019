<?php
include 'accesoadatos.php';
$precio=100;
$patentenueva = $_GET['patente'];
$bandera=0;



$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("SELECT `patente`, `hora_ingreso` FROM `patentes`");
      $consulta->execute();     
      $datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

foreach ($datos as $patentes ) {
  if ($patentes['patente']==$patentenueva) 
  {
        $bandera=1;
        date_default_timezone_set('America/Argentina/Buenos_Aires');

        $horaSalida = mktime();

        $tiempo = $horaSalida - $objeto->horaIngreso;

        $cobrar = ($tiempo / 60 /60) * $precio;
    

        $Facturado = new stdClass();

        date_default_timezone_set('America/Argentina/Buenos_Aires');

        $Facturado->Vehiculo = $patentenueva;
        $Facturado->fechaEntrada = date("d-m-y H:i",$objeto->horaIngreso);
        $Facturado->fechaSalida = date("d-m-y H:i",$horaSalida);
        $Facturado->importe = $cobrar;
    
       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 

$insert="INSERT INTO `facturados`( `patente`, `f_entrada`, `f_salida`, `importe`) VALUES('$Facturado->Vehiculo','$Facturado->fechaEntrada','$Facturado->fechaSalida','$Facturado->importe')";
//var_dump($insert);
      
      $consulta =$objetoAccesoDato->RetornarConsulta($insert);
      $consulta->execute(); 
       

$id=$patentes['id'];
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $select="DELETE FROM `patentes` WHERE id=$id";
            $consulta =$objetoAccesoDato->RetornarConsulta($select);
            $consulta->execute();

       
        header("Location:../paginas/pagar.php? &cobrar=".$cobrar."&ingreso=".$objeto->horaIngreso."&salida=".$horaSalida."&patente=".$patentenueva);
        exit();
      }


   


   
 
}




if ($bandera==0)
{
  header("Location: ../paginas/no.php");
  exit();
}

//fclose($archivo);

?>






