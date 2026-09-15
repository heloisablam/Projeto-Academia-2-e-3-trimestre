<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe categoria (bean)
    $categoria = new categoria();

    // Definir os valores dos atributos a partir do form
    $categoria->setDeacricao($_POST['deacricao']);

    // Instanciar um objeto da classe categoriaDAO
    $dao = new categoriaDAO();

    // Invocar o método create
    $dao->create($categoria);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');