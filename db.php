<?php

class Escola {
    private $conn;   
    private $host = 'mysql.jrcf.dev';
    private $db = 'escola';
    private $user = 'usrapp';
    private $pass = '010203';
    
    public function __construct() {
       
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

    
        if ($this->conn->connect_error) {
            die("Erro na conexão: " . $this->conn->connect_error);
        }
    }

    public function adicionarAluno($nome, $email) {
        $sql = "INSERT INTO alunos (nome, email) VALUES (?, ?)";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ss", $nome, $email);
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

    public function adicionarDisciplina($nome, $carga_horaria) {
        $sql = "INSERT INTO disciplinas (nome, carga_horaria) VALUES (?, ?)";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("si", $nome, $carga_horaria);
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

    
    public function adicionarAvaliacao($id_aluno, $id_disciplina, $nota, $data_avaliacao) {
        $sql = "INSERT INTO avaliacoes (aluno_id, disciplina_id, nota, data_avaliacao) VALUES (?, ?, ?, ?)";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("iids", $id_aluno, $id_disciplina, $nota, $data_avaliacao);
            if ($stmt->execute()) {
                echo "Avaliação adicionada com sucesso!";
            } else {
                echo "Erro ao adicionar a avaliação: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    public function listarAvaliacoesAluno($id_aluno) {
        $sql = "
            SELECT d.nome AS disciplina, a.nota, a.data_avaliacao 
            FROM avaliacoes a
            JOIN disciplinas d ON a.disciplina_id = d.id
            WHERE a.aluno_id = ?";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $id_aluno);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $avaliacoes = [];
                while ($row = $result->fetch_assoc()) {
                    $avaliacoes[] = $row;
                }
                return $avaliacoes;
            } else {
                return [];
            }
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }

    public function excluirAluno($id) {
        $sql = "DELETE FROM alunos WHERE id = ?";
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo "Aluno descadastrado com sucesso!";
            } else {
                echo "Erro ao descadastrar o Aluno: " . $this->conn->error;
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
                echo "Disciplina descadastrada com sucesso!";
            } else {
                echo "Erro ao descadastrar a Disciplina: " . $this->conn->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $this->conn->error;
        }
    }


    public function fecharConexao() {
        $this->conn->close();
    }
}
?>
