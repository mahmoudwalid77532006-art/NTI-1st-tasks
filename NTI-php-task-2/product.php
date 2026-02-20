<?php
$products = [
    'Laptop Backpack' => [
        'price' => '620',
        'img' => 'product1.jpg',
        'desc' => 'Laptop Backpack, Travel Computer Bag with USB Charging Port.'
    ],
    'MDSTAY Fit Laptop Bag' => [
        'price' => '750',
        'img' => 'product2.jpg',
        'desc' => 'Waterproof Anti Theft Bag with inner protection.'
    ],
    'Business Laptop Bag' => [
        'price' => '900',
        'img' => 'product3.jpg',
        'desc' => 'Business Anti Theft Backpack for 17 Inch Laptop.'
    ],
    'KROSER TSA Laptop Bag' => [
        'price' => '1100',
        'img' => 'product4.jpg',
        'desc' => 'Travel Computer Bag with USB Charging Port.'
    ],
    'College Backpack' => [
        'price' => '680',
        'img' => 'product5.jpg',
        'desc' => 'Water Resistant School Backpack for Men & Women.'
    ],
    'Premium Laptop Bag' => [
        'price' => '1200',
        'img' => 'product6.jpg',
        'desc' => 'High Quality Business Laptop Backpack.'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Products</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <style>
    .card {
        transition: 0.3s ease;
    }
    .card:hover {
        transform: translateY(-10px);
    }
  </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#6a0dad;">
  <div class="container">
    <a class="navbar-brand text-info fw-bold" href="home.php">Ecommerce</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="product.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="account.php">Account</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- PRODUCTS -->
<div class="container mt-5">
    <div class="row g-4">

        <?php foreach ($products as $name => $product) : ?>
            <div class="col-md-4">
                <div class="card shadow h-100 d-flex flex-column">
                    <img src="./imgs/<?= $product['img'] ?>" 
                         class="card-img-top" 
                         style="height:250px; object-fit:cover;">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $name ?></h5>
                        <p class="card-text flex-grow-1"><?= $product['desc'] ?></p>
                        <p class="card-text fw-bold text-success">
                            Price: $<?= $product['price'] ?>
                        </p>
                        <a href="#" class="btn btn-primary w-100 mt-auto">
                            Add to Cart
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>