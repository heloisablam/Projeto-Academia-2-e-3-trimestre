<?php
    require "../../autoload.php";

    // Receber os IDs pela URL
    $alunoId = $_GET['aluno'];
    $treinoId = $_GET['treino'];

    // Instanciar um objeto da classe DAO
    $dao = new Aluno_has_TreinoDAO();

    // Invocar o método destroy
    $dao->destroy($alunoId, $treinoId);

    // Redirecionar para o index
    header('Location: index.php');
    exit;
?>