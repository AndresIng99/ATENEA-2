<?php
// Clase abstracta que representa un vehículo genérico
abstract class Vehiculo {
    protected $ruedas;

    public function __construct($ruedas) {
        $this->ruedas = $ruedas;
    }

    abstract public function obtenerInformacion();
}

// Clase que representa un coche
class Coche extends Vehiculo {
    private $marca;

    public function __construct($marca) {
        parent::__construct(4);
        $this->marca = $marca;
    }

    public function obtenerInformacion() {
        return "Coche de la marca {$this->marca} con {$this->ruedas} ruedas.";
    }
}

// Clase que representa una moto
class Moto extends Vehiculo {
    private $tipo;

    public function __construct($tipo) {
        parent::__construct(2);
        $this->tipo = $tipo;
    }

    public function obtenerInformacion() {
        return "Moto de tipo {$this->tipo} con {$this->ruedas} ruedas.";
    }
}

// Función que muestra información de un vehículo genérico
function mostrarInformacionVehiculo(Vehiculo $vehiculo) {
    echo $vehiculo->obtenerInformacion() . "\n";
}

// Crear instancias de vehículos
$coche = new Coche("Toyota");
$moto = new Moto("Deportiva");

// Mostrar información de los vehículos usando polimorfismo
mostrarInformacionVehiculo($coche);
mostrarInformacionVehiculo($moto);
?>