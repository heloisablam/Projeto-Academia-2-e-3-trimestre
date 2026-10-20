<?php
class TreinoDAO {
    public function create($treino){
        try {
            $query = BD::getConexao()->prepare("INSERT INTO treino(Nome, Descricao)
            VALUES (:n, :d)"
            );
            $query->bindValue(':n', $treino->getNome(),PDO::PARAM_STR);
            $query->bindValue(':d', $treino->getDescricao(),PDO::PARAM_STR);
    
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
            $query = BD::getConexao()->prepare("SELECT * FROM treino");

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

            $listatreinos = array();

            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $treino = new treino();
                $treino->setId($linha['idTreino']);
                $treino->setNome($linha['Nome']);
                $treino->setDescricao($linha['Descricao']);

                array_push($listatreinos, $treino);
            }

            return $listatreinos;

        } catch (PDOException $e) {
            echo "Erro #2: " . $e->getMessage();
        }
    }

    public function find($id) {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM treino WHERE idtreino = :i");
            $query->bindValue(':i', $id ,PDO::PARAM_INT);

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

            if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                $treino = new treino();
                $treino->setId($linha['idTreino']);
                $treino->setNome($linha['Nome']);
                $treino->setDescricao($linha['Descricao']);
            }

            return $treino;

        } catch (PDOException $e) {
            echo "Erro #3: " . $e->getMessage();
        }
    }

    public function update($treino){
        try {
            $query = BD::getConexao()->prepare
            ( "UPDATE treino SET Nome = :n, Descricao = :d
            WHERE idtreino = :i"
            );
            $query->bindValue(':i', $treino->getId(),PDO::PARAM_INT);
            $query->bindValue(':n', $treino->getNome(),PDO::PARAM_STR);
            $query->bindValue(':d', $treino->getDescricao(),PDO::PARAM_STR);

             if (!$query->execute()) {
                print_r($query->errorInfo());
            }
        }
        catch(PDOException $e){
            echo "Erro #4: " . $e->getMessage();
        }
    }

    public function destroy($id){
        try {
            $query = BD::getConexao()->prepare
            ( "DELETE FROM treino 
            WHERE idtreino = :i"
            );
            $query->bindValue(':i', $id,PDO::PARAM_INT);

             if (!$query->execute()) {
                print_r($query->errorInfo());
            }
        }
        catch(PDOException $e){
            echo "Erro #5: " . $e->getMessage();
        }
    }

}
    
?>
