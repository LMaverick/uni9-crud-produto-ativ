<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
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
    <h1>Lista de Disciplinas</h1>

    <?php
    // Incluir o arquivo com a classe Escola
    require_once 'db.php';
    $escola = new Escola();
    $disciplina = $escola->listarDisciplinas();

    if (count($disciplina) > 0): ?>
        <table>
            <thead>
                <tr>
                <th>ID</th>
                    <th>Materia</th>
                    <th>Carga horaria</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($disciplina as $disciplina): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($disciplina['id']); ?></td>
                        <td>
                            <!-- Nome do aluno como link -->
                            <a href="disciplina-detalhes.php?id=<?php echo $disciplina['id']; ?>">
                                <?php echo htmlspecialchars($disciplina['nome']); ?>
                            </a>
                        </td>
                        <td><?php echo htmlspecialchars($disciplina['carga_horaria']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum aluno encontrado.</p>
    <?php endif; ?>
</body>
</html>
