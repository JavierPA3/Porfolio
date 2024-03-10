<?php
namespace App\Models;

require_once __DIR__ . '/DBAbstractModel.php';

class User extends DBAsbtractModel
{
    private static $instance;
    private $name;
    private $surname;
    private $email;
    private $passwd;

    private $photo;
    private $categoria_profesional;
    private $profile_summary;

    private $id;






    // Métodos públicos para acceder y establecer valores
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setCategoriaProfesional($categoria_profesional)
    {
        $this->categoria_profesional = $categoria_profesional;
    }
    
    public function setProfileSummary($profile_summary)
    {
        $this->profile_summary = $profile_summary;
    }


    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new User();
        }
        return self::$instance;
    }

    public function get()
    {
        $this->query = "SELECT * FROM users";
        $this->get_results_from_query();
        return $this->rows ?? null;
    }
       
    public function set()
{
    $this->query = "INSERT INTO Users (name, surname, email, password) 
                    VALUES (:name, :surname, :email, :password)";
    var_dump($this->query);
    // Set the query parameters

    echo "<br>";

    // Set the query parameters
    var_dump($this->name);
    echo "<br>";
    var_dump($this->surname);
    echo "<br>";

    var_dump($this->email);
    echo "<br>";

    var_dump($this->passwd);
    echo "<br>";

    $this->params = [
        ':name' => $this->name,
        ':surname' => $this->surname,
        ':email' => $this->email,
        ':password' => $this->passwd,
    ];

    echo "Query: {$this->query}\n";
    echo "Params: " . print_r($this->params, true) . "\n";

    $this->get_results_from_query();
}

    
    
    public function saveUser()
    {
        $this->set(); 
    }
    public function save()
    {
        $this->set(); 
    }
    
    // ...

protected function edit()
{
    $this->query = "UPDATE Users
                    SET name = :name,
                        surname = :surname,
                        photo = :photo,
                        categoria_profesional = :categoria_profesional,
                        profile_summary = :profile_summary,
                        password = :password
                    WHERE id = :id";

    $this->params = [
        ':name' => $this->name,
        ':surname' => $this->surname,
        ':photo' => $this->photo,
        ':categoria_profesional' => $this->categoria_profesional,
        ':profile_summary' => $this->profile_summary,
        ':password' => $this->passwd,
        ':id' => $this->id,
    ];

    $this->get_results_from_query();
}

public function update()
{
    $this->edit();
}


   public function getByNameOrEmail($query)
{
    $query = trim($query);
    $this->query = "SELECT * FROM Users WHERE name LIKE :query OR email LIKE :query";
    $this->params = [":query" => "%{$query}%"];
    
    $this->get_results_from_query();
    return $this->rows;
}
    protected function delete()
    {
        $this->query = "DELETE FROM Users WHERE id = :id";
        $this->params = [":id" => $this->id];
        $this->get_results_from_query();
    }
    public function deleteById($id)
    {
        $this->id = $id;
        $this->delete();
    }

    public function getUserById($id)
    {
        $this->query = "SELECT * FROM Users WHERE id = :id";
        $this->parametros = [":id" => $id];
        $this->get_results_from_query();
        return $this->rows;
    }

    private function __construct()
    {
        $this->open_connection();
    }

    public function getUserByEmail($email)
{
    $this->query = "SELECT * FROM Users WHERE email = :email";
    $this->params = [":email" => $email];
    $this->get_results_from_query();
    return $this->rows;
}

public function getUserByUsername($username)
{
    $this->query = "SELECT * FROM Users WHERE username = :username";
    $this->params = [":username" => $username];
    $this->get_results_from_query();
    return $this->rows;
}
public function getDatosUsuario($id)
{
    $this->query = "SELECT * FROM Users WHERE id = :id";
    $this->params = [":id" => $id];
    $this->get_results_from_query();
    return $this->rows;
}
public function getIdByEmail($email)
{
    $this->query = "SELECT id FROM Users WHERE email = :email";
    $this->params = [":email" => $email];
    $this->get_results_from_query();

    return isset($this->rows[0]['id']) ? $this->rows[0]['id'] : null;
}
}