<?php

// Esse arquivo pode ser usado pro resto da sua vida, aproveite 

class Conexao {
    private $host = 'localhost'; // Endereço do servidor MySQL
    private $db_name = 'neo_locadora'; // Nome do banco de dados
    private $username = 'root'; // Usuário do banco de dados
    private $password = 'Frozzm0th!'; // Senha do banco de dados
    private $port = '3306';
    private $conn; // Objeto de conexão PDO

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Erro de conexão: ' . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    // ---------------------------------------------------------------------------------
    //Conexão para Categorias

    public function insertCat ($categoria) {
        $sql = "INSERT INTO categoria (categoria_id, nome, ultima_atualizacao) 
        VALUES (:categoria_id, :nome, :ultima_atualizacao);";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":categoria_id", $categoria->getCategoria_id());
        $stmt->bindValue (":nome", $categoria->getNome());
        $stmt->bindValue (":ultima_atualizacao", $categoria->getUltima_atualizacao()->format('Y-m-d H:i:s'));
        return $stmt->execute();
    }

    public function selectAllCat() {
        $sql = "SELECT * FROM categoria;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteCat($categoria_id) {
        $sql = "DELETE FROM categoria WHERE categoria_id = :categoria_id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":categoria_id", $categoria_id);
        return $stmt->execute();
    }

    public function updateCat($categoria) {
        $sql = "UPDATE categoria SET categoria_id = :categoria_id, nome = :nome, ultima_atualizacao = :ultima_atualizacao 
                WHERE categoria_id = :categoria_id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":categoria_id", $categoria->getCategoria_id());
        $stmt->bindValue(":nome", $categoria->getNome());
        $stmt->bindValue(":ultima_atualizacao", $categoria->getUltima_atualizacao()->format('Y-m-d H:i:s'));
        return $stmt->execute();
    }
    
    //--------------------------------------------------------------------------------------
    //Conexão para Atores

    public function insertAt ($ator) {
        $sql = "INSERT INTO ator (ator_id, primeiro_nome, ultimo_nome, ultima_atualizacao) 
        VALUES (:ator_id, :primeiro_nome, :ultimo_nome, :ultima_atualizacao);";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":ator_id", $ator->getAtor_id());
        $stmt->bindValue (":primeiro_nome", $ator->getPrimeiro_nome());
        $stmt->bindValue(":ultimo_nome", $ator->getUltimo_nome());
        $stmt->bindValue (":ultima_atualizacao", $ator->getUltima_atualizacao()->format('Y-m-d H:i:s'));
        return $stmt->execute();
    }

    public function selectAllAt () {
        $sql = "SELECT * FROM ator;";
        $stmt = $this->conn->prepare ($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteAt ($ator_id) {
        $sql = "DELETE FROM ator WHERE ator_id = :ator_id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":ator_id", $ator_id);
        return $stmt->execute();
    }

    public function updateAt ($ator) {
        $sql = "UPDATE ator SET ator_id = :ator_id, primeiro_nome = :primeiro_nome, ultimo_nome = :ultimo_nome 
        WHERE ator_id = :ator_id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":ator_id", $ator->getAtor_id());
        $stmt->bindValue (":primeiro_nome", $ator->getPrimeiro_nome());
        $stmt->bindValue(":ultimo_nome", $ator->getUltimo_nome());
        $stmt->bindValue (":ultima_atualizacao", $ator->getUltima_atualizacao()->format('Y-m-d H:i:s'));
        return $stmt->execute();
    }
}
?>
