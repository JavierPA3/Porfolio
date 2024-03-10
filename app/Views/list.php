
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
            padding: 20px;
            background-color: #fff;
            margin: 0;
        }

        header {
            background-color: #333;
            padding: 10px 0;
        }

        nav {
            text-align: center;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav li {
            display: inline-block;
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 20px;
        }

        li {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        li:hover {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .search-container {
            text-align: center;
            margin: 20px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
            border: none;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Listado de Usuarios</h1>
    <header>
        <nav>
            <ul>
                <li><a href="/listar_usuarios">Inicio</a></li>
                <li><a href="/SobreNosotros">Acerca de</a></li>
                <li><a href="/register">Registrarse</a></li>
                <li><a href="/login">Iniciar sesión</a></li>
            </ul>
        </nav>
    </header>
    <div class="search-container">
        <form action="/search" method="get">
            <input type="text" name="query" placeholder="Buscar por nombre o email">
            <input type="submit" value="Buscar">
        </form>
    </div>

    <ul>
        <?php foreach ($users as $user) : ?>
            <li>
                <h2><?= $user['name'] ?> <?= $user['surname'] ?></h2>
                <p>Email: <?= $user['email'] ?></p>
                <p>Categoría Profesional: <?= $user['categoria_profesional'] ?></p>
                <p>Profile Summary: <?= $user['profile_summary'] ?></p>
                <a href="/user/<?= $user['id'] ?>">Ver detalles</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
