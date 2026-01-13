<?php

$css_version = filemtime('view_all_requisitions.css'); 



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
    </tr>
</thead>
<tbody id="requisitionTableBody">
    </tbody>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    fetch('get_requisitions.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('requisitionTableBody');
            tableBody.innerHTML = ''; 

            data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${row.id}</td>
                    <td>${row.description || 'No description'}</td>
                    <td>${row.date_created}</td>
                    <td>R${row.total}</td>
                    <td class="status-${row.manager_status.toLowerCase()}">${row.manager_status}</td>
                    <td>${row.manager_date_modified || '-'}</td>
                    <td>${row.manager_note || ''}</td>
                    <td class="status-${row.finance_status.toLowerCase()}">${row.finance_status}</td>
                    <td>${row.finance_date_modified || '-'}</td>
                    <td>${row.finance_note || ''}</td>
                `;
                tableBody.appendChild(tr);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});
</script>
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