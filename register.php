<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrarse</title>
    <style>
        body {
            background-color: white;
            color: #333;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            border: 1px solid #FFD700;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #FFD700;
            border-radius: 5px;
            width: 80%;
        }
        button {
            background-color: #FFD700;
            border: none;
            color: white;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 80%;
        }
        button:hover {
            background-color: #FFC107;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registrarse</h1>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Registrar</button>
        </form>
        <p><a href="login.php">¿Ya tienes una cuenta? Inicia sesión aquí</a></p>
    </div>

    <?php
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Guardar en la base de datos
        $stmt = $pdo->prepare("INSERT INTO usuarios (username, password) VALUES (:username, :password)");
        $stmt->execute(['username' => $username, 'password' => $password]);

        // Guardar en un archivo de texto
        $file = 'usuarios.txt';
        $data = "Usuario: $username, Contraseña: {$_POST['password']}\n";
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

        header('Location: login.php');
        exit();
    }
    ?>
</body>
</html>
