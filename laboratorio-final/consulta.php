<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "datosform";

$conn = new mysqli($servername, $username, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM datos";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Usuarios Registrados</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cherry+Bomb+One&display=swap');
       table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
th {
    background-color: #63ffa9; 
    color: black;
    font-family: 'Cherry Bomb One', cursive;
}

tr:nth-child(even) {
    background-color: #b363ff;
}

tr:hover {
    background-color: #63ffa9;
}
h2{
    font-family: 'Cherry Bomb One', cursive;
    text-align: center;
    font-size: 30px;
}
  .btn{
    background-color: #63ffa9;
    padding: 10px;
    margin: 10px;
    border-radius: 20px;
    border-color: ;
    
}
.btn:hover{
    
   
            background-color: #b363ff;
        
}
.btn2 {
    background-color:#63ffa9;
    padding: 10px;
    margin: 10px;
    border-radius: 20px;
}
.btn2:hover{
    
   text-align: center;
    background-color: #b363ff;

}
    </style>
</head>
<body>
    <h2>Usuarios Registrados</h2>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido1</th>
            <th>Apellido2</th>
            <th>Email</th>
            <th>Login</th>
            <th>Password</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['apellido1'] . "</td>";
                echo "<td>" . $row['apellido2'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['login'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay usuarios registrados.</td></tr>";
        }
        ?>
    </table>

    <?php
    $conn->close();
    ?>
</body>

<button class="btn" onclick="window.location.href='formulario.html'">Volver al formulario</button>
<button class= "btn2" onclick="window.location.href='consulta.php'">Volver a la consulta</button>

</html>
