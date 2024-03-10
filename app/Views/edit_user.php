<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        h1 {
            color: #001f3f;
            margin-bottom: 20px;
        }

        form {
            background-color: #0074cc;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        label {
            color: #fff;
            display: block;
            margin-top: 10px;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #001f3f;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 12px 20px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            background-color: #004080;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #002147;
        }

        a {
            margin-top: 20px;
            color: #004080;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>EDITAR USUARIO</h1>
    <?php foreach ($users as $user): ?>
        <form action="/editUserData" method="post">
            <label for="name">Nombre</label>
            <input type="text" name="name" placeholder="Nombre" value="<?= $user['name'] ?>">
            <label for="surname">Apellido</label>
            <input type="text" name="surname" placeholder="Apellido" value="<?= $user['surname'] ?>">
            <label for="foto">Foto</label>
            <input type="text" name="foto" placeholder="Foto" value="<?= $user['photo'] ?>">
            <label for="categoria_profesional">Categoria profesional</label>
            <input type="text" name="categoria_profesional" placeholder="Categoria Profesional" value="<?= $user['categoria_profesional'] ?>">
            <label for="profile_summary">Resumen del perfil</label>
            <input type="text" name="profile_summary" placeholder="Profile summary" value="<?= $user['profile_summary'] ?>">
            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Contraseña" value="<?= $user['password'] ?>">
            <input type="submit" value="Editar">
        </form>
    <?php endforeach; ?>
    <a href="/listar_usuarios">Volver atrás</a>
</body>
</html>
