<?php
class Aluno_has_TreinoDAO {

    public function create($Aluno_has_Treino) {
        try {
            $query = BD::getConexao()->prepare(
                "INSERT INTO Aluno_has_Treino(Aluno_idAluno, Treino_idTreino)
                VALUES (:a, :t)"
            );

            $query->bindValue(':a', $Aluno_has_Treino->getAluno()->getId(), PDO::PARAM_INT);
            $query->bindValue(':t', $Aluno_has_Treino->getTreino()->getId(), PDO::PARAM_INT);

            $query->execute();

        } catch (PDOException $e) {
            echo "Erro #1: " . $e->getMessage();
        }
    }

    public function read() {
        try {
            $query = BD::getConexao()->prepare(
                "SELECT * FROM Aluno_has_Treino"
            );

            $query->execute();

            $listaAluno_has_Treino = array();

            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {

                $Aluno_has_Treino = new Aluno_has_Treino();

                $daoAluno = new AlunoDAO();
                $aluno = $daoAluno->find($linha['Aluno_idaluno']);

                $Aluno_has_Treino->setAluno($aluno);

                $daoTreino = new TreinoDAO();
                $treino = $daoTreino->find($linha['Treino_idTreino']);

                $Aluno_has_Treino->setTreino($treino);

                $listaAluno_has_Treino[] = $Aluno_has_Treino;
            }

            return $listaAluno_has_Treino;

        } catch (PDOException $e) {
            echo "Erro #2: " . $e->getMessage();
            return array();
        }
    }

    public function find($alunoId, $treinoId) {
        try {
            $query = BD::getConexao()->prepare(
                "SELECT * FROM Aluno_has_Treino
                WHERE Aluno_idaluno = :a
                AND Treino_idTreino = :t"
            );

            $query->bindValue(':a', $alunoId, PDO::PARAM_INT);
            $query->bindValue(':t', $treinoId, PDO::PARAM_INT);

            $query->execute();

            if ($linha = $query->fetch(PDO::FETCH_ASSOC)) {

                $Aluno_has_Treino = new Aluno_has_Treino();

                $daoAluno = new AlunoDAO();
                $aluno = $daoAluno->find($linha['Aluno_idaluno']);

                $Aluno_has_Treino->setAluno($aluno);

                $daoTreino = new TreinoDAO();
                $treino = $daoTreino->find($linha['Treino_idTreino']);

                $Aluno_has_Treino->setTreino($treino);

                return $Aluno_has_Treino;
            }

            return null;

        } catch (PDOException $e) {
            echo "Erro #3: " . $e->getMessage();
            return null;
        }
    }

    public function update($Aluno_has_Treino, $alunoIdAntigo, $treinoIdAntigo) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE Aluno_has_Treino SET
                Aluno_idaluno = :a,
                Treino_idTreino = :t
                WHERE Aluno_idaluno = :aa
                AND Treino_idTreino = :tt"
            );

            $query->bindValue(':a', $Aluno_has_Treino->getAluno()->getId(), PDO::PARAM_INT);
            $query->bindValue(':t', $Aluno_has_Treino->getTreino()->getId(), PDO::PARAM_INT);
            $query->bindValue(':aa', $alunoIdAntigo, PDO::PARAM_INT);
            $query->bindValue(':tt', $treinoIdAntigo, PDO::PARAM_INT);

            $query->execute();

        } catch (PDOException $e) {
            echo "Erro #4: " . $e->getMessage();
        }
    }

    public function destroy($alunoId, $treinoId) {
        try {
            $query = BD::getConexao()->prepare(
                "DELETE FROM Aluno_has_Treino
                WHERE Aluno_idaluno = :a
                AND Treino_idTreino = :t"
            );

            $query->bindValue(':a', $alunoId, PDO::PARAM_INT);
            $query->bindValue(':t', $treinoId, PDO::PARAM_INT);

            $query->execute();

        } catch (PDOException $e) {
            echo "Erro #5: " . $e->getMessage();
        }
    }
}
?>