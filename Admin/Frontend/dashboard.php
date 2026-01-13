<?php

require_once "Backend/config.php";

$stmt = $pdo->query("SELECT user_id, email_address, first_name, last_name, unit_name, designation, is_active FROM users");
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<div class="sidebar">
    <h2>Cospharm</h2>
    <a href="#" class="active">Users</a>
</div>

<div class="main-content">
    <?php if (isset($_GET['msg'])): ?>
        <div id="statusAlert" class="custom-alert success">
            <span>
                <?php 
                    if($_GET['msg'] == 'deleted') echo "User successfully deleted.";
                    if($_GET['msg'] == 'updated') echo "User successfully updated.";
                ?>
            </span>
            <button class="close-alert" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
    <?php endif; ?>

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
                        <button class="btn-edit" 
                                data-id="<?= $user['user_id'] ?>" 
                                data-firstname="<?= htmlspecialchars($user['first_name']) ?>" 
                                data-lastname="<?= htmlspecialchars($user['last_name']) ?>" 
                                data-email="<?= htmlspecialchars($user['email_address']) ?>" 
                                data-unit="<?= htmlspecialchars($user['unit_name']) ?>" 
                                data-designation="<?= htmlspecialchars($user['designation']) ?>">
                            Edit
                        </button>
                        <button class="btn-delete" 
                                data-id="<?= $user['user_id'] ?>" 
                                data-name="<?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?>">
                            Delete
                        </button>                        
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
        <h2 id="modalTitle">Add New User</h2> 
        <form id="userForm" action="Backend/add_user.php" method="POST"> 
            <input type="hidden" name="user_id" id="modal_user_id">
            <input type="text" name="first_name" id="modal_first_name" placeholder="First Name" required>
            <input type="text" name="last_name" id="modal_last_name" placeholder="Last Name" required>
            <input type="email" name="email" id="modal_email" placeholder="Email Address" required>
            <input type="text" name="unit" id="modal_unit" placeholder="Unit" required>
            <input type="text" name="designation" id="modal_designation" placeholder="Designation" required>
            <button type="submit" id="submitBtn" class="btn-add">Save User</button>
        </form>
    </div>
</div>

<script>
const modal = document.getElementById("userModal");
const addBtn = document.querySelector(".btn-add"); 
const editBtns = document.querySelectorAll(".btn-edit"); 
const deleteBtns = document.querySelectorAll(".btn-delete");
const span = document.querySelector(".close");
const userForm = document.getElementById("userForm");

// ADD USER logic
addBtn.onclick = () => {
    userForm.action = "Backend/add_user.php";
    document.getElementById("modalTitle").innerText = "Add New User";
    document.getElementById("submitBtn").innerText = "Save User";
    userForm.reset();
    document.getElementById("modal_user_id").value = "";
    modal.style.display = "block";
}

// EDIT USER logic
editBtns.forEach(btn => {
    btn.onclick = function() {
        userForm.action = "Backend/update_user.php"; 
        document.getElementById("modalTitle").innerText = "Edit User";
        document.getElementById("submitBtn").innerText = "Update User";
        
        document.getElementById("modal_user_id").value = this.dataset.id;
        document.getElementById("modal_first_name").value = this.dataset.firstname;
        document.getElementById("modal_last_name").value = this.dataset.lastname;
        document.getElementById("modal_email").value = this.dataset.email;
        document.getElementById("modal_unit").value = this.dataset.unit;
        document.getElementById("modal_designation").value = this.dataset.designation;
        
        modal.style.display = "block";
    }
});

// DELETE USER logic
deleteBtns.forEach(btn => {
    btn.onclick = function() {
        const userId = this.dataset.id;
        const userName = this.dataset.name;
        if (confirm(`Are you sure you want to delete ${userName}?`)) {
            window.location.href = `Backend/delete_user.php?id=${userId}`;
        }
    }
});

// Modal close logic
span.onclick = () => modal.style.display = "none";
window.onclick = (event) => { if (event.target == modal) modal.style.display = "none"; }

// Auto-hide alert
window.onload = function() {
    const alert = document.getElementById('statusAlert');
    if (alert) {
        setTimeout(() => {
            alert.style.transition = "opacity 0.6s ease";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 600);
        }, 4000); 
    }
};
</script>
</body>
</html>