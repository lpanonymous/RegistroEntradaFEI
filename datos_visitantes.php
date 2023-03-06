<?php
include("database.php");

$sql = "SELECT * FROM registro_entradas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo 
        "<tr>
            <td>".$row["nombre"]."</td>
            <td>".$row["correo"]."</td>
            <td>".$row["motivo_visita"]."</td>
            <td>".$row["uso_instalaciones"]."</td>
            <td>".$row["fecha_visita"]."</td>
            <td>".$row["horario_visita"]."</td>
            <td>".$row["telefono"]."</td>
        </tr>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();
?>