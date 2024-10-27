<?php
// Importa a classe Escola
require_once 'db.php';
$avaliacaoAtualizada = false;
$avaliacaoNaoEncontrada = false;

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados enviados pelo formulário
    $id = $_POST['id'];
    $id_aluno = $_POST['id_aluno'];
    $id_disciplina = $_POST['id_disciplina'];
    $nota = $_POST['nota'];
    $data_avaliacao = $_POST['data_avaliacao'];

    // Criar uma nova instância da classe Escola
    $escola = new Escola();

 
        $avaliacao = $escola->buscarAvaliacaoPorId($id);

        if ($avaliacao) {
            // Avaliação encontrada, então atualiza os dados
            $escola->atualizarAvaliacao($id, $id_aluno, $id_disciplina, $nota, $data_avaliacao);
            $avaliacaoAtualizada = true;
        } else {
            // Avaliação não encontrada
            $avaliacaoNaoEncontrada = true;
        }
    

    // Fecha a conexão
    $escola->fecharConexao();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Avaliação</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php if ($avaliacaoAtualizada): ?>
            <div class="alert alert-success" role="alert">
                Avaliação atualizada com sucesso!
            </div>
            <a href="avaliacao-alterar.php" class="btn btn-primary">Alterar Outra Avaliação</a>
            <a href="avaliacao-listar.php" class="btn btn-secondary">Ver Avaliações</a>
        <?php elseif ($avaliacaoNaoEncontrada): ?>
            <div class="alert alert-danger" role="alert">
                Avaliação não encontrada. Verifique o ID e tente novamente.
            </div>
        <?php endif; ?>

        <h1 class="text-center mb-4">Alterar Avaliação</h1>
        
        <!-- Formulário de Alteração de Avaliação -->
        <form action="avaliacao-alterar.php" method="POST" class="border p-4 bg-light rounded">
            
            <!-- ID da Avaliação -->
            <div class="mb-3">
                <label for="id" class="form-label">ID da Avaliação:</label>
                <input type="number" class="form-control" id="id" name="id" placeholder="Digite o ID da avaliação que deseja alterar" required>
            </div>

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
                <input type="number" step="0.1" class="form-control" id="nota" name="nota" placeholder="Digite a nova nota" required>
            </div>

            <!-- Data da Avaliação -->
            <div class="mb-3">
                <label for="data_avaliacao" class="form-label">Data da Avaliação:</label>
                <input type="date" class="form-control" id="data_avaliacao" name="data_avaliacao" required>
            </div>

            <!-- Botão para Alterar Avaliação -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Alterar Avaliação</button>
            </div>
            
        </form>
    </div>

    <!-- Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
