<?php
    require "../../autoload.php";

    $exercicioId = $_GET['exercicio'];
    $treinoId = $_GET['treino'];

    // Instanciar um objeto da classe DAO
    $dao = new Aluno_has_TreinoDAO();

    // Invocar o método destroy
    $dao->destroy($alunoId, $treinoId);

    // Redirecionar para o index
    header('Location: index.php');
    exit;
?>