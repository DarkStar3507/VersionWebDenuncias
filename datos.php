<?php
class Delito {
    public $tipo;
    public $descripcion;

    public function __construct($tipo, $descripcion) {
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
    }
}

class ExpedienteDelincuente {
    public $denunciante;
    public $denunciado;
    public $delitos;

    public function __construct($denunciante, $denunciado) {
        $this->denunciante = $denunciante;
        $this->denunciado = $denunciado;
        $this->delitos = [];
    }

    public function agregarDelito($delito) {
        $this->delitos[] = $delito;
    }
}

$expedientes = [];

$denunciante1 = "Juan Pérez";
$denunciado1 = "Pedro González";
$expediente1 = new ExpedienteDelincuente($denunciante1, $denunciado1);
$expediente1->agregarDelito(new Delito("Robo", "Asalto a mano armada"));
$expediente1->agregarDelito(new Delito("Fraude", "Estafa bancaria"));
$expedientes[] = $expediente1;

$denunciante2 = "María López";
$denunciado2 = "Ana Martínez";
$expediente2 = new ExpedienteDelincuente($denunciante2, $denunciado2);
$expediente2->agregarDelito(new Delito("Homicidio", "Asesinato premeditado"));
$expedientes[] = $expediente2;

$denunciante3 = "Carlos Rodríguez";
$denunciado3 = "Luisa Gutiérrez";
$expediente3 = new ExpedienteDelincuente($denunciante3, $denunciado3);
$expediente3->agregarDelito(new Delito("Robo", "Hurto de vehículo"));
$expediente3->agregarDelito(new Delito("Amenazas", "Intimidación con arma de fuego"));
$expedientes[] = $expediente3;

$denunciante4 = "Sofía García";
$denunciado4 = "Javier Martínez";
$expediente4 = new ExpedienteDelincuente($denunciante4, $denunciado4);
$expediente4->agregarDelito(new Delito("Estafa", "Fraude telefónico"));
$expediente4->agregarDelito(new Delito("Secuestro", "Retención ilegal por rescate"));
$expedientes[] = $expediente4;

?>
