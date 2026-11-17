
<?php
class Treino_has_ExercicioDAO {

    public function create($Treino_has_Exercicio) {
        try {
            $query = BD::getConexao()->prepare(
                "INSERT INTO Treino_has_Exercicio
                (series, repeticao, Treino_idTreino, Exercicio_idExercicio)
                VALUES (:s, :r, :t, :e)"
            );

            $query->bindValue(':s', $Treino_has_Exercicio->getSeries());
            $query->bindValue(':r', $Treino_has_Exercicio->getRepeticao());
            $query->bindValue(':t', $Treino_has_Exercicio->getTreino()->getId());
            $query->bindValue(':e', $Treino_has_Exercicio->getExercicio()->getId());

            $query->execute();

            return true;

        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
            return false;
        }
    }

    public function find($treino, $exercicio) {
        try {
            $query = BD::getConexao()->prepare(
                "SELECT * FROM Treino_has_Exercicio
                WHERE Treino_idTreino = :t
                AND Exercicio_idExercicio = :e"
            );

            $query->bindValue(':t', $treino);
            $query->bindValue(':e', $exercicio);

            $query->execute();

            $linha = $query->fetch(PDO::FETCH_ASSOC);

            if ($linha) {
                $Treino_has_Exercicio = new Treino_has_Exercicio();

                $Treino_has_Exercicio->setSeries($linha['series']);
                $Treino_has_Exercicio->setRepeticao($linha['repeticao']);

                $daoTreino = new TreinoDAO();
                $Treino_has_Exercicio->setTreino(
                    $daoTreino->find($linha['Treino_idTreino'])
                );

                $daoExercicio = new ExercicioDAO();
                $Treino_has_Exercicio->setExercicio(
                    $daoExercicio->find($linha['Exercicio_idExercicio'])
                );

                return $Treino_has_Exercicio;
            }

            return null;

        } catch (PDOException $e) {
            echo "Erro ao buscar: " . $e->getMessage();
            return null;
        }
    }

    public function read() {
        try {
            $query = BD::getConexao()->prepare(
                "SELECT * FROM Treino_has_Exercicio"
            );

            $query->execute();

            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            $lista = array();

            foreach ($resultado as $linha) {
                $Treino_has_Exercicio = new Treino_has_Exercicio();

                $Treino_has_Exercicio->setSeries($linha['series']);
                $Treino_has_Exercicio->setRepeticao($linha['repeticao']);

                $daoTreino = new TreinoDAO();
                $Treino_has_Exercicio->setTreino(
                    $daoTreino->find($linha['Treino_idTreino'])
                );

                $daoExercicio = new ExercicioDAO();
                $Treino_has_Exercicio->setExercicio(
                    $daoExercicio->find($linha['Exercicio_idExercicio'])
                );

                $lista[] = $Treino_has_Exercicio;
            }

            return $lista;

        } catch (PDOException $e) {
            echo "Erro ao listar: " . $e->getMessage();
            return array();
        }
    }

    public function update($Treino_has_Exercicio, $treinoAntigo, $exercicioAntigo) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE Treino_has_Exercicio SET
                    series = :s,
                    repeticao = :r,
                    Treino_idTreino = :t,
                    Exercicio_idExercicio = :e
                WHERE Treino_idTreino = :ta
                AND Exercicio_idExercicio = :ea"
            );

            $query->bindValue(':s', $Treino_has_Exercicio->getSeries());
            $query->bindValue(':r', $Treino_has_Exercicio->getRepeticao());
            $query->bindValue(':t', $Treino_has_Exercicio->getTreino()->getId());
            $query->bindValue(':e', $Treino_has_Exercicio->getExercicio()->getId());
            $query->bindValue(':ta', $treinoAntigo);
            $query->bindValue(':ea', $exercicioAntigo);

            $query->execute();

            return true;

        } catch (PDOException $e) {
            echo "Erro ao atualizar: " . $e->getMessage();
            return false;
        }
    }

    public function destroy($treino, $exercicio) {
        try {
            $query = BD::getConexao()->prepare(
                "DELETE FROM Treino_has_Exercicio
                WHERE Treino_idTreino = :t
                AND Exercicio_idExercicio = :e"
            );

            $query->bindValue(':t', $treino);
            $query->bindValue(':e', $exercicio);

            $query->execute();

            return true;

        } catch (PDOException $e) {
            echo "Erro ao excluir: " . $e->getMessage();
            return false;
        }
    }
}
