
<?php
class Treino_has_Exercicio {

    private $id;
    private $series;
    private $repeticao;
    private $treino;
    private $exercicio;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getSeries() {
        return $this->series;
    }

    public function setSeries($series) {
        $this->series = $series;
    }

    public function getRepeticao() {
        return $this->repeticao;
    }

    public function setRepeticao($repeticao) {
        $this->repeticao = $repeticao;
    }

    public function getTreino() {
        return $this->treino;
    }

    public function setTreino($treino) {
        $this->treino = $treino;
    }

    public function getExercicio() {
        return $this->exercicio;
    }

    public function setExercicio($exercicio) {
        $this->exercicio = $exercicio;
    }
}
?>
