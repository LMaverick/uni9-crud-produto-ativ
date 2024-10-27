<?php
// Importa a classe Escola
require_once 'db.php';
$disciplinaExcluida = false;
$disciplinaNaoEncontrada = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $id = $_POST['id'];

   
    $escola = new Escola();

    // Verificar se o aluno existe
    $disciplina = $escola->buscarDisciplinaPorId($id);

    if ($disciplina) {
        // Aluno encontrado, então processa a atualização
        $disciplina = $escola->excluirDisciplina($id);

        $disciplinaExcluida = true;
    } else {
        // Aluno não encontrado
        $disciplinaNaoEncontrada = true;
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
        <?php if ($disciplinaExcluida): ?>
            <div class="alert alert-success" role="alert">
                Disciplina excluida com sucesso!
            </div>
            <a href="disciplina-excluir.php" class="btn btn-primary">Excluir Outra Disciplina</a>
            <a href="aluno-listar.php" class="btn btn-secondary">Ver Alunos</a>
        <?php elseif ($disciplinaNaoEncontrada): ?>
            <div class="alert alert-danger" role="alert">
                Disciplina não encontrada. Verifique o ID e tente novamente.
            </div>
        <?php endif; ?>

        <h1 class="text-center mb-4">Excluir Disciplina</h1>
        
        <!-- Formulário de Alteração de Aluno -->
        <form action="disciplina-excluir.php" method="POST" class="border p-4 bg-light rounded">
            
            <!-- ID do Aluno -->
            <div class="mb-3">
                <label for="id" class="form-label">ID da Disciplina:</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="Digite o ID da Disciplina" required>
            </div>



            <!-- Botão para Atualizar Aluno -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Excluir Disciplina</button>
            </div>
            
        </form>
    </div>

    <!-- Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
