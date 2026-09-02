<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management Module</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; max-width: 800px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Users</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Username</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)) : ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= htmlspecialchars($user->id ?? $user['id']) ?></td>
                        <td><?= htmlspecialchars($user->firstname ?? $user['firstname']) ?></td>
                        <td><?= htmlspecialchars($user->lastname ?? $user['lastname']) ?></td>
                        <td><?= htmlspecialchars($user->email ?? $user['email']) ?></td>
                        <td><?= htmlspecialchars($user->username ?? $user['username']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr><td colspan="5">No users found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>