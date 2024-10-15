<?php

class Produto {
    private $conn;   
    private $host = "mysql.jrcf.dev";
    private $db = "escola";
    private $user = "usrapp";
    private $pass = "010203";
    
    public function __construct() {
        // Criar conexão com o banco de dados
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        // Verificar se houve erro na conexão
        if ($this->conn->connect_error) {
            die("Erro na conexão: " . $this->conn->connect_error);
        }
    }
    
    // Método para adicionar um novo produto
    public function adicionarAluno($id_aluno, $nome, $email) {
        $sql = "INSERT INTO alunos (id, nome, email) VALUES (?, ?, ?)";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssdi", $id_aluno, $nome, $email);
            if ($stmt->execute()) {
                echo "Aluno adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar o Aluno: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    // Método para listar todos os Alunos
    public function listarAlunos() {
        $sql = "SELECT * FROM alunos";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $id_aluno = [];
            while ($row = $result->fetch_assoc()) {
                $id_aluno[] = $row;
            }
            return $id_aluno;
        } else {
            return [];
        }
    }

    // Método para alterar um aluno
    public function alterarAluno($id_aluno, $nome, $email) {
        $sql = "UPDATE alunos SET id_aluno = ?, nome = ?, email = ? WHERE id = ?";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssdii",$id_aluno, $nome, $email, $id);
            if ($stmt->execute()) {
                echo "Produto atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar o produto: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    // Método para excluir um produto
    public function excluirAluno($id) {
        $sql = "DELETE FROM produtos WHERE id = ?";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo "Aluno Descadastrado com sucesso!";
            } else {
                echo "Erro ao Descadastrar o Aluno: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    // Fechar a conexão com o banco de dados
    public function fecharConexao() {
        $this->conn->close();
    }
}
?>
