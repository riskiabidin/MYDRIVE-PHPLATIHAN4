<?php
class Menu {
  //mendeklarasikan property yang dibutuhkan, class protected bisa diakses oleh class anak, class private hanya bisa diakses didalam class
  protected $name;
  protected $price;
  protected $image;
  private $orderCount = 0;
  //tipe static digunakan jika untuk mengakses tidak perlu melakukan instance
  protected static $count = 0;
  
  //mendefinisikan constructor(jika instance langsung menjalankan constructor, memberikan nilai ke property denga constructor)
  public function __construct($name, $price, $image) {
    $this->name = $name;
    $this->price = $price;
    $this->image = $image;
    self::$count++;
  }
  
  public function hello() {
    echo 'Saya adalah '.$this->name;
  }
  
  //mendefinisikan method-method getter untuk mengakses atau mereturn nilai pada property, karena hak akses property bertipe private, dari luar class tidak bisa mengkases secara langsung
  public function getName() {
    return $this->name;
  }
  
  public function getImage() {
    return $this->image;
  }
  
  public function getOrderCount() {
    return $this->orderCount;
  }
  
  //mendefinisikan method-method setter untuk memberikan nilai pada property
  public function setOrderCount($orderCount) {
    $this->orderCount = $orderCount;
  }
  
  public function getTaxIncludedPrice() {
    return round($this->price * 1.0725, 2);
  }
  
  public function getTotalPrice() {
    return $this->getTaxIncludedPrice() * $this->orderCount;
  }
  
  //mencari data array review yang mempunyai nama menu yang diinginkan difile pengguna.
  public function getReviews($reviews) {
    $reviewsForMenu = array();
    foreach ($reviews as $review) {
      if ($review->getMenuName() == $this->name) {
        $reviewsForMenu[] = $review;
      }
    }
    return $reviewsForMenu;
  }
  
  
  public static function getCount() {
    return self::$count;
  }
  
  //mencari data array menu yang mempunyai nilai seperti parameter yang diberikan oleh pengguna, dan mempunyai key static jadi untuk mengaksesnya tanpa instance
  public static function findByName($menus, $name) {
    foreach ($menus as $menu) {
      if ($menu->getName() == $name) {
        return $menu;
      }
    }
  }
  
}
?>