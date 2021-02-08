<!-- mengimport data.php yang berfungsi untuk mengakses file tersebut
 untuk digunakan data-data array ayang ada di file tersebut -->
<?php require_once('data.php') ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Progate</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>
<body>
  <div class="order-wrapper">
    <h2>Keranjang</h2>

    <!-- mendefinisikan dan memberikan nilai awal variable $totalPayment -->
    <?php $totalPayment = 0 ?>

  <!-- menampilkan semua order dari file index.php     -->
    <?php foreach ($menus as $menu): ?>
      <?php 
      // mendefinisikan variable $orderCount dan memberikan nilai value dari data yang dikirimkan index.php
        $orderCount = $_POST[$menu->getName()];

        // memberikan nilai $orderCount ke property orderCount class Menu
        $menu->setOrderCount($orderCount);

        //merubah nilai variable $totalPayment
        $totalPayment += $menu->getTotalPrice();
      ?>
      <p class="order-amount">

      <!-- mencetak/menampilkan nama menu -->
        <?php echo $menu->getName() ?>
        x

        <!-- mencetak/menampilkan quantity order dari menu -->
        <?php echo $orderCount ?>
      </p>
      <p class="order-price">$<?php echo $menu->getTotalPrice() ?></p>
    <?php endforeach ?>

    <!-- menampilkan total biaya yang harus dibayar -->
    <h3>Harga total: <?php echo $totalPayment ?></h3>
  </div>
</body>
</html>