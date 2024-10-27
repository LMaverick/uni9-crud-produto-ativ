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
        $id_aluno = intval($_GET['id']);
        $aluno = $escola->listarAlunos();
        $avaliacoes = $escola->listarAvaliacoesAluno($id_aluno);
    } else {
        echo "<p>ID do aluno não fornecido.</p>";
        exit;
    }

    if ($aluno): ?>
        <h2><?php echo htmlspecialchars($aluno['nome']); ?></h2>
        <p>Email: <?php echo htmlspecialchars($aluno['email']); ?></p>

        <h3>Avaliações</h3>
        <?php if (count($avaliacoes) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Disciplina</th>
                        <th>Nota</th>
                        <th>Data da Avaliação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($avaliacoes as $avaliacao): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($avaliacao['disciplina']); ?></td>
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
    <?php else: ?>
        <p>Aluno não encontrado.</p>
    <?php endif; ?>
</body>
</html>
