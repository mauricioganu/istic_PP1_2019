<?php
include 'accesoADatos.php';
$precio=1;
$patentenueva = $_GET['patente'];
$bandera=0;



$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$consulta =$objetoAccesoDato->RetornarConsulta("SELECT `id`,`patente`, `hora_ingreso` FROM `patentes`");
$consulta->execute();     
$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

foreach ($datos as $patentes ) {
  if ($patentes['patente']==$patentenueva) 
  {
        $bandera=1;
        date_default_timezone_set('America/Argentina/Buenos_Aires');

        $horaSalida = mktime();
        $horaSalidaConvertida= date ("d-m-y H:i",$horaSalida);

        $tiempo = $horaSalida - $patentes['hora_ingreso'];

        $cobrar = $tiempo/60  * $precio;
    

        $Facturado = new stdClass();

        date_default_timezone_set('America/Argentina/Buenos_Aires');

        $Facturado->Vehiculo = $patentenueva;
        $Facturado->fechaEntrada = $patentes['hora_ingreso'];
        $Facturado->fechaSalida = $horaSalidaConvertida;
        $Facturado->importe = $cobrar;
    
$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 

$insert="INSERT INTO `facturados`( `patente`, `f_entrada`, `f_salida`, `importe`) VALUES('$Facturado->Vehiculo','$Facturado->fechaEntrada','$Facturado->fechaSalida','$Facturado->importe')";
//var_dump($insert);
      
$consulta =$objetoAccesoDato->RetornarConsulta($insert);
$consulta->execute(); 
       

$id=$patentes['id'];
$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$delete="DELETE FROM `patentes` WHERE id=$id";
$consulta =$objetoAccesoDato->RetornarConsulta($delete);
$consulta->execute();

       
        header("Location:../paginas/pagar.php? &cobrar=".$cobrar."&ingreso=".$patentes['hora_ingreso']."&salida=".$horaSalidaConvertida."&patente=".$patentenueva);
        exit();
      } 
}

if ($bandera==0)
{
  header("Location: ../paginas/patenteinexistente.php");
  exit();
}
?>













