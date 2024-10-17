<?php
require_once 'db.php';

$alunoObj = new Aluno(); // Instância da classe Aluno

// Verificar se o ID foi enviado e se o formulário foi submetido
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $alunoAlvo = $alunoObj->buscarAlunoPorId($id); // Buscar o aluno pelo ID

    if (!$alunoAlvo) {
        echo "Aluno não encontrado!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Chamar o método para alterar o aluno
    $alunoObj->alterarAluno($id, $nome, $email);
    header("Location: aluno-listar.php"); // Redirecionar para a lista de alunos
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Aluno</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Alterar Aluno</h1>

    <form method="POST" class="row g-3">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($alunoAlvo['id']); ?>">

        <div class="col-md-6">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" value="<?php echo htmlspecialchars($alunoAlvo['nome']); ?>" required>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($alunoAlvo['email']); ?>" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Salvar Alterações</button>
        </div>

        <div class="col-12 text-center">
            <a href="aluno-listar.php" class="btn btn-secondary mt-3">Voltar à Lista</a>
        </div>
    </form>
</div>

<!-- Incluir Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
