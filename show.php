<?php
//mengimport file-file yang dibutuhkan,
// menu.php berfungsi untuk mengakses method2 maupun property
// yang ada pada class Menu maupun class yang mewarisi class Menu
//data.php berfungsi untuk mengakses dan digunakan data yang ada di file data.php
require_once('menu.php');
require_once('data.php');

//medeklarasikan variable-variable yang akan digunakan di show.php
$menuName = $_GET['name'];//mendefinisikan variable $menuName yang diberikan nilai $_GET['name'] dari file index.php
$menu = Menu::findByName($menus, $menuName);//mendefinisikan variable $menu yang diberikan nilai hasil pemanggilan method static findByName
//  yang berisi argument1 array menus dari data.php dan argument2 berisi variable $menuName


$menuReviews = $menu->getReviews($reviews);//mendefinisikan variable $menuReviews yang berisi dari review-review 
// yang berisi nama menu sesuai $_GET['name] dari file index.php
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Progate</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>
<body>
  <div class="review-wrapper">
    <div class="review-menu-item">
    
    <!-- mencetak/menampilkan gambar menu  -->
      <img src="<?php echo $menu->getImage() ?>" class="menu-item-image">
      
      <!-- mencetak/menampilkan nama menu -->
      <h3 class="menu-item-name"><?php echo $menu->getName() ?></h3>
  
    <!-- mencetak type menu jika menu merupakan instance dari class Drink -->
      <?php if ($menu instanceof Drink): ?>
        <p class="menu-item-type"><?php echo $menu->getType() ?></p>
    
    <!-- jika tidak maka mencetak spiciness(instance dari class Food) -->
      <?php else: ?>
        <?php for ($i = 0; $i < $menu->getSpiciness(); $i++): ?>
          <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/chilli.png" class='icon-spiciness'>
        <?php endfor ?>
      <?php endif ?>
    
    <!-- mencetak harga+pajak -->
      <p class="price">$<?php echo $menu->getTaxIncludedPrice() ?></p>
    </div>
    
    <div class="review-list-wrapper">
      <div class="review-list">
        <div class="review-list-title">
          <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/review.png" class='icon-review'>
          <h4>Ulasan</h4>
        </div>

        <!-- menampilkan ulasan/review yang mempunyai nama menu yang sedang di akses -->
        <?php foreach ($menuReviews as $review): ?>

        <!-- mendefinisikan variable $user yang beisi id sama dengan userId class review -->
          <?php $user = $review->getUser($users) ?>
          <div class="review-list-item">
            <div class="review-user">

            <!-- menampilkan gender user -->
              <?php if ($user->getGender() == 'pria'): ?>
                <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/male.png" class='icon-user'>
              <?php else: ?>
                <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/female.png" class='icon-user'>
              <?php endif ?>

              <!-- menampilkan id user -->
              <p><?php echo $user->getId() ?></p>

              <!-- menampilkan name user -->
              <p><?php echo $user->getName() ?></p>
            </div>
            <p class="review-text"><?php echo $review->getBody() ?></p>
          </div>
        <?php endforeach ?>
      </div>
    </div>

    <!-- pindah ke file index.php -->
    <a href="index.php">← Kembali ke Menu</a>
  </div>
</body>
</html>