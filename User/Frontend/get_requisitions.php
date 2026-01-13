<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');


require_once 'config.php'; 


if (!isset($pdo)) {
    echo json_encode(["error" => "Database connection variable (\$pdo) not found. Check config.php"]);
    exit;
}

try {
 
    $sql = "SELECT 
                r.requisition_id AS id,
                (SELECT item_description FROM requisition_items WHERE requisition_id = r.requisition_id LIMIT 1) AS description,
                r.date_created,
                r.total,
                a.manager_status,
                a.manager_date_modified,
                a.manager_note,
                a.finance_status,
                a.finance_date_modified,
                a.finance_note
            FROM requisitions r
            LEFT JOIN approvals a ON r.requisition_id = a.requisition_id
            ORDER BY r.date_created DESC";

 
    $stmt = $pdo->query($sql);
    $data = $stmt->fetchAll();

    echo json_encode($data);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Query Failed: " . $e->getMessage()]);
}
?>