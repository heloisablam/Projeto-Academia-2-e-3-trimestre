<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Aluno_has_Treino
    $Aluno_has_Treino = new Aluno_has_Treino();

    // Instanciar e definir os dados do aluno
    $aluno = new Aluno();
    $aluno->setId($_POST['aluno_idaluno']);

    // Instanciar e definir os dados do treino
    $treino = new Treino();
    $treino->setId($_POST['treino_idTreino']);

    // Definir os relacionamentos
    $Aluno_has_Treino->setAluno($aluno);
    $Aluno_has_Treino->setTreino($treino);

    // Instanciar um objeto da classe Aluno_has_TreinoDAO
    $dao = new Aluno_has_TreinoDAO();

    // Invocar o método update da classe DAO
    $dao->update(
        $Aluno_has_Treino,
        $_POST['alunoAntigo'],
        $_POST['treinoAntigo']
    );

    // Redirecionar para o index
    header('Location: index.php');
    exit;
?>