<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe Treino (bean)
    $Treino = new Treino();

    // Definir os valores dos atributos a partir do form
    $Treino->setNome($_POST['nome']);
    $Treino->setDescricao($_POST['descricao']);

    // Instanciar um objeto da classe TreinoDAO
    $dao = new TreinoDAO();

    // Invocar o método create
    $dao->create($Treino);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');