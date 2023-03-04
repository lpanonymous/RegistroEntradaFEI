<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="entradasfei";

$nombre = $_REQUEST["nombre"];
$correo = $_REQUEST["correo"];
$motivo_visita = $_REQUEST["motivo_visita"];
$uso_instalaciones = $_REQUEST["uso_instalaciones"];
$fecha_visita = $_REQUEST["fecha_visita"];
$horario_visita = $_REQUEST["horario_visita"];
$telefono = $_REQUEST["telefono"];

$fecha_visita = date('Y-m-d', strtotime(str_replace('-', '/', $fecha_visita)));

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "INSERT INTO registro_entradas (nombre, correo, motivo_visita, uso_instalaciones, fecha_visita, horario_visita, telefono)
VALUES ('$nombre', '$correo', '$motivo_visita', '$uso_instalaciones', '$fecha_visita', '$horario_visita', '$telefono')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();

?>