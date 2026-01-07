<?php

$css_version = filemtime('login.css'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cospharm - Login</title>
    <link rel="stylesheet" href="login.css?v=<?php echo $css_version; ?>">
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
            <div class="login-card">
                
                <h1 class="main-title">LOGIN</h1>
                
                <form action="handle_login.php" method="POST" class="login-form">
                    
                    <input type="email" id="email" name="email" placeholder="Email address" required>
                    
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    
                    <select id="role" name="role" required>
                        <option value="" disabled selected>Select Login Role...</option>
                        <option value="requestor">Requestor</option>
                        <option value="administrator">Administrator</option>
                        <option value="line_manager">Line Manager</option>
                        <option value="finance">Finance</option>
                    </select>

                    <button type="submit" class="btn-sign-in">Sign in</button>
                    
                    <a href="reset_password.php" class="link-forgot-password">Forgot password</a>
                    
                </form>

            </div>
        </div>
        
    </div>

</body>
</html>