<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Login</title>
    <link rel="stylesheet" href="<?= base_url('css/products.css') ?>">
</head>
<body>
    <div class="login-container">
        <div class="header">
            <h1><span class="heart">♡</span>Product Login</h1>
            <p class="subtitle">Product Management Module</p>
        </div>

        <div class="card">
            <?php if (!empty($error)): ?>
                <p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>

            <form method="post" action="<?= site_url('products/login') ?>">
                <label>
                    Username
                    <input type="text" name="username" required value="<?= htmlspecialchars($username ?? '', ENT_QUOTES, 'UTF-8') ?>">
                </label>
                <label>
                    Password
                    <input type="password" name="password" required>
                </label>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
