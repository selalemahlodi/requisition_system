<?php

$css_version = filemtime('reset_password.css'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cospharm - Forgot Password</title>
    <link rel="stylesheet" href="reset_password.css?v=<?php echo $css_version; ?>">
</head>
<body>

    <div class="page-container">
        
        <header class="header">
            <div class="logo">
                 <img src="cospharm_logo.png" alt="Cospharm Logo">
            </div>
            <div class="user-icon">
                <img src="user_profile_icon.png" alt="User Profile">
            </div>
        </header>

        <div class="main-content-wrapper">
            <div class="reset-card-wrapper">
                <div class="reset-card">
                    
                    <h1 class="main-title">Forgot your password</h1>
                    
                    <p class="description-text">
                        Please enter the email address you'd like your password reset information sent to
                    </p>

                    <form action="handle_reset.php" method="POST" class="reset-form">
                        
                        <label for="email_address">Enter email address:</label>
                        <input type="email" id="email_address" name="email_address" required>
                        
                        <button type="submit" class="btn-request">Request Reset Link</button>
                        
                        <a href="login.php" class="link-back-to-login">Back to login</a>
                        
                    </form>

                </div>
            </div>
        </div>
        
    </div>

</body>
</html>