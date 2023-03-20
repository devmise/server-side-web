<?php
require_once('database.php');

$productQuery = $db->query('SELECT * FROM products');
$results = array();
while($row = $productQuery->fetch(PDO::FETCH_ASSOC)){
  $results[] = array_values($row);
}

if (!isset($_GET['sort'])) {
  $productQuery = $db->query('SELECT * FROM products');
} else {
  $sort = $_GET['sort'];
  if ($sort === 'price_asc') {
      $productQuery = $db->query('SELECT * FROM products ORDER BY prod_price ASC');
  } elseif ($sort === 'price_desc') {
      $productQuery = $db->query('SELECT * FROM products ORDER BY prod_price DESC');
  }
}


?>

<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
	<link rel="stylesheet" href="main.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script><!-- define some style elements-->
	
        <title>TRibe Craft</title>
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
    <form method = "get">
      <label for = "sort">Sort by:</label>
      <select name ="sort" id="sort">
        <option value ="price_asc">Price (low to high)</option>
        <option value ="price_desc">Price (high to low)</option>
</select>
<button type="submit">Sort</button>

</form>
    <div class="row">
  
<?php foreach ($productQuery as $product) : ?>
  <div class="col">
<div class="card" style="width: 15rem;">
<img src = " <?php echo $product['image'];?> "class="card-img-top">

      <div class="card-body"> 
        <h5 class="card-title"><h5><?php echo $product['prod_name'];?> </h5>
        <p class="card-text"></p>
      </div>
      <ul class="list-group list-group-flush">
            <?php foreach ($product as $key => $value) : ?>
              <?php if ($key == 'prod_price') : ?>
    <p class="card-text">Price: €<?php echo $value; ?></p>
  <?php endif; ?>
  <?php if ($key == 'firmnness') : ?>
    <p class="card-text">Firmness: <?php echo $value; ?></p>
  <?php endif; ?>
  <?php if ($key == 'material') : ?>
    <p class="card-text">Material: <?php echo $value; ?></p>
  <?php endif; ?>
  <?php if ($key == 'warranty') : ?>
    <p class="card-text">Warranty: <?php echo $value;?> years</p>
  <?php endif; ?>
<?php endforeach; ?>
          </ul>
  
    </div>
    </div>

    <?php endforeach; ?>
    </div>
    </div>

</body>
</html>