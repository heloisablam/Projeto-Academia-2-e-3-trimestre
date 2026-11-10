<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe exercicio (bean)
    $exercicio = new Exercicio();

    // Definir os valores dos atributos a partir do form
    $exercicio->setNome($_POST['nome']);
    $exercicio->setDescricao($_POST['Descricao']);
    $exercicio->setId($_POST['id']);

    //Instanciar um objeto da Categoria
    $categoria = new Categoria();
    $categoria->setId($_POST['categoria_idcategoria']);

    //DEfinir a categoria do exercicio
    $exercicio->setCategoria($categoria);

    // Instanciar um objeto da classe exercicioDAO
    $dao = new ExercicioDAO();

    // Invocar o método update
    $dao->update($exercicio);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');