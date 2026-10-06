<?php
    require "../../autoload.php";

    //Coletar o vaor do id pela URL
    $id = $_GET['id'];

    //Instanciar um objeto da Classe AlunoDAO
    $dao = new TreinoDAO();

    //Invocar o método para excluir
    $dao->destroy($id);

    //Redirecionar para o index
    header('Location:index.php');