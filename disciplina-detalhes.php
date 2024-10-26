<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Aluno</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Detalhes do Aluno</h1>

    <?php
    // Incluir o arquivo com a classe Escola
    require_once 'db.php';
    $escola = new Escola();

    // Verificar se o ID do aluno foi passado via GET
    if (isset($_GET['id'])) {
        $id_disciplina = intval($_GET['id']);
        $disciplina = $escola->listarDisciplinas();
 
    } else {
        echo "<p>ID do aluno não fornecido.</p>";
        exit;
    }

    if ($aluno): ?>
        <h2><?php echo htmlspecialchars($disciplina['materia']); ?></h2>
        <p>Email: <?php echo htmlspecialchars($disciplina['carga_horaria']); ?></p>

      
    <?php else: ?>
        <p>Disciplina não encontrada.</p>
    <?php endif; ?>
</body>
</html>
