<?php

$css_version = filemtime('view_my_drafts.css'); 


$draft_requisitions = [
    [
        'id' => 1, 'unit_name' => 'SA HQ', 'requestor_name' => 'Hm', 'designation' => 'IT', 
        'description' => 'Refund', 'date_created' => '20/08/2025', 'total' => 'R10',
        'quote1' => true, 'quote2' => false, 'quote3' => false
    ],
    [
        'id' => 2, 'unit_name' => 'SA', 'requestor_name' => 'Hm', 'designation' => 'IT', 
        'description' => 'Laptop', 'date_created' => '21/08/2025', 'total' => 'R20',
        'quote1' => true, 'quote2' => true, 'quote3' => false
    ],
    [
        'id' => 3, 'unit_name' => 'Fin', 'requestor_name' => 'mm', 'designation' => 'IT', 
        'description' => 'Router', 'date_created' => '22/08/2025', 'total' => 'R122',
        'quote1' => true, 'quote2' => false, 'quote3' => false
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cospharm - View My Drafts</title>
    <link rel="stylesheet" href="view_my_drafts.css?v=<?php echo $css_version; ?>">
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
                    <span class="icon">&#x1F50D;</span> Search Requisition
                </a>
                <a href="#" class="nav-item active">
                    <span class="icon">&#x270F;</span> View My Draft
                </a>
            </nav>

       
            <main class="main-content">
                <h1 class="main-title">Drafts</h1>

              
                <div class="table-container">
                    <table class="drafts-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Unit Name</th>
                                <th>Requestor's Name</th>
                                <th>Designation</th>
                                <th>Description</th>
                                <th>Date Created</th>
                                <th>Total</th>
                                <th>Quote 1</th>
                                <th>Quote 2</th>
                                <th>Quote 3</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($draft_requisitions as $draft): ?>
                            <tr>
                                <td><?php echo $draft['id']; ?></td>
                                <td><?php echo $draft['unit_name']; ?></td>
                                <td><?php echo $draft['requestor_name']; ?></td>
                                <td><?php echo $draft['designation']; ?></td>
                                <td><?php echo $draft['description']; ?></td>
                                <td><?php echo $draft['date_created']; ?></td>
                                <td><?php echo $draft['total']; ?></td>
                                <td><?php echo $draft['quote1'] ? '<a href="#" class="quote-icon">&#x1F4C4;</a>' : ''; ?></td>
                                <td><?php echo $draft['quote2'] ? '<a href="#" class="quote-icon">&#x1F4C4;</a>' : ''; ?></td>
                                <td><?php echo $draft['quote3'] ? '<a href="#" class="quote-icon">&#x1F4C4;</a>' : ''; ?></td>
                                <td>
                                    <button class="btn-edit" onclick="alert('Editing Draft ID: <?php echo $draft['id']; ?>')">Edit</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

</body>
</html>
