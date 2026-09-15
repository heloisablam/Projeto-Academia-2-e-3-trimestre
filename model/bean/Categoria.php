<?php
    class categoria {
        // Atributos
        private $id;
        private $deacricao;
    
        // Métodos de encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getDeacricao() {
            return $this->deacricao;
        }

        public function setDeacricao($deacricao) {
            $this->deacricao = $deacricao;
        }


    }