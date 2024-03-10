<?php

namespace App\Controllers;

use App\Models\User;
use App\Controllers\BaseController2;
use Symfony\Component\HttpFoundation\Request;

class UserController extends BaseController2
{
   // En UserController.php
   // En UserController.php
public function listUsersAction()
{
    $userModel = User::getInstance();
    $users = $userModel->get();
    $this->renderHTML('list.php', ['users' => $users]);
}
   
    public function showUserAction($userId)
    {
        $userModel = User::getInstance();
        $user = $userModel->getUserById($userId);

        $this->renderHTML('../app/Views/show.php', ['user' => $user]);
    }
    public function searchAction($query)
{
    $parsedQuery = parse_url($query);
    $queryParameters = [];
    if (isset($parsedQuery['query'])) {
        parse_str($parsedQuery['query'], $queryParameters);
    }
    $name = isset($queryParameters['query']) ? $queryParameters['query'] : '';

    $userModel = User::getInstance();
    $users = $userModel->getByNameOrEmail($name);

    $this->renderHTML('list.php', ['users' => $users]);
}

    public function createUserAction()
    {
        $this->renderHTML('../app/Views/create_user.php', ['user' => null]);   
    }
   
    public function saveUserAction()
    {
        if (isset($_POST["enviar"])) {
            $userModel = User::getInstance();

            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $userModel->setName($name);
            $userModel->setSurname($surname);
            $userModel->setEmail($email);
            $userModel->setPasswd($password);
            $userModel->saveUser();

            header("Location: /userCreated");
            exit;
        }

        $this->renderHTML("../Views/cuenta_creada.php");
    }
  
    public function editUserAction() {
        $userModel = User::getInstance();
        $users = $userModel->getDatosUsuario($_SESSION['user_id']);
        $this->renderHTML('edit_user.php', ['users' => $users]); 
    }
    public function testAction() {

        $this->renderHTML('test.php'); 
    }
    public function updateUserAction() {

        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $password = $_POST["password"];
        $photo = $_POST["photo"];
        $categoria_profesional = $_POST["categoria_profesional"];
        $profile_summary = $_POST["profile_summary"];

        $user = User::getInstance();

        
        $user->setName($name);
        $user->setSurname($surname);
        $user->setPhoto($photo);
        $user->setCategoriaProfesional($categoria_profesional);
        $user->setProfileSummary($profile_summary);
        $user->setPasswd($password);
        $user->setId($_SESSION['user_id']);
        
        $user->update();
        header("Location: /userAccount");
    }
    public function deleteUserAction() {

        $user = User::getInstance();
        $user->setId($_SESSION['user_id']);
        $user->deleteById($_SESSION['user_id']);
        header("Location: /cerrar_sesion");
    }
    
}
