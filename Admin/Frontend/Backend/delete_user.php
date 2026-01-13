<?php
require_once "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM users WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute([$id])) {
            header("Location: ../dashboard.php?msg=deleted");
            exit();
        }
    } catch (PDOException $e) {
        die("Delete Error: " . $e->getMessage());
    }
} else {
    header("Location: ../dashboard.php");
    exit();
}
?>