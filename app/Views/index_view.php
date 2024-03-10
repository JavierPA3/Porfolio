
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
        }

        form {
            background-color: #0074cc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
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
            padding: 10px 20px;
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
    <h1>Login</h1>
    <form action="/checkUserData" method="post">
        <input type="text" name="Email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Login">
    </form>
    <div id="navegador">
        <div><a href="/listar_usuarios">⬅️</a></div>
    </div></body>
</html>