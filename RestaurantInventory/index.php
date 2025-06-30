<?php
// Basic Restaurant Inventory Management
$dbFile = __DIR__ . '/database.sqlite';
$pdo = new PDO('sqlite:' . $dbFile);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create tables if they don't exist
$pdo->exec('CREATE TABLE IF NOT EXISTS products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    quantity REAL NOT NULL DEFAULT 0,
    unit_price REAL NOT NULL DEFAULT 0
)');
$pdo->exec('CREATE TABLE IF NOT EXISTS purchases (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    product_id INTEGER,
    quantity REAL,
    price REAL,
    purchased_at TEXT,
    FOREIGN KEY(product_id) REFERENCES products(id)
)');

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_product'])) {
        $name = trim($_POST['name'] ?? '');
        $qty = (float)($_POST['quantity'] ?? 0);
        $price = (float)($_POST['unit_price'] ?? 0);
        if ($name !== '') {
            $stmt = $pdo->prepare('INSERT INTO products (name, quantity, unit_price) VALUES (?, ?, ?)');
            $stmt->execute([$name, $qty, $price]);
            $productId = $pdo->lastInsertId();
            $stmt = $pdo->prepare('INSERT INTO purchases (product_id, quantity, price, purchased_at) VALUES (?, ?, ?, datetime())');
            $stmt->execute([$productId, $qty, $price]);
        }
    }
    if (isset($_POST['update_qty'])) {
        $id = (int)$_POST['product_id'];
        $delta = (float)$_POST['delta_qty'];
        $stmt = $pdo->prepare('UPDATE products SET quantity = quantity + ? WHERE id = ?');
        $stmt->execute([$delta, $id]);
    }
}

// Fetch products
$products = $pdo->query('SELECT * FROM products ORDER BY name')->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurant Inventory</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
</head>
<body>
<h1>Restaurant Inventory</h1>

<h2>Add Product</h2>
<form method="post">
    <input type="text" name="name" placeholder="Product name" required>
    <input type="number" step="any" name="quantity" placeholder="Quantity" required>
    <input type="number" step="any" name="unit_price" placeholder="Unit price" required>
    <button type="submit" name="add_product">Add</button>
</form>

<h2>Current Stock</h2>
<table>
    <tr><th>Name</th><th>Quantity</th><th>Unit Price</th><th>Add/Subtract Qty</th></tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><?= $product['quantity'] ?></td>
            <td><?= number_format($product['unit_price'], 2) ?></td>
            <td>
                <form method="post" style="display:inline">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <input type="number" step="any" name="delta_qty" value="0" required>
                    <button type="submit" name="update_qty">Update</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
