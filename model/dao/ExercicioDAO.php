<?php
class ExercicioDAO {

    public function create($exercicio) {
        try {
            $query = BD::getConexao()->prepare(
                "INSERT INTO exercicio(Nome, Descricao, categoria_idcategoria)
                VALUES (:n, :d, :c)"
            );

            $query->bindValue(':n', $exercicio->getNome(), PDO::PARAM_STR);
            $query->bindValue(':d', $exercicio->getDescricao(), PDO::PARAM_STR);
            $query->bindValue(':c', $exercicio->getCategoria()->getId(), PDO::PARAM_INT);

            $query->execute();

        } catch (PDOException $e) {
            echo "Erro #1: " . $e->getMessage();
        }
    }

    public function read() {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM exercicio");
            $query->execute();

            $listaExercicios = array();

            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {

                $exercicio = new Exercicio();

                $exercicio->setId($linha['idExercicio']);
                $exercicio->setNome($linha['nome']);
                $exercicio->setDescricao($linha['Descricao']);

                $daoCategoria = new CategoriaDAO();
                $categoria = $daoCategoria->find($linha['categoria_idcategoria']);

                $exercicio->setCategoria($categoria);

                array_push($listaExercicios, $exercicio);
            }

            return $listaExercicios;

        } catch (PDOException $e) {
            echo "Erro #2: " . $e->getMessage();
            return array();
        }
    }

    public function find($id) {
        try {
            $query = BD::getConexao()->prepare(
                "SELECT * FROM exercicio WHERE idExercicio = :i"
            );

            $query->bindValue(':i', $id, PDO::PARAM_INT);
            $query->execute();

            if ($linha = $query->fetch(PDO::FETCH_ASSOC)) {

                $exercicio = new Exercicio();

                $exercicio->setId($linha['idExercicio']);
                $exercicio->setNome($linha['nome']);
                $exercicio->setDescricao($linha['Descricao']);

                $daoCategoria = new CategoriaDAO();
                $categoria = $daoCategoria->find($linha['categoria_idcategoria']);

                $exercicio->setCategoria($categoria);

                return $exercicio;
            }

            return null;

        } catch (PDOException $e) {
            echo "Erro #3: " . $e->getMessage();
            return null;
        }
    }

    public function destroy($id) {
        try {
            $query = BD::getConexao()->prepare(
                "DELETE FROM exercicio WHERE idExercicio = :i"
            );

            $query->bindValue(':i', $id, PDO::PARAM_INT);
            $query->execute();

        } catch (PDOException $e) {
            echo "Erro #4: " . $e->getMessage();
        }
    }

    public function update($exercicio) {
    try {
        $query = BD::getConexao()->prepare(
            "UPDATE exercicio SET
            Nome = :n,
            Descricao = :d,
            categoria_idcategoria = :c
            WHERE idExercicio = :i"
        );

        $query->bindValue(':n', $exercicio->getNome(), PDO::PARAM_STR);
        $query->bindValue(':d', $exercicio->getDescricao(), PDO::PARAM_STR);
        $query->bindValue(':c', $exercicio->getCategoria()->getId(), PDO::PARAM_INT);
        $query->bindValue(':i', $exercicio->getId(), PDO::PARAM_INT);

        $query->execute();

    } catch (PDOException $e) {
        echo "Erro #5: " . $e->getMessage();
    }
}
}
?>