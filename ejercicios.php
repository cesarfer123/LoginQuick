<?php

// Ejercicio 1: Clase "Rectángulo"
// Crea una clase llamada "Rectángulo" que tenga dos propiedades privadas: "base" y "altura". 
// Implementa métodos para obtener y establecer el valor de estas propiedades, 
// y un método para calcular el área del rectángulo.

class Rectangulo{
    
    private $base;
    private $altura;

    public function __construct($base,$altura)
    {
        $this->base=$base;
        $this->altura=$altura;

    }

    public function getBase(){
        return $this->base;
    }

    public function setBase($base){
        $this->base=$base;
    }

    public function getAltura(){
        return $this->altura;
    }

    public function setAltura($altura){
        $this->altura=$altura;
    }

    public function calcularArea(){
        $area=($this->base*$this->altura);
        return $area;
    }

}

$objetoRectangulo=new Rectangulo(5,8);
echo "El area del rectangulo con base: " .$objetoRectangulo->getBase() . " y altura: " . $objetoRectangulo->getAltura() . " es " .$objetoRectangulo->calcularArea() . "<br>";

// Ejercicio 2: Herencia - Clase "Vehículo"
// Crea una clase base llamada "Vehículo" que tenga las propiedades protegidas "marca" y "modelo". 
// Luego, crea dos clases derivadas: "Coche" y "Motocicleta". 
// Cada clase debe tener un método para mostrar la información del vehículo.

class Vehiculo{

    protected $marca;
    protected $modelo;

    public function __construct($marca,$modelo)
    {
        $this->marca=$marca;     
        $this->modelo=$modelo;     
    }

    public function infoUnidad(){
        echo "El vehiculo tiene la marca: " . $this->marca . " con un modelo: " . $this->modelo . "<br>";
    }

}

class Coche extends Vehiculo{

}

class Motocicleta extends Vehiculo{

}

$coche=new Coche("ford","ranger");
$coche->infoUnidad();

$coche=new Motocicleta("bajaj","Pulsar N160");
$coche->infoUnidad();




// Ejercicio 4: Encapsulación - Clase "Banco"
// Crea una clase llamada "Banco" que tenga una propiedad privada para almacenar el saldo y métodos para depositar y retirar dinero.
//  Asegúrate de que no se pueda acceder directamente al saldo desde fuera de la clase.


class Banco{

    private $saldo;
    // private $inicial=10;

    public function __construct($saldoInicial)
    {
        $this->saldo=$saldoInicial;
    }

    public function depositar($cantDepositar){
        $this->saldo+=$cantDepositar;
        return $this->saldo;
    }

    public function retirar($cantRetirar){
        if($this->saldo>=$cantRetirar){
            $this->saldo-=$cantRetirar;
        }else{
            echo "cantidad insuficiente a retirar";
        }
    }

    public function getSaldo(){
        return $this->saldo;
    }

}

$trans=new Banco(100);
$trans->depositar(150);
echo "saldo ahorrado " . $trans->getSaldo() . "<br>";
$trans->retirar(300);


// Ejercicio 5: Polimorfismo - Clase "Animal"
// Crea una clase base llamada "Animal" con un método "hacerSonido". 
// Luego, crea varias clases derivadas como "Perro", "Gato" y "Vaca", 
// cada una con su propio método "hacerSonido" que imprima un sonido característico del animal.

class Animal{

    public $sonido;

    public function __construct($sonido)
    {
        $this->sonido=$sonido;
    }
    protected function hacerSonido(){
        echo "Este animal hace: ";
    }
}
