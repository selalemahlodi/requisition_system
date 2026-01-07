<?php

$css_version = filemtime('profile_page.css'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cospharm - User Profile</title>
    <link rel="stylesheet" href="profile_page.css?v=<?php echo $css_version; ?>">
</head>
<body>

    <div class="page-container">
        
        <header class="header">
            <div class="logo">
                <img src="../../cospharm_logo.png" alt="Cospharm Logo">
            </div>
            <div class="user-icon">
                <img src="../../logout.jpg" alt="logout icon">
            </div>
        </header>

        <main class="profile-content-wrapper">
            
            <div class="profile-card">
                
                <form action="handle_profile_update.php" method="POST">

                    <div class="profile-details-section">
                        <div class="profile">
                            <img src="../../profile.png" alt="User profile">
                        </div>
                        <div class="profile-fields">
                            
                            <div class="field-row">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" value="Mahlodi" required>
                                <input type="text" id="surname" name="surname" value="S" class="input-short" required>
                            </div>

                            <div class="field-row">
                                <label for="email">Email Address:</label>
                                <input type="email" id="email" name="email" value="supportza@cospharm.org" required>
                            </div>

                            <div class="field-row">
                                <label for="phone">Phone Number:</label>
                                <input type="text" id="phone" name="phone" value="" required>
                                <span class="ext-label">Ext</span>
                                <input type="text" id="ext" name="ext" value="" class="input-short">
                            </div>

                            <div class="field-row">
                                <label for="mobile">Mobile Number:</label>
                                <input type="text" id="mobile" name="mobile" value="">
                            </div>
                        </div>
                    </div>

                    <div class="password-section">
                        <h2>Choose a new password</h2>
                        
                        <div class="field-row">
                            <label for="password">Password *</label>
                            <input type="password" id="password" name="password">
                            <span class="password-strength-placeholder">Password strength:</span>
                            <div class="strength-bar"></div>
                        </div>

                        <div class="field-row">
                            <label for="confirm_password">Confirm password *</label>
                            <input type="password" id="confirm_password" name="confirm_password">
                        </div>
                    </div>

                    <div class="action-buttons">
                        <button type="submit" class="btn-save"><span class="icon">&#x1F4BE;</span> Save Changes</button>
                        <button type="button" class="btn-cancel"><span class="icon">&#x2715;</span> Cancel</button>
                    </div>

                </form>
            </div>
        </main>
    </div>

</body>
</html>