<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Aluno (bean)
    $aluno = new Aluno();

    //Definir os valores dos atributos a partir dos dados do form
    $aluno->setNome($_POST['nome']);
    $aluno->setCpf($_POST['cpf']);
    $aluno->setTelefone($_POST['telefone']);
    $aluno->setId($_POST['id']);

    //Instanciar um objeto da classe ClienteDAO
    $dao = new AlunoDAO();

    //Invocar o método update da classe DAO
    $dao->update($aluno);

    //Redirecionar para o index
    header('Location: index.php');