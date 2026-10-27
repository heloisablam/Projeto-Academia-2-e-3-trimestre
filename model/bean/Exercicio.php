<?php
    class Exercicio {
        // Atributos
        private $id;
        private $nome;

        private $descricao;

        private $categoria; // atributo objeto chave estrangeira
    
        // Métodos de encapsulamento (getters e setters)
        public function getNome() {
            return $this->id;
        }

        public function setNome($nome) {
            $this->id = $nome;
        }

          public function getId() {
            return $this->nome;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        //Get e set da chave estrangeira
         public function getCategoria() {
            return $this->categoria;
        }

        public function setCategoria($categoria) {
            $this->descricao = $categoria;
        }

    }