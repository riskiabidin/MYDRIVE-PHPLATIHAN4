<?php 
//mengimport file menu.php, untuk memanfaatkan code yang ada difile tersebut
require_once('menu.php');

//extends key untuk mengakses class induk, semua property yang bertipe protected bisa diakses,
// mewarisi property dan method yang dimiliki class induk
class Drink extends Menu {
  //mendeklarasikan proerty tambahan khusus class anak
  private $type;
  
  //mendefinisikan constructor dan menambahkan parameter $type, overriding(mengutamakan dan mengesampingkan)
  public function __construct($name, $price, $image, $type) {
    //mengunakan key parent supaya tidak overlapping(tumpang tindih dengan class induk)
    parent::__construct($name, $price, $image);
    $this->type = $type;
  }
  
  //mendefinisikan method getter untuk mengakses property tambahan, 
  public function getType() {
    return $this->type;
  }
  
  //mendefinisikan method setter untuk memberikan nilai ke property $type.
  public function setType($type) {
    $this->type = $type;
  }
  
}

?>