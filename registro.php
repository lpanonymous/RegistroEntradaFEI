<?php
include("database.php");

$nombre = $_REQUEST["nombre"];
$correo = $_REQUEST["correo"];
$motivo_visita = $_REQUEST["motivo_visita"];
$uso_instalaciones = $_REQUEST["uso_instalaciones"];
$fecha_visita = $_REQUEST["fecha_visita"];
$horario_visita = $_REQUEST["horario_visita"];
$telefono = $_REQUEST["telefono"];

$fecha_visita = date('Y-m-d', strtotime(str_replace('-', '/', $fecha_visita)));

$sql = "INSERT INTO registro_entradas (nombre, correo, motivo_visita, uso_instalaciones, fecha_visita, horario_visita, telefono)
VALUES ('$nombre', '$correo', '$motivo_visita', '$uso_instalaciones', '$fecha_visita', '$horario_visita', '$telefono')";

if ($conn->query($sql) === TRUE) {
  mail("$correo","Datos de entrada a la FEI","Bienvenido a la FEI, estos son tus datos registrados($nombre, $correo, $motivo_visita, $uso_instalaciones, $fecha_visita, $horario_visita, $telefono)");
  echo file_get_contents("index.html");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();

?>