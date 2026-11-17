<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar o DAO
    $dao = new Treino_has_ExercicioDAO();

    // Receber os IDs do Treino e do Exercício
    $treino = $_GET['treino'];
    $exercicio = $_GET['exercicio'];

    // Excluir o registro
    $dao->destroy($treino, $exercicio);

    // Redirecionar para o index
    header("Location: index.php");
    exit;
?>