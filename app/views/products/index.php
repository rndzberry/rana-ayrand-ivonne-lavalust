<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management Module</title>
    <link rel="stylesheet" href="<?= base_url('css/products.css') ?>">
</head>
<body>
    <div class="container">
        <div class="header with-actions">
            <div>
                <h1><span class="heart">♡</span>Products</h1>
                <p>Product Management Module</p>
            </div>
            <div>
                <a class="button" href="<?= site_url('products/create') ?>">+ Add Product</a>
                <a href="<?= site_url('products/logout') ?>">Logout</a>
            </div>
        </div>

        <div class="card">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td class="id"><?= (int) ($product['id'] ?? 0) ?></td>
                                    <td><?= htmlspecialchars($product['product_name'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= nl2br(htmlspecialchars($product['description'] ?? '', ENT_QUOTES, 'UTF-8')) ?></td>
                                    <td class="price"><?= number_format((float) ($product['price'] ?? 0), 2) ?></td>
                                    <td class="quantity"><?= (int) ($product['quantity'] ?? 0) ?></td>
                                    <td class="actions">
                                        <a href="<?= site_url('products/edit/' . (int) $product['id']) ?>">Edit</a> |
                                        <a href="<?= site_url('products/delete/' . (int) $product['id']) ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="empty">No products found ♡</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
