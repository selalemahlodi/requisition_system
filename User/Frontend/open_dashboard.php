<?php

$css_version = filemtime('open_dashboard.css'); 
$js_version = filemtime('dashboard_data.js'); 

$dashboard_stats = [
    ['label' => 'Dashboard', 'count' => '', 'color_class' => 'stat-dashboard'], 
    ['label' => 'Awaiting', 'count' => 4, 'color_class' => 'stat-awaiting'],
    ['label' => 'Approved', 'count' => 3, 'color_class' => 'stat-approved'],
    ['label' => 'Rejected', 'count' => 2, 'color_class' => 'stat-rejected'],
];

$requisition_summary = [
    ['id' => 6, 'description' => 'Access Point', 'date_created' => '25/08/2025', 'total' => 'R500', 'status' => 'Open', 'row_class' => 'status-open'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cospharm - Requisitions Management Dashboard</title>
    <link rel="stylesheet" href="open_dashboard.css?v=<?php echo $css_version; ?>">
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
                    <span class="icon">&#x1F4DC;</span> Manage Requisition
                </a>
                <a href="#" class="nav-item">
                    <span class="icon">&#x270F;</span> View My Draft
                </a>
            </nav>

            <main class="main-content">
                <h1 class="main-title">Requisitions Management Dashboard</h1>

                <div class="top-dashboard-section">
                    
                    <div class="stat-cards-container">
                        <?php foreach ($dashboard_stats as $stat): ?>
                        <div class="stat-card <?php echo $stat['color_class']; ?>">
                            <?php if (!empty($stat['count'])): ?>
                                <div class="stat-count"><?php echo $stat['count']; ?></div>
                            <?php endif; ?>
                            <div class="stat-label"><?php echo $stat['label']; ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="chart-container">
                        <h2>Completed</h2>
                        <div class="chart-placeholder">
                            <canvas id="completionChart"></canvas>
                        </div>
                        <div class="chart-legend-placeholder">
                            <div class="legend-item"><span class="legend-box approved"></span> Approved (70%)</div>
                            <div class="legend-item"><span class="legend-box rejected"></span> Rejected (30%)</div>
                        </div>
                    </div>

                </div>

                <div class="table-frame-container">
                    <table class="summary-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Description</th>
                                <th>Date Created</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($requisition_summary as $item): ?>
                            <tr class="<?php echo $item['row_class']; ?>">
                                <td><?php echo $item['id']; ?></td>
                                <td><?php echo $item['description']; ?></td>
                                <td><?php echo $item['date_created']; ?></td>
                                <td><?php echo $item['total']; ?></td>
                                <td><?php echo $item['status']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </main>
        </div>
    </div>
    
    <script src="dashboard_data.js?v=<?php echo $js_version; ?>"></script>

</body>
</html>
