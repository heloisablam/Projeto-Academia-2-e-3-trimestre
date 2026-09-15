<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe aluno (bean)
    $aluno = new aluno();

    // Definir os valores dos atributos a partir do form
    $aluno->setNome($_POST['nome']);
    $aluno->setCpf($_POST['cpf']);
    $aluno->setTelefone($_POST['telefone']);

    // Instanciar um objeto da classe alunoDAO
    $dao = new AlunoDAO();

    // Invocar o método create
    $dao->create($aluno);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');