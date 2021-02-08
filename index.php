<?php 

//mengimport file-file yang dibutuhkan, data.php berfungsi untuk menggunakan array yang ada di data.php.
//menu.php berfungsi untuk mengakses property-property dan method-method yang ada di menu.php
require_once('data.php');
require_once('menu.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Café Progate</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>
<body>
  <div class="menu-wrapper container">
    <h1 class="logo">Café Progate</h1>

    <!-- mencetak jumlah instance class Menu -->
    <h3>Jumlah item: <?php echo Menu::getCount() ?></h3>
    <form method="post" action="confirm.php">
      <div class="menu-items">

      <!-- menampilkan array menus yang ada di data.php -->
        <?php foreach ($menus as $menu): ?>
          <div class="menu-item">

          <!-- menampilkan image menu -->
            <img src="<?php echo $menu->getImage() ?>" class="menu-item-image">
            <h3 class="menu-item-name">

            <!-- menampilkan nama menu dan melinkkan ke show.php sama dengan nama menu -->
              <a href="show.php?name=<?php echo $menu->getName() ?>">
                <?php echo $menu->getName() ?>
              </a>
            </h3>

            <!-- jika variable $menu merupakan instance class Drink menjalankan menampilkan type -->
            <?php if ($menu instanceof Drink): ?>
              <p class="menu-item-type"><?php echo $menu->getType() ?></p>
            <?php else: ?>

            <!-- jika tidak maka menjalankan menampilkan spiciness(instance class Food) -->
              <?php for ($i=0; $i<$menu->getSpiciness(); $i++): ?>
                <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/chilli.png" class='icon-spiciness'>
              <?php endfor ?>
            <?php endif ?>

            <!-- menampilkan price+pajak dari menu -->
            <p class="price">$<?php echo $menu->getTaxIncludedPrice() ?> (termasuk pajak)</p>
            <span>Qty: </span>

            <!-- menampilkan name menu -->
            <input type="text" value="0" name="<?php echo $menu->getName() ?>">
          </div>
        <?php endforeach ?>
      </div>
      <input type="submit" value="Pesan">
    </form>
  </div>
</body>
</html>
