<?php 
//mengimport file menu.php untuk memanfaatkan code yang ada di file tersebut.
require_once('menu.php');

//extends key digunakan untuk mengakses class induk.
class Food extends Menu {
  //mendeklarasikan property tambahan khusus class anak
  private $spiciness;
  
  // mendefinisikan constructor dan menambahkan paramater $spiciness
  public function __construct($name, $price, $image, $spiciness) {
    //parent key digunakan supaya tidak overlapping(tumpang tindih) dengan class induk.
    parent::__construct($name, $price, $image);
    $this->spiciness = $spiciness;
  }
  
  //mendefinisikan method getter untuk mengakses property tambahan.
  public function getSpiciness() {
    return $this->spiciness;
  }
  
}

?>