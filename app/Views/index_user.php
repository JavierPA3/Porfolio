<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porfolio</title>
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            font-size: 32px;
        }

        section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .portfolio-item {
            background-color: #fff;
            border-radius: 10px;
            margin: 20px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 300px;
            transition: transform 0.3s ease-in-out;
            overflow: hidden;
        }

        .portfolio-item:hover {
            transform: translateY(-5px);
        }

        .portfolio-details {
            text-align: center;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        a.portfolio-link {
            display: inline-block;
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 20px;
            margin-top: 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        a.portfolio-link:hover {
            background-color: #c0392b;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            margin-top: 15px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            z-index: 1;
            min-width: 160px;
            border-radius: 5px;
            text-align: left;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease-in-out;
        }

        .dropdown-content a:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <header>
        <h1>Portfolio</h1>
    </header>

    <section>
        <?php foreach ($users as $user) : ?>
            <div class="portfolio-item">
                <img src="imagen.jpg" alt="<?= $user['name'] ?>">
                <div class="portfolio-details">
                    <h2><?= $user['name'] ?> <?= $user['surname'] ?></h2>
                    <p>Email: <?= $user['email'] ?></p>
                    <p>Categoría Profesional: <?= $user['categoria_profesional'] ?></p>
                    <p>Profile Summary: <?= $user['profile_summary'] ?></p>
                    <a class="portfolio-link" href="/cerrar_sesion">Cerrar Sesion</a>

                    <div class="dropdown">
                        <span>Editar cuenta</span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="portfolio-details">
    <p>Profile Summary: <?= $user['profile_summary'] ?></p>
    <a class="portfolio-link" href="/cerrar_sesion">Cerrar Sesión</a>

    <div class="dropdown">
        <span>Editar cuenta</span>
        <div class="dropdown-content">
            <a href="/borrarUserForm">Borrar usuario</a>
            <a href="/editarUserForm">Editar Cuenta</a>

            <a href="/editarProyectosForm">Editar Proyectos</a>
            <a href="/anadirProyectoForm">Añadir Proyecto</a>

            <a href="/editarSkillsForm">Editar Skills</a>
            <a href="/anadirSkillForm">Añadir Skill</a>

            <a href="/editarRedesSocialesForm">Editar Redes Sociales</a>
            <a href="/anadirRedSocialForm">Añadir Red Social</a>
            <a href="/quitarRedSocialForm">Quitar Red Social</a>

            <a href="/editarTrabajosForm">Editar Trabajos</a>
            <a href="/anadirTrabajoForm">Añadir Trabajo</a>
        </div>
    </div>
</div>
    </section>


</body>
</html>
