<?php
// Importa a classe Escola
require_once 'db.php';
$disciplinaAtualizada = false;
$disciplinaNaoEncontrada = false;

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados enviados pelo formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $carga_horaria = $_POST['carga_horaria'];

    // Criar uma nova instância da classe Escola
    $escola = new Escola();

    // Verifica se o ID da disciplina foi fornecido
    if (!empty($id)) {
        // Tenta buscar a disciplina pelo ID
        $disciplina = $escola->buscarDisciplinaPorId($id);

        if ($disciplina) {
            // Disciplina encontrada, então atualiza os dados
            $escola->atualizarDisciplina($id, $nome, $carga_horaria);
            $disciplinaAtualizada = true;
        } else {
            // Disciplina não encontrada
            $disciplinaNaoEncontrada = true;
        }
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
    <title>Alterar Disciplina</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php if ($disciplinaAtualizada): ?>
            <div class="alert alert-success" role="alert">
                Disciplina atualizada com sucesso!
            </div>
            <a href="disciplina-alterar.php" class="btn btn-primary">Alterar Outra Disciplina</a>
            <a href="disciplina-listar.php" class="btn btn-secondary">Ver Disciplinas</a>
        <?php elseif ($disciplinaNaoEncontrada): ?>
            <div class="alert alert-danger" role="alert">
                Disciplina não encontrada. Verifique o ID e tente novamente.
            </div>
        <?php endif; ?>

        <h1 class="text-center mb-4">Alterar Disciplina</h1>
        
        <!-- Formulário de Alteração de Disciplina -->
        <form action="disciplina-alterar.php" method="POST" class="border p-4 bg-light rounded">
            
            <!-- ID da Disciplina -->
            <div class="mb-3">
                <label for="id" class="form-label">ID da Disciplina:</label>
                <input type="number" class="form-control" id="id" name="id" placeholder="Digite o ID da disciplina que deseja alterar" required>
            </div>

            <!-- Nome da Disciplina -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Disciplina:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o novo nome da disciplina" required>
            </div>
            
            <!-- Carga Horária da Disciplina -->
            <div class="mb-3">
                <label for="carga_horaria" class="form-label">Carga Horária (em horas):</label>
                <input type="number" class="form-control" id="carga_horaria" name="carga_horaria" placeholder="Digite a nova carga horária" required>
            </div>

            <!-- Botão para Alterar Disciplina -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Alterar Disciplina</button>
            </div>
            
        </form>
    </div>

    <!-- Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
