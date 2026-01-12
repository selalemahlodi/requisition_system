<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $unit = $_POST['unit'];
    $designation = $_POST['designation'];
    $role_id = 1; 
    $is_active = 1;
    $password = password_hash('12345', PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO users (role_id, email_address, password_hash, first_name, last_name, unit_name, designation, is_active) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$role_id, $email, $password, $first_name, $last_name, $unit, $designation, $is_active]);

        header("Location: ../dashboard.php?success=1");
    } catch (PDOException $e) {
        die("Error adding user: " . $e->getMessage());
    }
}
?>