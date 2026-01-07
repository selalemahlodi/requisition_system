<?php

$css_version = filemtime('search_requisition.css'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cospharm - Search Requisition</title>
    <link rel="stylesheet" href="search_requisition.css?v=<?php echo $css_version; ?>">
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

                <div class="search-options-container">
                    <button class="btn-search-by">
                        Search by: <span class="arrow-icon">&#x27A1;</span>
                    </button>

                    <div class="option-buttons-group">
                        <button class="btn-option" type="button">ID</button>
                        <button class="btn-option" type="button">Description</button>
                        <button class="btn-option" type="button">Date Created</button>
                        <button class="btn-option" type="button">Total</button>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>
</html>