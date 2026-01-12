<?php
require_once "../Frontend/Backend/config.php";

$stmt = $pdo->query("SELECT user_id, email_address, first_name, last_name, unit_name, designation, is_active FROM users");
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Live Data</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<div class="sidebar">
    <h2>Cospharm</h2>
    <a href="#" class="active">Users</a>
    </div>

<div class="main-content">
    <header>
        <h1>User Management</h1>
        <button class="btn-add">+ Add New User</button>
    </header>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Unit</th>
                    <th>Designation</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['user_id']) ?></td>
                    <td><strong><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></strong></td>
                    <td><?= htmlspecialchars($user['email_address']) ?></td>
                    <td><?= htmlspecialchars($user['unit_name']) ?></td>
                    <td><?= htmlspecialchars($user['designation']) ?></td>
                    <td>
                        <span class="status-badge <?= $user['is_active'] ? 'active' : 'inactive' ?>">
                            <?= $user['is_active'] ? 'Active' : 'Inactive' ?>
                        </span>
                    </td>
                    <td>
                        <button class="btn-edit">Edit</button>
                        <button class="btn-delete">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div id="userModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add New User</h2>
        <form action="Backend/add_user.php" method="POST">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="unit" placeholder="Unit (e.g. Finance)" required>
            <input type="text" name="designation" placeholder="Designation" required>
            <button type="submit" class="btn-add">Save User</button>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById("userModal");
    const btn = document.querySelector(".btn-add");
    const span = document.querySelector(".close");

 
    btn.onclick = () => modal.style.display = "block";

    
    span.onclick = () => modal.style.display = "none";

    
    window.onclick = (event) => {
        if (event.target == modal) modal.style.display = "none";
    }
</script>

</body>
</html>