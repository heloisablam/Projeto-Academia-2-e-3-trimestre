<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Treino (bean)
    $Treino = new Treino();

    //Definir os valores dos atributos a partir dos dados do form
    $Treino->setDescricao($_POST['descricao']);
    $Treino->setNome($_POST['nome']);
    $Treino->setId($_POST['id']);

    //Instanciar um objeto da classe ClienteDAO
    $dao = new TreinoDAO();

    //Invocar o método update da classe DAO
    $dao->update($Treino);

    //Redirecionar para o index
    header('Location: index.php');