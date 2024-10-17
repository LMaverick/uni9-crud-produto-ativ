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
    <h1>Lista de Alunos</h1>

    <?php
    // Incluir o arquivo com a classe Escola
    require_once 'db.php';
    $escola = new Escola();
    $alunos = $escola->listarAlunos();

    if (count($alunos) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($aluno['id']); ?></td>
                        <td>
                            <!-- Nome do aluno como link -->
                            <a href="aluno-detalhes.php?id=<?php echo $aluno['id']; ?>">
                                <?php echo htmlspecialchars($aluno['nome']); ?>
                            </a>
                        </td>
                        <td><?php echo htmlspecialchars($aluno['email']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum aluno encontrado.</p>
    <?php endif; ?>
</body>
</html>
