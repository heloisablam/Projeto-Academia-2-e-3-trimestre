<?php
    require "../../autoload.php";

    // Instanciar o objeto
    $Treino_has_Exercicio = new Treino_has_Exercicio();

    // Definir os valores dos atributos
    $Treino_has_Exercicio->setSeries($_POST['Series']);
    $Treino_has_Exercicio->setRepeticao($_POST['Repeticao']);

    // Instanciar e definir o Treino
    $treino = new Treino();
    $treino->setId($_POST['Treino_idTreino']);
    $Treino_has_Exercicio->setTreino($treino);

    // Instanciar e definir o Exercício
    $exercicio = new Exercicio();
    $exercicio->setId($_POST['Exercicio_idExercicio']);
    $Treino_has_Exercicio->setExercicio($exercicio);

    // Instanciar o DAO
    $dao = new Treino_has_ExercicioDAO();

    // Atualizar os dados
    $dao->update(
        $Treino_has_Exercicio,
        $_POST['treinoAntigo'],
        $_POST['exercicioAntigo']
    );

    // Redirecionar para o index
    header("Location: index.php");
    exit;
?>