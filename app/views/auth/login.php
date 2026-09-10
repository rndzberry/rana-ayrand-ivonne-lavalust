<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (!empty($error)): ?><p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
    <form method="post" action="<?= site_url('login') ?>">
        <label>Username
            <input type="text" name="username" required value="<?= htmlspecialchars($username ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </label><br>
        <label>Password
            <input type="password" name="password" required>
        </label><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>