<?php 
class Database {
    private $dsn = "mysql:host=127.0.0.1;dbname=eventTech";
    private $user = "root";
    private $password = "senha!";
    private $connection;

    public function __construct() 
    {
        $this->connection = new PDO($this->dsn, $this->user, $this->password);
    }

    public function insertUser($user)
    {
        $sql = "INSERT INTO usuarios(name, email, telephone) VALUES(:name, :email, :tel)";
        $stmt = $this->connection->prepare($sql);
        
        $stmt->bindValue(":name", $user->getName());
        $stmt->bindValue(":email", $user->getEmail());
        $stmt->bindValue(":tel", $user->getTel());

        $stmt->execute();
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM usuarios";
        $result = $this->connection->query($sql);
        return $result;
    }

    public function deleteUsers()
    {
        // Método ainda não implementado
    }
}
