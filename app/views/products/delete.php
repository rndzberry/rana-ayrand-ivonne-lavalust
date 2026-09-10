<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <link rel="stylesheet" href="<?= base_url('css/products.css') ?>">
</head>
<body>
    <div class="container form-container">
        <div class="header">
            <h1><span class="heart">♡</span>Delete Product</h1>
        </div>

        <div class="card">
            <?php $product = $product ?? []; ?>
            <p class="notice">Delete &quot;<?= htmlspecialchars($product['product_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>&quot;?</p>
            <form method="post" action="<?= site_url('products/delete/' . (int) ($product['id'] ?? 0)) ?>">
                <button type="submit">Delete Product</button>
                <a class="button" href="<?= site_url('products') ?>">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>
