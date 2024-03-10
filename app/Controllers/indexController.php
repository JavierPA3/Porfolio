<?php
namespace App\Controllers;
use App\Models\User;


class IndexController extends BaseController
{
    public function IndexAction()
    {
    $this->renderHTML('../app/Views/index_view.php');

    }
    public function userAction()
    {
    $this->renderHTML('../app/Views/index_user.php');

    }
    public function cerrarSesion()
    {
    $this->renderHTML('../app/Views/cerrar_sesion.php');

    }
    public function crearUsuario()
    {
    $this->renderHTML('../app/Views/crear_usuario.php');

    }
    public function inicioAction()
    {
    $this->renderHTML('../app/Views/inicio.php');

    }
    public function createUserAction()
    {
        $this->renderHTML('../app/Views/create_user.php');   
    }
    public function testAction()
    {
        $this->renderHTML('../app/Views/test.php');   
    }
    public function userCreateAction()
    {
        $this->renderHTML('../app/Views/cuenta_creada.php');
    }
    public function userLoginAction()
    {
        $this->renderHTML('../app/Views/index_user.php');
    }
    public function userAccount()
    {
        $this->renderHTML('../app/Views/index_user.php');
    }
    public function acercaAction()
    {
        $this->renderHTML('../app/Views/acercade.php');
    }
}