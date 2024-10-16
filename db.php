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
    public function adicionarAluno( $nome, $email) {
        $sql = "INSERT INTO alunos (id, nome, email) VALUES (?, ?, ?)";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssdi", $nome, $email);
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
            $alunos = [];
            while ($row = $result->fetch_assoc()) {
                $alunos[] = $row;
            }
            return $alunos;
        } else {
            return [];
        }
    }

    // Método para alterar um aluno
    public function alterarAluno($id, $nome, $email) {
        $sql = "UPDATE alunos SET nome = ?, email = ? WHERE id = ?";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssdii", $nome,$email,$id);
            if ($stmt->execute()) {
                echo "aluno atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar o aluno: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    // Método para excluir um produto
    public function excluirAluno($id) {
        $sql = "DELETE FROM alunos WHERE id = ?";
      
        
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



    public function adicionarDiciplina($nome, $carga_horaria){

        $sql = "INSERT INTO disciplinas(nome,carga_horaria) VALUES (?,?)";
    
    
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssdi", $nome, $carga_horaria);
            if ($stmt->execute()) {
                echo "Disciplina adicionada com sucesso!";
            } else {
                echo "Erro ao adicionar a disciplina: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }
    

    public function listarDisciplinas() {
        $sql = "SELECT * FROM disciplinas";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $disciplinas = [];
            while ($row = $result->fetch_assoc()) {
                $disciplinas[] = $row;
            }
            return $disciplinas;
        } else {
            return [];
        }
    }


    public function alterarDisciplina($id, $nome, $carga_horaria) {
        $sql = "UPDATE disciplinas SET nome = ?,carga_horaria = ? WHERE id = ?";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssdii", $nome,$carga_horaria,$id);
            if ($stmt->execute()) {
                echo "Disciplina atualizada com sucesso!";
            } else {
                echo "Erro ao atualizar a Disciplina: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }



    public function excluirDisciplina($id) {
        $sql = "DELETE FROM disciplinas WHERE id = ?";
      
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo "disciplina Descadastrada com sucesso!";
            } else {
                echo "Erro ao Descadastrar a Disciplina: " . $this->conn->error;
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
