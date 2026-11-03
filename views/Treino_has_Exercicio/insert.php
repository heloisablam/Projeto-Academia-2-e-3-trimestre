<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe Treino_has_Exercicio
    $Treino_has_Exercicio = new Treino_has_Exercicio();

    // Definir os valores dos atributos
    $Treino_has_Exercicio->setNome($_POST['nome']);
    $Treino_has_Exercicio->setDescricao($_POST['Descricao']);

    // Instanciar um objeto da classe Treino
    $treino = new Treino();
    $treino->setId($_POST['Treino_idTreino']);

    // Instanciar um objeto da classe Exercicio
    $exercicio = new Exercicio();
    $exercicio->setId($_POST['Exercicio_idExercicio']);

    // Definir o treino e o exercício
    $Treino_has_Exercicio->setTreino($treino);
    $Treino_has_Exercicio->setExercicio($exercicio);

    // Instanciar um objeto da classe DAO
    $dao = new Treino_has_ExercicioDAO();

    // Invocar o método create
    $dao->create($Treino_has_Exercicio);

    // Redirecionar para o index
    header('Location: index.php');
    exit;
?>