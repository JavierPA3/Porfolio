<?php 
namespace App\Models;

require_once __DIR__ . '/DBAbstractModel.php';
class SkillCategory extends DBAsbtractModel
{

    private static $instance;
    private $category;
    private $user_id;

    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new SkillCategory();
        }
        return self::$instance;
    }

    public function get()
    {
        $this->query = "SELECT * FROM skill_categories";
        $this->get_results_from_query();
        return $this->rows ?? null;
    }

    public function set()
{
    $this->query = "INSERT INTO skill_categories (category, user_id) 
                    VALUES (:category, :user_id)";
    
    // Set the query parameters
    $this->params = [
        ':category' => $this->category,
        ':user_id' => $this->user_id,
    ];

    // Output the query and parameters for debugging
    echo "Query: {$this->query}\n";
    echo "Params: " . print_r($this->params, true) . "\n";

    // Use direct parameter binding in the query execution
    $this->get_results_from_query();
}

    public function edit()
    {
        $this->query = "UPDATE skill_categories SET category = :category, user_id = :user_id WHERE id = :id";
        var_dump($this->query);
        $parameters = [
            ':category' => $this->category,
            ':user_id' => $this->user_id,
            ':id' => $this->id
        ];
        var_dump($parameters);
        $this->query = $this->connection->prepare($this->query);
        $this->query->execute($parameters);
        var_dump($this->query);
        return $this->query->rowCount();
    }

    public function delete()
    {
        $this->query = "DELETE FROM skill_categories WHERE id = :id";
        var_dump($this->query);
        $parameters = [':id' => $this->id];
        var_dump($parameters);
        $this->query = $this->connection->prepare($this->query);
        $this->query->execute($parameters);
        var_dump($this->query);
        return $this->query->rowCount();
    }
}