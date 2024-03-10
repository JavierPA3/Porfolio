<?php
require_once "../vendor/autoload.php";
use App\Core\Router;
use App\Controllers\IndexController;
use App\Controllers\UserController;
use App\Controllers\UserAuthController;


require "../bootstrap.php";

session_start();

if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = "invitado";
}

$router = new Router();
$router->add(array(
    "name" => "home",
    "path" => "/^\/$/",
    "action" => [IndexController::class, "inicioAction"],
    "auth" => ["invitado", "admin"]
));
$router->add(array(
    "name" => "list_users",
    "path" => "/^\/listar_usuarios$/",
    "action" => [UserController::class, "listUsersAction"],
    "auth" => ["invitado", "admin"]
));

$router->add(array(
    "name" => "Login",
    "path" => "/^\/login$/",
    "action" => [IndexController::class, "indexAction"],
    "auth" => ["invitado", "admin"]
));
$router->add(array(
    "name" => "cerrarSesion",
    "path" => "/^\/cerrar_sesion$/",
    "action" => [IndexController::class, "cerrarSesion"],
    "auth" => ["invitado", "admin"]
));
$router->add(array(
    "name" => "createUser",
    "path" => "/^\/register$/",
    "action" => [IndexController::class, "createUserAction"],
    "auth" => ["invitado", "admin"]
));
$router->add(array(
    "name" => "saveUser",
    "path" => "/^\/register_set$/",
    "action" => [UserController::class, "saveUserAction"],
    "auth" => ["invitado", "admin"]
));
$router->add(array(
    "name" => "userCreate",
    "path" => "/^\/userCreated$/",
    "action" => [IndexController::class, "userCreateAction"],
    "auth" => ["invitado", "admin"]
));

$router->add(array(
    "name" => "userLogin",
    "path" => "/^\/user$/",
    "action" => [IndexController::class, "userLoginAction"],
    "auth" => ["invitado", "admin"]
));
$router->add(array(
    "name" => "userLogin",
    "path" => "/^\/checkUserData$/",
    "action" => [UserAuthController::class, "userLoginAction"],
    "auth" => ["invitado", "admin"]
));
$router->add(array(
    "name" => "display",
    "path" => "/^\/userAccount$/",
    "action" => [UserAuthController::class, "displayUserDataAction"],
    "auth" => ["invitado", "admin"]
));
$router->add(array(
    "name" => "editUser",
    "path" => "/^\/editarUserForm$/",
    "action" => [UserController::class, "editUserAction"],
    "auth" => ["invitado", "admin"]
));
$router->add(array(
    "name" => "updateUser",
    "path" => "/^\/editUserData$/",
    "action" => [UserController::class, "updateUserAction"],
    "auth" => ["invitado", "admin"]
));

$router->add(array(
    "name" => "user",
    "path" => "/^\/borrarUserForm$/",
    "action" => [UserController::class, "deleteUserAction"],
    "auth" => ["invitado", "admin"]
));
$router->add(array(
    "name" => "user",
    "path" => "/^\/SobreNosotros$/",
    "action" => [IndexController::class, "acercaAction"],
    "auth" => ["invitado", "admin"]
));
$router->add(array(
    "name" => "buscador",
    "path" => "~^/search\?query=.+~",
    "action" => [UserController::class, "searchAction"],
    "auth" => ["invitado", "admin"]
));
$router->add(array(
    "name" => "user",
    "path" => "/^\/editarProyectosForm$/",
    "action" => [IndexController::class, "editarProyectosAction"],
    "auth" => ["usuario", "admin"]
));
$router->add(array(
    "name" => "user",
    "path" => "/^\/anadirProyectoForm$/",
    "action" => [IndexController::class, "anadirProyectoAction"],
    "auth" => ["usuario", "admin"]
));
$request = $_SERVER['REQUEST_URI'];
$route = $router->match($request);

if ($route) {
    if (in_array($_SESSION['perfil'], $route['auth'])) {
        $className = $route['action'][0];
        $classMethod = $route['action'][1];
        $object = new $className;
        $object->$classMethod($request);
    } else {
        exit(http_response_code(401));
    }
} else {
    exit(http_response_code(404));
}
?>
