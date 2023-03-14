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
        <title>Furniture Website</title>
</head>

<body>
    <h1>Furniture Shop</h1>
    <table>
        <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Material</th>
            <th>Firmness</th>
            <th>Manufacture Date</th>
            <th>Price</th>
</tr>
<?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['prod_id']; ?></td>
                <td><?php echo $product['prod_name']; ?></td>
                <td><?php echo $product['prod_type']; ?></td>
                <td><?php echo $product['material']; ?></td>
                <td><?php echo $product['firmnness']; ?></td>           
                <td><?php echo $product['manufactured']; ?></td>
                <td><?php echo $product['prod_price']; ?></td>

                <td><form action="delete_product.php" method="post">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['prod_id']; ?>">
                </form></td>
            </tr>
            <?php endforeach; ?>
</table>
</body>
</html>