<?php
// Importa a classe Escola
require_once 'db.php';
$alunoAtualizado = false;
$alunoNaoEncontrado = false;

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega o ID do aluno
    $id = $_POST['id'];

    // Criar uma nova instância da classe Escola
    $escola = new Escola();

    // Verificar se o aluno existe
    $aluno = $escola->buscarAlunoPorId($id);

    if ($aluno) {
        // Aluno encontrado, então processa a atualização
        $aluno = $escola->excluirAluno($id);

        $alunoAtualizado = true;
    } else {
        // Aluno não encontrado
        $alunoNaoEncontrado = true;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php if ($alunoAtualizado): ?>
            <div class="alert alert-success" role="alert">
                Aluno excluido com sucesso!
            </div>
            <a href="aluno-excluir.php" class="btn btn-primary">Excluir Outro Aluno</a>
            <a href="aluno-listar.php" class="btn btn-secondary">Ver Alunos</a>
        <?php elseif ($alunoNaoEncontrado): ?>
            <div class="alert alert-danger" role="alert">
                Aluno não encontrado. Verifique o ID e tente novamente.
            </div>
        <?php endif; ?>

        <h1 class="text-center mb-4">Excluir Dados do Aluno</h1>
        
        <!-- Formulário de Alteração de Aluno -->
        <form action="aluno-excluir.php" method="POST" class="border p-4 bg-light rounded">
            
            <!-- ID do Aluno -->
            <div class="mb-3">
                <label for="id" class="form-label">ID do Aluno:</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="Digite o ID do aluno" required>
            </div>



            <!-- Botão para Atualizar Aluno -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Atualizar Aluno</button>
            </div>
            
        </form>
    </div>

    <!-- Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
