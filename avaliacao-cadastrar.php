<?php
// Importa a classe Avaliacao
require_once 'db.php';
$avaliacaoCadastrada = false;

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados enviados pelo formulário
    $id_aluno = $_POST['id_aluno'];
    $id_disciplina = $_POST['id_disciplina'];
    $nota = $_POST['nota'];
    $data_avaliacao = $_POST['data_avaliacao'];

    // Criar uma nova instância da classe Avaliacao
    $avaliacao = new Escola();

    // Adicionar a nova avaliação no banco de dados
    $avaliacao->adicionarAvaliacao($id_aluno, $id_disciplina, $nota, $data_avaliacao);

    // Fechar a conexão
    $avaliacao->fecharConexao();

    $avaliacaoCadastrada = true;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Avaliação</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php if ($avaliacaoCadastrada): ?>
        <div class="container mt-5">
            <div class="alert alert-success" role="alert">
                Avaliação cadastrada com sucesso!
            </div>
            <a href="avaliacao-cadastrar.php" class="btn btn-primary">Cadastrar Outra Avaliação</a>
            <a href="avaliacao-listar.php" class="btn btn-secondary">Ver Avaliações</a>
        </div>
    <?php endif; ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Cadastro de Avaliação</h1>
        
        <!-- Formulário de Cadastro de Avaliação -->
        <form action="avaliacao-cadastrar.php" method="POST" class="border p-4 bg-light rounded">
            
            <!-- ID do Aluno -->
            <div class="mb-3">
                <label for="id_aluno" class="form-label">ID do Aluno:</label>
                <input type="number" class="form-control" id="id_aluno" name="id_aluno" placeholder="Digite o ID do aluno" required>
            </div>
            
            <!-- ID da Disciplina -->
            <div class="mb-3">
                <label for="id_disciplina" class="form-label">ID da Disciplina:</label>
                <input type="number" class="form-control" id="id_disciplina" name="id_disciplina" placeholder="Digite o ID da disciplina" required>
            </div>

            <!-- Nota -->
            <div class="mb-3">
                <label for="nota" class="form-label">Nota:</label>
                <input type="number" step="0.1" class="form-control" id="nota" name="nota" placeholder="Digite a nota" required>
            </div>

            <!-- Data da Avaliação -->
            <div class="mb-3">
                <label for="data_avaliacao" class="form-label">Data da Avaliação:</label>
                <input type="date" class="form-control" id="data_avaliacao" name="data_avaliacao" required>
            </div>

            <!-- Botão para Adicionar Avaliação -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Cadastrar Avaliação</button>
            </div>
            
        </form>
    </div>

    <!-- Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
