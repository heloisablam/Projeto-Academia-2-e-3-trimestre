<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe categoria (bean)
    $categoria = new categoria();

    //Definir os valores dos atributos a partir dos dados do form
    $categoria->setDeacricao($_POST['deacricao']);
    $categoria->setId($_POST['id']);

    //Instanciar um objeto da classe ClienteDAO
    $dao = new CategoriaDAO();

    //Invocar o método update da classe DAO
    $dao->update($categoria);

    //Redirecionar para o index
    header('Location: index.php');