<?php
// Incluir a classe Produto
require_once 'db.php';

// Instanciar a classe Produto
$aluno = new Aluno();

// Listar os produtos
$alunos = $aluno->listarProdutos();

?>

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
    <h1>Lista de Produtos</h1>

    <?php if (count($alunos) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($aluno['id']); ?></td>
                        <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
                        <td><?php echo htmlspecialchars($aluno['email']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum produto encontrado.</p>
    <?php endif; ?>
</body>
</html>
