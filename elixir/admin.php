<?php
$products = json_decode(file_get_contents('products.json'), true);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel - Elixir</title>
  <style>
    body { font-family: Arial; padding: 2rem; background: #f4f4f4; }
    table { width: 100%; border-collapse: collapse; background: #fff; }
    th, td { border: 1px solid #ddd; padding: 8px; }
    th { background: #000; color: white; }
    a.btn { padding: 6px 12px; background: red; color: white; text-decoration: none; border-radius: 4px; }
    form { margin-top: 2rem; background: #fff; padding: 1rem; border-radius: 5px; }
  </style>
</head>
<body>

  <h1>Elixir Admin Panel</h1>

  <h2>All Products</h2>
  <table>
    <tr>
      <th>ID</th><th>Name</th><th>Price</th><th>Image</th><th>Description</th><th>Action</th>
    </tr>
    <?php foreach ($products as $p): ?>
    <tr>
      <td><?= $p['id'] ?></td>
      <td><?= $p['name'] ?></td>
      <td>$<?= number_format($p['price'], 2) ?></td>
      <td><img src="<?= $p['image'] ?>" width="50"></td>
      <td><?= $p['description'] ?></td>
      <td><a class="btn" href="delete_product.php?id=<?= $p['id'] ?>" onclick="return confirm('Delete this product?')">Delete</a></td>
    </tr>
    <?php endforeach; ?>
  </table>

  <h2>Add New Product</h2>
  <form action="add_product.php" method="post">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="text" name="price" placeholder="Price" required><br><br>
    <input type="text" name="image" placeholder="Image URL" required><br><br>
    <textarea name="description" placeholder="Description" required></textarea><br><br>
    <button type="submit">Add Product</button>
  </form>

</body>
</html>