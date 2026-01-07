

<?php

$css_version = filemtime('style.css'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cospharm - CASH/EFT REQUISITION Menu</title>
    <link rel="stylesheet" href="style.css?v=<?php echo $css_version; ?>">
</head>
<body>

    <div class="page-container">
        
        <header class="header">
            <div class="logo">
                <img src="../../cospharm_logo.png" alt="Cospharm Logo">
            </div>
        
            <div class="user-icon">
                <a href="profile_page.php" title="View Profile">
                    <img src="../../user_profile_icon.png" alt="User Profile">
                </a>
            </div>
        </header>

        <main class="main-content">
            <h1 class="main-title">CASH/EFT REQUISITION</h1>

            
            <a href="requisition_form.php" class="btn-create">
                Create Requisition
            </a>

            <p class="or-separator">OR</p>

           
            <div class="button-grid">
                
                <!-- 1. Manage Requisition -->
                <a href="requisition_dashboard.php" class="btn-secondary">
                    Manage Requisition
                </a>

                <!-- 2. View My Draft -->
                <a href="view_my_drafts.php" class="btn-secondary">
                    View My Draft
                </a>

                <!-- 3. View All Requisitions -->
                <a href="view_all_requisitions.php" class="btn-secondary">
                    View All Requisitions
                </a>

                <!-- 4. Search Requisition -->
                <a href="search_requisition.php" class="btn-secondary">
                    Search Requisition
                </a>
            </div>
        </main>
    </div>

</body>
</html>