<?php
class categoriaDAO {
        public function create($categoria){
        try {
            $query = BD::getConexao()->prepare("INSERT INTO categoria(deacricao)
            VALUES (:d)"
            );
            $query->bindValue(':d', $categoria->getDeacricao(),PDO::PARAM_STR);
        
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
            $query = BD::getConexao()->prepare("SELECT * FROM categoria");

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

            $listacategorias = array();

            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $categoria = new categoria();
                $categoria->setId($linha['idcategoria']);
                $categoria->setDeacricao($linha['deacricao']);

                array_push($listacategorias, $categoria);
            }

            return $listacategorias;

        } catch (PDOException $e) {
            echo "Erro #2: " . $e->getMessage();
        }
    }
}
?>
