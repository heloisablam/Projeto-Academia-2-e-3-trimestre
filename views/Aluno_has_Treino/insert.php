
<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe Aluno_has_Treino
    $Aluno_has_Treino = new Aluno_has_Treino();

    // Instanciar um objeto da classe Aluno
    $aluno = new Aluno();
    $aluno->setId($_POST['Aluno_idAluno']);

    // Instanciar um objeto da classe Treino
    $treino = new Treino();
    $treino->setId($_POST['Treino_idTreino']);

    // Definir o aluno e o treino
    $Aluno_has_Treino->setAluno($aluno);
    $Aluno_has_Treino->setTreino($treino);

    // Instanciar o DAO
    $dao = new Aluno_has_TreinoDAO();

    // Salvar os dados
    $dao->create($Aluno_has_Treino);

    // Redirecionar para o index
    header('Location: index.php');
    exit;
?>
