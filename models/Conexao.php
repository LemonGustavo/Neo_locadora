<?php

// Esse arquivo pode ser usado pro resto da sua vida, aproveite 

class Conexao {
    private $host = 'localhost'; // Endereço do servidor MySQL
    private $db_name = 'neo_locadora'; // Nome do banco de dados
    private $username = 'root'; // Usuário do banco de dados
    private $password = ''; // Senha do banco de dados
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

    public function insert ($ator) {
        $sql = "INSERT INTO ator (ator_id, primeiro_nome, ultimo_nome, ultima_atualizacao) 
        VALUES (:ator_id, :primeiro_nome, :ultimo_nome, :ultima_atualizacao);";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":ator_id", $ator->getAtor_id());
        $stmt->bindValue (":primeiro_nome", $ator->getPrimeiro_nome());
        $stmt->bindValue(":ultimo_nome", $ator->getUltimo_nome());
        $stmt->bindValue (":ultima_atualizacao", $ator->getUltima_atualizacao()->format('Y-m-d H:i:s'));
        return $stmt->execute();
    }

    public function selectAll() {
        $sql = "SELECT * FROM ator;";
        $stmt = $this->conn->prepare ($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($ator_id) {
        $sql = "DELETE FROM ator WHERE ator_id = :ator_id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":ator_id", $ator_id);
        return $stmt->execute();
    }

    public function update ($ator) {
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
