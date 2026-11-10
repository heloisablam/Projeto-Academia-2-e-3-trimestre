
<?php
class Treino_has_ExercicioDAO {

    public function create($Treino_has_Exercicio) {
        try {
            $query = BD::getConexao()->prepare(
                "INSERT INTO Treino_has_Exercicio
                (Series, Repeticao, Treino_idTreino, Exercicio_idExercicio)
                VALUES (:s, :r, :t, :e)"
            );

            $query->bindValue(':s', $Treino_has_Exercicio->getSeries(), PDO::PARAM_STR);
            $query->bindValue(':r', $Treino_has_Exercicio->getRepeticao(), PDO::PARAM_STR);

            // Bind das chaves estrangeiras
            $query->bindValue(':t', $Treino_has_Exercicio->getTreino()->getId(), PDO::PARAM_INT);
            $query->bindValue(':e', $Treino_has_Exercicio->getExercicio()->getId(), PDO::PARAM_INT);

            $query->execute();

        } catch (PDOException $e) {
            echo "Erro #1: " . $e->getMessage();
        }
    }

    public function read() {
        try {

            $query = BD::getConexao()->prepare(
                "SELECT * FROM Treino_has_Exercicio"
            );

            $query->execute();

            $listaTreino_has_Exercicio = array();

            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {

                $Treino_has_Exercicio = new Treino_has_Exercicio();

                // Dados da associação
                $Treino_has_Exercicio->setSeries($linha['series']);
                $Treino_has_Exercicio->setRepeticao($linha['repeticao']);

                // Buscar o treino
                $daoTreino = new TreinoDAO();
                $treino = $daoTreino->find($linha['Treino_idTreino']);

                $Treino_has_Exercicio->setTreino($treino);

                // Buscar o exercício
                $daoExercicio = new ExercicioDAO();
                $exercicio = $daoExercicio->find($linha['Exercicio_idExercicio']);

                $Treino_has_Exercicio->setExercicio($exercicio);

                $listaTreino_has_Exercicio[] = $Treino_has_Exercicio;
            }

            return $listaTreino_has_Exercicio;

        } catch (PDOException $e) {

            echo "Erro #2: " . $e->getMessage();

            return array();
        }
    }
}
?>
