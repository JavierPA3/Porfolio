<?php
namespace App\Models;

require_once __DIR__ . '/DBAbstractModel.php';

class Projects extends DBAsbtractModel
{
    private static $instance;
    private $title;
    private $description;
    private $logo;
    private $technologies;
    private $visible;
    private $user_id;

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function setTechnologies($technologies)
    {
        $this->technologies = $technologies;
    }

    public function setVisible($visible)
    {
        $this->visible = $visible;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Projects();
        }
        return self::$instance;
    }

    public function get()
    {
        $this->query = "SELECT * FROM projects";
        $this->get_results_from_query();
        return $this->rows ?? null;
    }

    public function set()
    {
        $this->query = "INSERT INTO projects (title, description, logo, technologies, visible, user_id) 
                        VALUES (:title, :description, :logo, :technologies, :visible, :user_id)";

        $this->params = [
            ':title' => $this->title,
            ':description' => $this->description,
            ':logo' => $this->logo,
            ':technologies' => $this->technologies,
            ':visible' => $this->visible,
            ':user_id' => $this->user_id,
        ];

        echo "Query: {$this->query}\n";
        echo "Params: " . print_r($this->params, true) . "\n";

        $this->get_results_from_query();
    }

    public function saveSet() {
        $this->set();
    }

    public function edit()
    {
        $this->query = "UPDATE projects 
                        SET title = :title, description = :description, logo = :logo, technologies = :technologies, visible = :visible, user_id = :user_id 
                        WHERE id = :id";

        $this->params = [
            ':title' => $this->title,
            ':description' => $this->description,
            ':logo' => $this->logo,
            ':technologies' => $this->technologies,
            ':visible' => $this->visible,
            ':user_id' => $this->user_id,
            ':id' => $this->id,
        ];

        echo "Query: {$this->query}\n";
        echo "Params: " . print_r($this->params, true) . "\n";

        $this->get_results_from_query();
    }

    public function delete()
    {
        $this->query = "DELETE FROM projects WHERE id = :id";

        $this->params = [':id' => $this->id];

        echo "Query: {$this->query}\n";
        echo "Params: " . print_r($this->params, true) . "\n";

        $this->get_results_from_query();
    }
}
