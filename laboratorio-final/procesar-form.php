<!DOCTYPE html>
<html>
<head>
    <title>Resultado del formulario</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cherry+Bomb+One&display=swap');
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-image: url(images/thor-alvis-6AQSaVpPCWE-unsplash.jpg); 
	background-size: 120%;
	animation: anim-1 5s linear infinite;
        }
                                                                     
        @keyframes anim-1 {
	from {
		background-position: 0 0;
	}
	to {
		background-position: -10rem -10rem;
	}
}
        h1 {
            color: #b363ff;
            font-size: 24px;
        }

        p {
            margin: 10px 0;
            color:white;
        }

        .error-message {
            font-family: 'Cherry Bomb One', cursive;
            color:#ff8080;
            font-weight: bold;
        }

        .success-message {
            font-family: 'Cherry Bomb One', cursive;
            color: #63ffa9;
            font-weight: bold;
        }

        .btn {
            background-color: #63ffa9;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            cursor: pointer;
            font-family:  'Cherry Bomb One', cursive;
            font-size: 20px;
        }
        .btn:hover {
            background-color: #b363ff;
        }
        
    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['name'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $userpassword = $_POST['password'];

        if (empty($nombre) || empty($apellido1) || empty($apellido2) || empty($email) || empty($login) || empty($userpassword)) {
            echo "<h1 class='error-message'>Todos los campos son requeridos</h1>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<h1 class='error-message'>El formato de correo electrónico no es válido</h1>";
        } elseif (strlen($userpassword) < 4 || strlen($userpassword) > 8) {
            echo "<h1 class='error-message'>La contraseña debe tener entre 4 y 8 caracteres</h1>";
        } else {

            $servername = "localhost";
            $username = "root";
            $dbpassword = "";
            $dbname = "datosform";

            $conn = new mysqli($servername, $username, $dbpassword, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Validar si el email ya existe en la base de datos
            $sql = "SELECT * FROM datos WHERE email = '$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // El email ya existe, mostrar mensaje de error
                echo "<h1 class='error-message'>El correo electrónico ya está registrado. <br> Por favor, elija otro correo.</h1>";
            } else {
                // Insertar los datos en la base de datos
                $sql = "INSERT INTO datos (NOMBRE, APELLIDO1, APELLIDO2, EMAIL, LOGIN, PASSWORD) VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$login', '$userpassword')";

                if ($conn->query($sql) === TRUE) {
                    echo "<h1 class='success-message'>Registrad@ correctamente!</h1>";
                    echo "<p>Nombre: $nombre</p>";
                    echo "<p>Apellido1: $apellido1</p>";
                    echo "<p>Apellido2: $apellido2</p>";
                    echo "<p>Email: $email</p>";
                    echo "<p>Login: $login</p>";
                    echo "<p>password: $userpassword</p>";

                    // Registro completado con éxito
                    echo "<p class='success-message'>.</p>";

                    // Botón de consulta
                    echo '<a href="consulta.php" class="btn">Consulta</a>';
                } else {
                    echo "<h1 class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</h1>";
                }
            }

            $conn->close();
        }
    }
    ?>

    <button class="btn" onclick="window.location.href='formulario.html'">Volver al formulario</button>
</body>
</html>
