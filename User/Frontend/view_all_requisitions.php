<?php

$css_version = filemtime('view_all_requisitions.css'); 


$requisitions = [
    [
        'id' => 1, 'description' => 'Refund', 'date_created' => '20/08/2025', 'total' => 'R10',
        'mgr_approval' => 'Pending', 'mgr_date_mod' => '20/08/2025', 'mgr_notes' => '',
        'fin_approval' => 'Awaiting', 'fin_date_mod' => '01/09/2025', 'fin_notes' => 'Need a quote of R150 for tools',
        'quote1' => true, 'quote2' => false, 'quote3' => false
    ],
    [
        'id' => 2, 'description' => 'Laptops', 'date_created' => '21/08/2025', 'total' => 'R20',
        'mgr_approval' => 'Approved', 'mgr_date_mod' => '22/08/2025', 'mgr_notes' => 'Got quote from other stores',
        'fin_approval' => 'Approved', 'fin_date_mod' => '02/09/2025', 'fin_notes' => '',
        'quote1' => true, 'quote2' => true, 'quote3' => false
    ],
    [
        'id' => 3, 'description' => 'Router', 'date_created' => '23/08/2025', 'total' => 'R122',
        'mgr_approval' => 'Forwarded to Finance', 'mgr_date_mod' => '24/08/2025', 'mgr_notes' => '',
        'fin_approval' => 'Awaiting', 'fin_date_mod' => '', 'fin_notes' => '',
        'quote1' => false, 'quote2' => false, 'quote3' => false
    ],
    [
        'id' => 4, 'description' => 'Printer', 'date_created' => '25/08/2025', 'total' => 'R50',
        'mgr_approval' => 'Rejected', 'mgr_date_mod' => '26/08/2025', 'mgr_notes' => 'Not on the budget',
        'fin_approval' => 'Rejected', 'fin_date_mod' => '', 'fin_notes' => '',
        'quote1' => false, 'quote2' => false, 'quote3' => false
    ],
    [
        'id' => 5, 'description' => 'Table', 'date_created' => '26/08/2025', 'total' => 'R1000',
        'mgr_approval' => 'Forwarded to Finance', 'mgr_date_mod' => '27/08/2025', 'mgr_notes' => '',
        'fin_approval' => 'Rejected', 'fin_date_mod' => '03/09/2025', 'fin_notes' => 'Out of budget',
        'quote1' => true, 'quote2' => true, 'quote3' => true
    ],
    [
        'id' => 6, 'description' => 'Access Point', 'date_created' => '28/08/2025', 'total' => 'R80',
        'mgr_approval' => 'Awaiting', 'mgr_date_mod' => '31/08/2025', 'mgr_notes' => '',
        'fin_approval' => 'Awaiting', 'fin_date_mod' => '', 'fin_notes' => '',
        'quote1' => false, 'quote2' => false, 'quote3' => false
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cospharm - View All Requisitions</title>
    <link rel="stylesheet" href="view_all_requisitions.css?v=<?php echo $css_version; ?>">
</head>
<body>

    <div class="page-container">
        
        <header class="header">
            <div class="logo">
               <img src="../../cospharm_logo.png" alt="Cospharm Logo">
            </div>
            <div class="user-icon">
                <img src="../../user_profile_icon.png" alt="User Profile">
            </div>
        </header>

        <div class="content-wrapper">
            
            <nav class="sidebar">
                <a href="#" class="nav-item home-icon">
                    <span class="icon">&#x2302;</span> 
                </a>
                <a href="#" class="nav-item">
                    <span class="icon">&#x270F;</span> Create Requisition
                </a>
                 <a href="#" class="nav-item">
                    <span class="icon">&#x1F50D;</span> Search Requisition
                </a>
                <a href="#" class="nav-item">
                    <span class="icon">&#x1F4DC;</span> Manage Requisition
                </a>
                <a href="#" class="nav-item">
                    <span class="icon">&#x270F;</span> View My Draft
                </a>
            </nav>

            <main class="main-content">
                <h1 class="main-title">View Requisitions</h1>

                <div class="table-container">
                    <table class="requisition-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Description</th>
                                <th>Date Created</th>
                                <th>Total</th>
                                <th>Manager's approval</th>
                                <th>Date Modified</th>
                                <th>Notes(Manager)</th>
                                <th>Finance approval</th>
                                <th>Date Modified</th>
                                <th>Notes(Finance)</th>
                                <th>Quote 1</th>
                                <th>Quote 2</th>
                                <th>Quote 3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($requisitions as $req): ?>
                            <tr>
                                <td><?php echo $req['id']; ?></td>
                                <td><?php echo $req['description']; ?></td>
                                <td><?php echo $req['date_created']; ?></td>
                                <td><?php echo $req['total']; ?></td>
                                <td><?php echo $req['mgr_approval']; ?></td>
                                <td><?php echo $req['mgr_date_mod']; ?></td>
                                <td><?php echo $req['mgr_notes']; ?></td>
                                <td><?php echo $req['fin_approval']; ?></td>
                                <td><?php echo $req['fin_date_mod']; ?></td>
                                <td><?php echo $req['fin_notes']; ?></td>
                                <td><?php echo $req['quote1'] ? '<a href="#" class="quote-icon">&#x1F4C4;</a>' : ''; ?></td>
                                <td><?php echo $req['quote2'] ? '<a href="#" class="quote-icon">&#x1F4C4;</a>' : ''; ?></td>
                                <td><?php echo $req['quote3'] ? '<a href="#" class="quote-icon">&#x1F4C4;</a>' : ''; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination-arrows">
                    <button class="arrow-button disabled">&#x276E;</button> 
                    <button class="arrow-button">&#x276F;</button> 
                </div>
            </main>
        </div>
    </div>

</body>
</html>