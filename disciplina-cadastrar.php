<?php
// Importa a classe Disciplina
require_once 'db.php';
$disciplinaCadastrada = false;

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $carga_horaria = $_POST['carga_horaria'];

    // Criar uma nova instância da classe Disciplina
    $disciplina = new Disciplina();

    // Adicionar a nova disciplina no banco de dados
    $disciplina->adicionarDisciplina($nome, $carga_horaria);

    // Fechar a conexão
    $disciplina->fecharConexao();

    $disciplinaCadastrada = true;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Disciplina</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php if ($disciplinaCadastrada): ?>
        <div class="container mt-5">
            <div class="alert alert-success" role="alert">
                Disciplina cadastrada com sucesso!
            </div>
            <a href="disciplina-cadastrar.php" class="btn btn-primary">Cadastrar Outra Disciplina</a>
            <a href="disciplina-listar.php" class="btn btn-secondary">Ver Disciplinas</a>
        </div>
    <?php endif; ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Cadastro de Disciplina</h1>
        
        <!-- Formulário de Cadastro de Disciplina -->
        <form action="disciplina-cadastrar.php" method="POST" class="border p-4 bg-light rounded">
            
            <!-- Nome da Disciplina -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Disciplina:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da disciplina" required>
            </div>
            
            <!-- Carga Horária da Disciplina -->
            <div class="mb-3">
                <label for="carga_horaria" class="form-label">Carga Horária (em horas):</label>
                <input type="number" class="form-control" id="carga_horaria" name="carga_horaria" placeholder="Digite a carga horária" required>
            </div>

            <!-- Botão para Adicionar Disciplina -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Cadastrar Disciplina</button>
            </div>
            
        </form>
    </div>

    <!-- Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
