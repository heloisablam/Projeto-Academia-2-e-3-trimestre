<?php
class AlunoDAO {
    public function create($aluno){
        try {
            $query = BD::getConexao()->prepare("INSERT INTO Aluno(Nome, cpf, telefone)
            VALUES (:n, :c, :t)"
            );
            $query->bindValue(':n', $aluno->getNome(),PDO::PARAM_STR);
            $query->bindValue(':c', $aluno->getCpf(),PDO::PARAM_STR);
            $query->bindValue(':t', $aluno->getTelefone(),PDO::PARAM_STR);

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
            $query = BD::getConexao()->prepare("SELECT * FROM aluno");

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

            $listaAlunos = array();

            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $Aluno = new Aluno();
                $Aluno->setId($linha['idaluno']);
                $Aluno->setNome($linha['Nome']);
                $Aluno->setCpf($linha['cpf']);
                $Aluno->setTelefone($linha['telefone']);

                array_push($listaAlunos, $Aluno);
            }

            return $listaAlunos;

        } catch (PDOException $e) {
            echo "Erro #2: " . $e->getMessage();
        }
    }

    public function find($id) {
        try {
            $query = BD::getConexao()->prepare("SELECT * FROM aluno WHERE idaluno = :i");
            $query->bindValue(':i', $id ,PDO::PARAM_INT);

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

            if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                $Aluno = new Aluno();
                $Aluno->setId($linha['idaluno']);
                $Aluno->setNome($linha['Nome']);
                $Aluno->setCpf($linha['cpf']);
                $Aluno->setTelefone($linha['telefone']);
            }

            return $Aluno;

        } catch (PDOException $e) {
            echo "Erro #3: " . $e->getMessage();
        }
    }

    public function update($aluno){
        try {
            $query = BD::getConexao()->prepare
            ( "UPDATE Aluno SET nome = :n, cpf = :c, 
            telefone = :t
            WHERE idaluno = :i"
            );
            $query->bindValue(':i', $aluno->getId(),PDO::PARAM_INT);
            $query->bindValue(':n', $aluno->getNome(),PDO::PARAM_STR);
            $query->bindValue(':c', $aluno->getCpf(),PDO::PARAM_STR);
            $query->bindValue(':t', $aluno->getTelefone(),PDO::PARAM_STR);

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
            ( "DELETE FROM Aluno 
            WHERE idaluno = :i"
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
