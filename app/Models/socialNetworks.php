<?php

namespace App\Models;

require_once __DIR__ . '/DBAbstractModel.php';

class SocialNetworks extends DBAsbtractModel
{
    private static $instance;
    private $name;
    private $url;
    private $visible;
    private $user_id;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setUrl($url)
    {
        $this->url = $url;
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
            self::$instance = new SocialNetworks();
        }
        return self::$instance;
    }

    public function get()
    {
        $this->query = "SELECT * FROM social_networks";
        $this->get_results_from_query();
        return $this->rows ?? null;
    }

    public function set()
{
    $this->query = "INSERT INTO skill_categories (category, user_id) 
                    VALUES (:category, :user_id)";
    
    $this->params = [
        ':category' => $this->category,
        ':user_id' => $this->user_id,
    ];

    echo "Query: {$this->query}\n";
    echo "Params: " . print_r($this->params, true) . "\n";

    $this->get_results_from_query();
}


    public function edit()
    {
        $this->query = "UPDATE social_networks SET name = :name, url = :url, visible = :visible, user_id = :user_id WHERE id = :id";
        $this->execute_query();
    }

    public function delete()
    {
        $this->query = "DELETE FROM social_networks WHERE id = :id";
        $this->execute_query();
    }

    private function execute_query()
    {
        $this->open_connection();
        if ($_stmt = $this->conn->prepare($this->query)) {
            $this->bind_params($_stmt);
            try {
                if (!$_stmt->execute()) {
                    printf("Error executing query: %s\n", $_stmt->errorInfo()[2]);
                }
                $_stmt->closeCursor();
            } catch (PDOException $e) {
                printf("Error executing query: %s\n", $e->getMessage());
            }
        }
        $this->close_connection();
    }

    private function bind_params($_stmt)
    {
        $this->params = [
            ':name' => $this->name,
            ':url' => $this->url,
            ':visible' => $this->visible,
            ':user_id' => $this->user_id,
        ];
        if (!empty($this->params)) {
            foreach ($this->params as $key => $value) {
                $_stmt->bindValue($key, $value);
            }
        }
    }
}
