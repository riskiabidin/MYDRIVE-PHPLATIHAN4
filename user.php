<?php
class User {
  private $name;
  private $gender;
  private $id;
  private static $count = 0;
  
  public function __construct($name, $gender) {
    $this->name = $name;
    $this->gender = $gender;
  
    //menambahkan 1 setiap instance user
    self::$count++;

    //tetapkan nilai property class $count ke property $id
    $this->id = self::$count;
  }

  public function getName() {
    return $this->name;
  }

  public function getGender() {
    return $this->gender;
  }

  //membuat method getter untuk mengakses nilai $id dari luar class
  public function getId(){
      return $this->id;
  }
}

?>