<?php
class ExercicioDAO {
    public function create($exercicio){
        try {
            $query = BD::getConexao()->prepare("INSERT INTO exercicio(Nome, Descricao, 
            categoria_idcategoria)
            VALUES (:n, :d, :c)"
            );
            $query->bindValue(':n', $exercicio->getNome(),PDO::PARAM_STR);
            $query->bindValue(':d', $exercicio->getDescricao(),PDO::PARAM_STR);
            //Bind para a chave estrangeira
            $query->bindValue(':c', $exercicio->getCategoria()->getId(),PDO::PARAM_INT);

             if (!$query->execute()) {
                print_r($query->errorInfo());
            }
        }
        catch(PDOException $e){
            echo "Erro #1: " . $e->getMessage();
        }
    }

     public function read() {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM exercicio");

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

            $listaExercicios = array();

            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $exercicio = new exercicio();
                $exercicio->setId($linha['idExercicio']);
                $exercicio->setNome($linha['nome']);
                $exercicio->setDescricao($linha['Descricao']);
                //Atributo da associação
                $daoCategoria = new CategoriaDAO();
                $categoria = $daoCategoria->find($linha['categoria_idcategoria']);
                $exercicio->setCategoria($categoria);

                array_push($listaExercicios, $exercicio);
            }

            return $listaExercicios;

        } catch (PDOException $e) {
            echo "Erro #2: " . $e->getMessage();
        }
    }

}
?>