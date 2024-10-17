<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento Escolar</title>
    <style>
        .button-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h1>Bem-vindo ao Sistema de Gerenciamento Escolar</h1>

    <div class="button-container">
        <button onclick="window.location.href='aluno-cadastrar.php';">Cadastrar Aluno</button>
        <button onclick="window.location.href='aluno-listar.php';">Listar Alunos</button>
        <button onclick="window.location.href='disciplina-cadastrar.php';">Cadastrar Disciplina</button>
        <button onclick="window.location.href='disciplina-listar.php';">Listar Disciplinas</button>
        <button onclick="window.location.href='avaliacao-cadastrar.php';">Cadastrar Avaliação</button>
        <button onclick="window.location.href='avaliacao-listar.php';">Listar Avaliações</button>
    </div>

</body>
</html>
