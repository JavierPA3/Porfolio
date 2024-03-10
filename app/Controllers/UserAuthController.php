<?php

namespace App\Controllers;

use App\Models\User;

class UserAuthController extends BaseController2
{
    public function userLoginAction()
    {
        $email = $_POST['Email'];
        $passwd = $_POST['password'];
        $user = User::getInstance();
        $users = $user->get();
    
        foreach ($users as $userData) {
            if ($userData['email'] == $email && $userData['password'] == $passwd) {
                $userId = $user->getIdByEmail($email);
    
                $_SESSION['perfil'] = "usuario";
                $_SESSION['user_id'] = $userId;
                $_SESSION['email'] = $email;
                $_SESSION['perfil'] = $userData['perfil'];
    
                header('Location: /userAccount');
                return;
            }
        }
    
        echo "Invalid email or password";
    }
    
    public function displayUserDataAction()
    {
        $userModel = User::getInstance();
        $users = $userModel->getDatosUsuario($_SESSION['user_id']);
        $this->renderHTML('index_user.php', ['users' => $users]);
    }
    
}
