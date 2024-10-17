<?php
require_once 'db.php';

$disciplinaObj = new Disciplina(); // Instância da classe Disciplina

// Verificar se o ID foi enviado e se o formulário foi submetido
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $disciplinaAlvo = $disciplinaObj->buscarDisciplinaPorId($id); // Buscar a disciplina pelo ID

    if (!$disciplinaAlvo) {
        echo "Disciplina não encontrada!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $carga_horaria = $_POST['carga_horaria'];

    // Chamar o método para alterar a disciplina
    $disciplinaObj->alterarDisciplina($id, $nome, $carga_horaria);
    header("Location: disciplina-listar.php"); // Redirecionar para a lista de disciplinas
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Disciplina</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Alterar Disciplina</h1>

    <form method="POST" class="row g-3">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($disciplinaAlvo['id']); ?>">

        <div class="col-md-6">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" value="<?php echo htmlspecialchars($disciplinaAlvo['nome']); ?>" required>
        </div>

        <div class="col-md-6">
            <label for="carga_horaria" class="form-label">Carga Horária:</label>
            <input type="number" name="carga_horaria" class="form-control" value="<?php echo htmlspecialchars($disciplinaAlvo['carga_horaria']); ?>" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Salvar Alterações</button>
        </div>

        <div class="col-12 text-center">
            <a href="disciplina-listar.php" class="btn btn-secondary mt-3">Voltar à Lista</a>
        </div>
    </form>
</div>

<!-- Incluir Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
