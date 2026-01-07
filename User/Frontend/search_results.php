<?php

$css_version = filemtime('search_results.css'); 

$search_results = [
    [
        'id' => 1, 'description' => 'Refund', 'date_created' => '23/09/2025', 'total' => 'R10',
        'mgr_approval' => 'Pending', 'mgr_date_mod' => '26/09/2025', 'mgr_notes' => '',
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
    <title>Cospharm - Search Results</title>
    <link rel="stylesheet" href="search_results.css?v=<?php echo $css_version; ?>">
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
                    <span class="icon">&#x1F4DC;</span> Create Requisition
                </a>
                 <a href="#" class="nav-item">
                    <span class="icon">&#9776;</span> View All Requisitions
                </a>
                <a href="#" class="nav-item">
                    <span class="icon">&#x1F4DC;</span> Manage Requisition
                </a>
                <a href="#" class="nav-item">
                    <span class="icon">&#x270F;</span> View My Draft
                </a>
            </nav>

            <main class="main-content">
                <h1 class="main-title">Search your Requisition</h1>

                <button class="btn-search-results">
                    Searched Results:
                </button>

                <div class="table-container">
                    <table class="results-table">
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
                            <?php foreach ($search_results as $req): ?>
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