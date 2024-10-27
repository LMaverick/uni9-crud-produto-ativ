<?php
// Importa a classe Escola
require_once 'db.php';
$avaliacaoExcluida = false;
$avaliacaoNaoEncontrada = false;

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $id = $_POST['id'];

   
    $escola = new Escola();

 
        $avaliacao = $escola->buscarAvaliacaoPorId($id);

        if ($avaliacao) {
            // Avaliação encontrada, então atualiza os dados
            $escola->excluirAvaliacao($id);
            $avaliacaoExcluida = true;
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
    <title>Excluir Avaliação</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php if ($avaliacaoExcluida): ?>
            <div class="alert alert-success" role="alert">
                Avaliação excluida com sucesso!
            </div>
            <a href="avaliacao-excluir.php" class="btn btn-primary">Excluir Outra Avaliação</a>
            <a href="avaliacao-listar.php" class="btn btn-secondary">Ver Alunos</a>
        <?php elseif ($avaliacaoNaoEncontrada): ?>
            <div class="alert alert-danger" role="alert">
                Avaliação não encontrada. Verifique o ID e tente novamente.
            </div>
        <?php endif; ?>

        <h1 class="text-center mb-4">Excluir Avaliação</h1>
        
        <!-- Formulário de Alteração de Aluno -->
        <form action="avaliacao-excluir.php" method="POST" class="border p-4 bg-light rounded">
            
            <!-- ID do Aluno -->
            <div class="mb-3">
                <label for="id" class="form-label">ID da Avaliação:</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="Digite o ID da Avaliação" required>
            </div>



            <!-- Botão para Atualizar Aluno -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Excluir Avaliação</button>
            </div>
            
        </form>
    </div>

    <!-- Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
