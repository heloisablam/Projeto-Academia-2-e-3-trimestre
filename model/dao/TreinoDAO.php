<?php
class TreinoDAO {
    public function read() {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM treino");

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

            $listaTreinos = array();

            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $Treino = new Treino();
                $Treino->setId($linha['idTreino']);
                $Treino->setNome($linha['Nome']);
                $Treino->setDescricao($linha['Descricao']);

                array_push($listaTreinos, $Treino);
            }

            return $listaTreinos;

        } catch (PDOException $e) {
            echo "Erro #2: " . $e->getMessage();
        }
    }
}
?>
