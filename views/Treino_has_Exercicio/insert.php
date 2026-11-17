<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe Treino_has_Exercicio
    $Treino_has_Exercicio = new Treino_has_Exercicio();

    // Definir os valores dos atributos
    $Treino_has_Exercicio->setSeries($_POST['Series']);
    $Treino_has_Exercicio->setRepeticao($_POST['Repeticao']);

    // Instanciar um objeto da classe Treino
    $treino = new Treino();
    $treino->setId($_POST['Treino_idTreino']);
    $Treino_has_Exercicio->setTreino($treino);

    // Instanciar um objeto da classe Exercicio
    $exercicio = new Exercicio();
    $exercicio->setId($_POST['Exercicio_idExercicio']);
    $Treino_has_Exercicio->setExercicio($exercicio);

    // Instanciar o DAO
    $dao = new Treino_has_ExercicioDAO();

    // Inserir os dados
    $dao->create($Treino_has_Exercicio);

    // Redirecionar para o index
    header("Location: index.php");
    exit;
?>