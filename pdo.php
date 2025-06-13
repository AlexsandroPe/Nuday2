<?php 
    class dataBaseModel {
        private $dsn = "mysql:host=127.0.0.1;dbname=eventTech";
        private $user = "root";
        private $password = "A71BCw!";
        private $connection;

        public function __construct() 
        {
            $this->connection = new PDO($this->dsn, $this->user, $this->password);
        }

        public function insertPDO($data)
        {
            $sql = "INSERT INTO usuarios(name, email, telephone) VALUES(:n, :t, :e)";
            $res= $this->connection->prepare($sql); // passar parametro e depois substituir o query quando nao precisa substituir
            
            //forma de substituicao
            
            $res->bindValue(":n", $data->getName());
            $res->bindValue(":t", $data->getTel());
            $res->bindValue(":e", $data->getEmail());

            $res->execute();
        }

        public function getInscritos()
        {
            $sql = "SELECT * FROM usuarios";
            $res= $this->connection->query($sql);
            return $res;
        }

    }


    // criar uma classe model para realizar isso da maneira mais adequada e organizada
    // function ConectDB($name, $email, $telephone) {
    //     $dsn = "mysql:host=127.0.0.1;dbname=eventTech";
    //     $user = "root";
    //     $password = "minhasenha!";
    //     $connection = new PDO($dsn, $user, $password);
        
    //     $sql = "INSERT INTO usuarios(name, email, telephone) VALUES(:n, :t, :e)";

    //     // infos vao estar guardada na res e atraves dela sera possivel a substituicao dos parametros
    //     $res= $connection->prepare($sql); // passar parametro e depois substituir o query quando nao precisa substituir
   
    //     //forma de substituicao 

    //     $res->bindValue(":n", $name);
    //     $res->bindValue(":t", $telephone);
    //     $res->bindValue(":e", $email);

    //     $res->execute(); // executa a insercao
    
    //     // ou bindParam. A diferenca que o param n aceita um valor passado diretamente, somente variaveis e o value aceita tudo;

    //     //ha momentos onde sera mais util usar query momentos como quando precisa passar info diretamente ou tambem quando n tem params pra passar

    //     // $connection->query($sql); // nao precisa do execute();
    
    // }
?>