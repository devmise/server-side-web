<?php
require_once('database.php');

$queryProducts = 'SELECT * FROM products';
$statement = $db->prepare($queryProducts);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
	<link rel="stylesheet" href="main.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script><!-- define some style elements-->
	
        <title>Tribe Craft</title>
</head>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php">
      <img class="navbar-logo" src="logo.png">
    </a>    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" data-bs-theme="dark">
      <div class="navbar-nav">
        
      
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="stock.php">Stock</a>
        <a class="nav-link" href="contact-form.html">Contact Us</a>
      </div>
    </div>
  </div>
</nav>

<body>
<div class="container">
    <h1>Our Stock</h1>
    <div class="row">
  
<?php foreach ($products as $product) : ?>
  <div class="col">
<div class="card" style="width: 18rem;">
<img src = " <?php echo $product['image'];?> "class="card-img-top">

      <div class="card-body"> 
        <h5 class="card-title"><h5><?php echo $product['prod_name'];?> </h5>
        <p class="card-text"></p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Material: <?php echo $product['material']; ?> </li>
        <li class="list-group-item">Firmness: <?php echo $product['firmnness']; ?></li>
        <li class="list-group-item">Warranty: <?php echo $product['warranty'];?> years</li>
        <li class="list-group-item">Price: €<?php echo $product['prod_price']; ?></li>
      </ul>
    </div>
    </div>

    <?php endforeach; ?>
    </div>
    </div>

</body>
</html>