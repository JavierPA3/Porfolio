<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
        #navegador {
    position: fixed;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #ccc;
    padding: 10px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    cursor: pointer;
}
#navegador a {
    text-decoration: none;
    color: #333;
    font-size: 20px;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro de Usuarios</h1>
        <form action="/register_set" method="post">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>

        <label for="surname">Apellido:</label>
        <input type="text" id="surname" name="surname" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>


            <button type="submit" name="enviar">Registrarse</button>
        </form>
    </div>
    <div id="navegador">
        <div><a href="/listar_usuarios">⬅️</a></div>
    </div>
</body>
</html>
