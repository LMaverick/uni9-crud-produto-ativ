<?php
// Importa a classe Aluno
require_once 'db.php';
$alunoCadastrado = false;

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Criar uma nova instância da classe Aluno
    $escola = new Escola();

    // Adicionar o novo aluno no banco de dados
    $escola->adicionarAluno($nome, $email);

    // Fechar a conexão
    $escola->fecharConexao();

    $alunoCadastrado = true;

    echo "Produto adicionado com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php if ($alunoCadastrado): ?>
        <div class="container mt-5">
            <div class="alert alert-success" role="alert">
                Aluno cadastrado com sucesso!
            </div>
            <a href="aluno-cadastrar.php" class="btn btn-primary">Cadastrar Outro Aluno</a>
            <a href="aluno-listar.php" class="btn btn-secondary">Ver Alunos</a>
        </div>
    <?php endif; ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Cadastro de Aluno</h1>
        
        <!-- Formulário de Cadastro de Aluno -->
        <form action="aluno-cadastrar.php" method="POST" class="border p-4 bg-light rounded">
            
            <!-- Nome do Aluno -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Aluno:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do aluno" required>
            </div>
            
            <!-- Email do Aluno -->
            <div class="mb-3">
                <label for="email" class="form-label">Email do Aluno:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email do aluno" required>
            </div>

            <!-- Botão para Adicionar Aluno -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Cadastrar Aluno</button>
            </div>
            
        </form>
    </div>

    <!-- Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
