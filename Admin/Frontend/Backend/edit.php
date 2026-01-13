<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from the form 
    $id = $_POST['user_id']; 
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $unit = $_POST['unit'];
    $desig = $_POST['designation'];

    try {
        $sql = "UPDATE users SET first_name=?, last_name=?, email_address=?, unit_name=?, designation=? WHERE user_id=?";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute([$fname, $lname, $email, $unit, $desig, $id])) {
            // Redirectto dashboard.php
            header("Location: ../dashboard.php?msg=updated");
            exit();
        } else {
            echo "Update failed in the database.";
        }
    } catch (PDOException $e) {
        die("Database Error: " . $e->getMessage());
    }
}
?>