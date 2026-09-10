<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Module</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            font-family: Arial, sans-serif;
            background: #fff5f8;
            color: #4a3a40;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            color: #d86b91;
            font-size: 30px;
            font-weight: 600;
        }

        .header p {
            margin-top: 6px;
            color: #9b7b86;
            font-size: 14px;
        }

        .card {
            background: #ffffff;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 6px 20px rgba(214, 107, 145, 0.10);
            border: 1px solid #f8dce6;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            background: #fce4ec;
            color: #b9567b;
            padding: 13px 15px;
            text-align: left;
            font-size: 14px;
            font-weight: 600;
        }

        th:first-child {
            border-radius: 10px 0 0 10px;
        }

        th:last-child {
            border-radius: 0 10px 10px 0;
        }

        td {
            padding: 14px 15px;
            border-bottom: 1px solid #f5e5ea;
            font-size: 14px;
        }

        tbody tr {
            transition: 0.2s ease;
        }

        tbody tr:hover {
            background: #fff7fa;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .id {
            color: #d86b91;
            font-weight: 600;
        }

        .username {
            color: #c45f84;
            font-weight: 500;
        }

        .empty {
            text-align: center;
            color: #a98d96;
            padding: 30px;
        }

        .heart {
            color: #e88baa;
            margin-right: 6px;
        }

        @media (max-width: 600px) {
            body {
                padding: 25px 12px;
            }

            .card {
                padding: 15px;
            }

            .header h1 {
                font-size: 25px;
            }

            th, td {
                padding: 11px 10px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">
            <h1><span class="heart">♡</span>Users</h1>
            <p>User Management Module</p>
        </div>

        <div class="card">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Username</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($users)) : ?>

                            <?php foreach ($users as $user) : ?>

                                <tr>
                                    <td class="id">
                                        <?= htmlspecialchars($user->id ?? $user['id']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($user->firstname ?? $user['firstname']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($user->lastname ?? $user['lastname']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($user->email ?? $user['email']) ?>
                                    </td>

                                    <td class="username">
                                        <?= htmlspecialchars($user->username ?? $user['username']) ?>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>
                                <td colspan="5" class="empty">
                                    No users found ♡
                                </td>
                            </tr>

                        <?php endif; ?>
                    </tbody>

                </table>
            </div>
        </div>

    </div>

</body>
</html>