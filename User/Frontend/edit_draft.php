<?php

$css_version = filemtime('edit_draft.css'); 
$js_version = filemtime('edit_draft.js');

$draft_data = [
    'id' => 1,
    'unit_name' => 'SA HQ',
    'designation' => 'IT',
    'requestor_name' => 'John Doe',
    'requisition_date' => '2023-10-26', 
    'items' => [
        ['description' => 'Refund processing fee', 'amount' => 50.00],
        ['description' => 'Software license renewal', 'amount' => 250.75],
        ['description' => 'New monitor for IT dept', 'amount' => 1800.00],
    ],
    'attached_quote' => 'quote_for_draft_1.pdf'
];

$initial_total = 0;
foreach ($draft_data['items'] as $item) {
    $initial_total += $item['amount'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cospharm - Edit Drafts (ID: <?php echo $draft_data['id']; ?>)</title>
    <link rel="stylesheet" href="edit_draft.css?v=<?php echo $css_version; ?>">
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
                    <span class="icon">&#x1F50D;</span> Search Requisition
                </a>
                <a href="#" class="nav-item">
                    <span class="icon">&#9776;</span> View All Requisitions
                </a>
                <a href="#" class="nav-item active">
                    <span class="icon">&#x270F;</span> View My Draft
                </a>
            </nav>

            <main class="main-form">
                <h1 class="main-title">Edit Drafts</h1>

                <form action="update_draft.php" method="POST" class="requisition-form" enctype="multipart/form-data">
                    <input type="hidden" name="draft_id" value="<?php echo $draft_data['id']; ?>">
                    
                    <div class="form-row header-fields">
                        <label>Name of the unit: <input type="text" name="unit_name" value="<?php echo htmlspecialchars($draft_data['unit_name']); ?>"></label>
                        <label>Designation: <input type="text" name="designation" value="<?php echo htmlspecialchars($draft_data['designation']); ?>"></label>
                    </div>

                    <div class="form-row header-fields">
                        <label>Requestor's name: <input type="text" name="requestor_name" value="<?php echo htmlspecialchars($draft_data['requestor_name']); ?>"></label>
                        <label>Date: <input type="date" name="requisition_date" value="<?php echo htmlspecialchars($draft_data['requisition_date']); ?>"></label>
                    </div>

                    <div class="item-table">
                        <div class="table-header">
                            <span class="col-desc">Description</span>
                            <span class="col-amount">Amount</span>
                        </div>
                        
                        <div id="itemRowsContainer"> 
                            <?php foreach ($draft_data['items'] as $item): ?>
                            <div class="table-row">
                                <input type="text" name="description[]" class="input-desc" value="<?php echo htmlspecialchars($item['description']); ?>">
                                <input type="number" step="0.01" name="amount[]" class="input-amount" value="<?php echo htmlspecialchars($item['amount']); ?>">
                            </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="table-actions">
                            
                            <input type="file" id="quoteFile" name="quote_attachment" accept=".pdf,.doc,.docx" style="display: none;">
                            
                            <a class="action-link" id="attachQuoteLink">Attach quote &#x1F517;</a>
                            
                            <a class="action-link" id="addRowLink">Add row &#x2795;</a>
                        </div>

                        <div id="fileNameDisplay" style="text-align: right; margin-top: 5px; font-style: italic;">
                            <?php if (!empty($draft_data['attached_quote'])): ?>
                                Attached file: <?php echo htmlspecialchars($draft_data['attached_quote']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="total-section">
                        <div class="total-label">TOTAL</div>
                        <div class="total-amount"><input type="text" name="total" id="totalAmount" readonly value="<?php echo number_format($initial_total, 2); ?>"></div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-secondary">Save as draft</button>
                        <button type="submit" class="btn-primary">submit</button>
                    </div>

                </form>
            </main>
        </div>
    </div>
    
    <script src="edit_draft.js?v=<?php echo $js_version; ?>"></script>

</body>
</html>