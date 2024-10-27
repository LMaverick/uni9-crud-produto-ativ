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
    <h1>Lista de Avaliações</h1>

    <?php
    // Incluir o arquivo com a classe Escola
    require_once 'db.php';
    $escola = new Escola();
    $avaliacoes = $escola->listarAvaliacoes();

    if (count($avaliacoes) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID do aluno</th>
                    <th>ID da disciplina</th>
                    <th>Nota</th>
                    <th>Data da avaliação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($avaliacoes as $avaliacao): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($avaliacao['id']); ?></td>
                        <td><?php echo htmlspecialchars($avaliacao['aluno_id']); ?></td>
                        <td><?php echo htmlspecialchars($avaliacao['disciplina_id']); ?></td>
                        <td><?php echo htmlspecialchars($avaliacao['nota']); ?></td>
                        <td>
                         <?php
                             $dataAvaliacao = new DateTime($avaliacao['data_avaliacao']);
                                 echo htmlspecialchars($dataAvaliacao->format('d/m/Y'));
                        ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhuma avaliação encontrada.</p>
    <?php endif; ?>
</body>
</html>
