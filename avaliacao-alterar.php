<?php
require_once 'db.php';

$avaliacaoObj = new Avaliacao(); // Instância da classe Avaliacao

// Verificar se o ID foi enviado e se o formulário foi submetido
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $avaliacaoAlvo = $avaliacaoObj->buscarAvaliacaoPorId($id); // Buscar a avaliação pelo ID

    if (!$avaliacaoAlvo) {
        echo "Avaliação não encontrada!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id_aluno = $_POST['id_aluno'];
    $id_disciplina = $_POST['id_disciplina'];
    $nota = $_POST['nota'];
    $data_avaliacao = $_POST['data_avaliacao'];

    // Chamar o método para alterar a avaliação
    $avaliacaoObj->alterarAvaliacao($id, $id_aluno, $id_disciplina, $nota, $data_avaliacao);
    header("Location: avaliacao-listar.php"); // Redirecionar para a lista de avaliações
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Avaliação</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Alterar Avaliação</h1>

    <form method="POST" class="row g-3">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($avaliacaoAlvo['id']); ?>">

        <div class="col-md-6">
            <label for="id_aluno" class="form-label">ID do Aluno:</label>
            <input type="number" name="id_aluno" class="form-control" value="<?php echo htmlspecialchars($avaliacaoAlvo['aluno_id']); ?>" required>
        </div>

        <div class="col-md-6">
            <label for="id_disciplina" class="form-label">ID da Disciplina:</label>
            <input type="number" name="id_disciplina" class="form-control" value="<?php echo htmlspecialchars($avaliacaoAlvo['disciplina_id']); ?>" required>
        </div>

        <div class="col-md-6">
            <label for="nota" class="form-label">Nota:</label>
            <input type="number" step="0.1" name="nota" class="form-control" value="<?php echo htmlspecialchars($avaliacaoAlvo['nota']); ?>" required>
        </div>

        <div class="col-md-6">
            <label for="data_avaliacao" class="form-label">Data da Avaliação:</label>
            <input type="date" name="data_avaliacao" class="form-control" value="<?php echo htmlspecialchars($avaliacaoAlvo['data_avaliacao']); ?>" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Salvar Alterações</button>
        </div>

        <div class="col-12 text-center">
            <a href="avaliacao-listar.php" class="btn btn-secondary mt-3">Voltar à Lista</a>
        </div>
    </form>
</div>

<!-- Incluir Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
