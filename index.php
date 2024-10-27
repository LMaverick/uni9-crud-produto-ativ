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

    <h2>Alunos</h2>
    <div class="button-container">
        <button onclick="window.location.href='aluno-cadastrar.php';">Cadastrar Aluno</button>
        <button onclick="window.location.href='aluno-listar.php';">Listar Alunos</button>
        <button onclick="window.location.href='aluno-alterar.php';">Alterar Aluno</button>
        <button onclick="window.location.href='aluno-excluir.php';">excluir Aluno</button>
     
    </div>

    <h2>Disciplinas</h2>

    <div class="button-container">
       
        <button onclick="window.location.href='disciplina-cadastrar.php';">Cadastrar Disciplina</button>
        <button onclick="window.location.href='disciplina-listar.php';">Listar Disciplinas</button>
        <button onclick="window.location.href='disciplina-alterar.php';">Alterar Disciplina</button>
        <button onclick="window.location.href='disciplina-excluir.php';">excluir disciplina</button>

    </div>

    <h2>Avaliações</h2>

    <div class="button-container">
       
        <button onclick="window.location.href='avaliacao-cadastrar.php';">Cadastrar Avaliação</button>
        <button onclick="window.location.href='avaliacao-listar.php';">Listar Avaliações</button>
        <button onclick="window.location.href='avaliacao-alterar.php';">Alterar avaliação</button>
        <button onclick="window.location.href='avaliacao-excluir.php';">excluir Avaliação</button>
    </div>

</body>
</html>
