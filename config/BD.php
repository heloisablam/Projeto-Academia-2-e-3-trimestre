<?php
    class BD {
        public static function getConexao() {
            $conn = new PDO(
                "mysql:host=localhost;dbname=bd_academia",
                "root", 
                "root"
            );

            return $conn;
        }
    }