<?php

namespace App\Controllers;

use App\Models\User;

class UserAuthController extends BaseController2
{
    public function getProject()
    {
        $user = User::getInstance();
        $users = $user->get();
        $this->renderHTML('new_project.php', ['users' => $users]);
    }

    public function setNewProject() {
        $project = Projects::getInstance();
        $project->setTitle($_POST['title']);
        $project->setDescription($_POST['description']);
        $project->setLogo($_POST['logo']);
        $project->setTechnologies($_POST['technologies']);
        $project->setVisible($_POST['visible']);
        $project->setUserId($_SESSION['user_id']);
        $project->save();
        $this->renderHTML('project_created.php');
    }
}