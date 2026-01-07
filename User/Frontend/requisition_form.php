<?php

$css_version = filemtime('form_style.css'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cospharm - Creating a Requisition</title>
    <link rel="stylesheet" href="form_style.css?v=<?php echo $css_version; ?>">
    </head>
<body>

    <div class="page-container">
        
        <header class="header">
            <div class="logo">
                <img src="../../cospharm_logo.png" alt="Cospharm Logo">
            </div>
            <div class="user-icon">
                <img src="../../user_profile_icon.png" alt="User Profile"> </div>
        </header>

        <div class="content-wrapper">
            
            <nav class="sidebar">
                <a href="#" class="nav-item home-icon">
                    <span class="icon">&#x2302;</span> </a>
                <a href="#" class="nav-item">
                    <span class="icon">&#9776;</span> View All Requisitions
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

            <main class="main-form">
                <h1 class="main-title">Creating a Requisition</h1>

                <form action="submit_requisition.php" method="POST" class="requisition-form">
                    
                    <div class="form-row header-fields">
                        <label>Name of the unit: <input type="text" name="unit_name"></label>
                        <label>Designation: <input type="text" name="designation"></label>
                    </div>

                    <div class="form-row header-fields">
                        <label>Requestor's name: <input type="text" name="requestor_name"></label>
                        <label>Date: <input type="date" name="requisition_date"></label>
                    </div>

                    <div class="item-table">
                        <div class="table-header">
                            <span class="col-desc">Description</span>
                            <span class="col-amount">Amount</span>
                        </div>
                        
                        <div class="table-row">
                            <input type="text" name="description[]" class="input-desc">
                            <input type="number" step="0.01" name="amount[]" class="input-amount">
                        </div>
                        
                        <div class="table-actions">
                            <a href="#" class="action-link attach-quote">Attach quote &#x1F517;</a>
                            <a href="#" class="action-link add-row">Add row &#x2795;</a>
                        </div>
                    </div>
                    
                    <div class="total-section">
                        <div class="total-label">TOTAL</div>
                        <div class="total-amount"><input type="text" name="total" readonly value="0.00"></div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-secondary">Save as draft</button>
                        <button type="submit" class="btn-primary">submit</button>
                    </div>

                </form>
            </main>
        </div>
    </div>

</body>
</html>