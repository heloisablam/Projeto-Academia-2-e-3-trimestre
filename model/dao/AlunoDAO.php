<?php
class AlunoDAO {
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
}
?>
