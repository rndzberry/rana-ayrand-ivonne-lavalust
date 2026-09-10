<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="<?= base_url('css/products.css') ?>">
</head>
<body>
    <div class="container form-container">
        <div class="header">
            <h1><span class="heart">♡</span>Edit Product</h1>
        </div>

        <div class="card">
            <?php $product = $product ?? []; ?>
            <?php if (!empty($errors)): ?>
                <ul class="errors">
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <form method="post" action="<?= site_url('products/edit/' . (int) ($product['id'] ?? 0)) ?>">
                <label>
                    Product name
                    <input type="text" name="product_name" maxlength="100" required value="<?= htmlspecialchars($product['product_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                </label>
                <label>
                    Description
                    <textarea name="description"><?= htmlspecialchars($product['description'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                </label>
                <label>
                    Price
                    <input type="number" name="price" min="0" step="0.01" required value="<?= htmlspecialchars($product['price'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                </label>
                <label>
                    Quantity
                    <input type="number" name="quantity" min="0" step="1" required value="<?= htmlspecialchars($product['quantity'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                </label>
                <button type="submit">Save Changes</button>
                <a class="button" href="<?= site_url('products') ?>">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>
