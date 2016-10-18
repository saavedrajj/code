<?php
/* http://www.nebaris.com/post/97/metodos-magicos-en-php-parte-2*/
class Animal {
  private $patas =4;

  protected function setPatas($cantidad) {
    $this->patas = $cantidad;
  }
  public function getPatas() {
    return $this->patas."<br/>";
  }
}

class Gato extends Animal {
    public function establecerPatas($patas)
    {
        $this->setPatas($patas);
    }

    // este método va a fallar, ya que quiere acceder
    // a una propiedad privada de la clase padre
    public function accederAPatas()
    {
        return $this->patas;
    }
}

// creamos el objeto
$bolaDeNieve = new Gato();

// producimos el error
echo $bolaDeNieve->accederAPatas();
?>
