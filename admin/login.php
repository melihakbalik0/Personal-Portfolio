<?php
// Error reporting enabled for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
// Database connection reference
require_once '../includes/db.php'; 

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // LOGIN BYPASS: Verification using static credentials
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = 1;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid username or password!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
</head>
<body style="background:#0A192F; color:white; display:flex; justify-content:center; align-items:center; height:100vh; font-family: sans-serif;">
    <form method="POST" style="background:#112240; padding:30px; border-radius:10px; border: 1px solid rgba(100,255,218,0.1);">
        <h2 style="color:#64FFDA; text-align:center; margin-bottom:20px;">Admin Login</h2>
        
        <?php if($error): ?>
            <p style="color:#ff6b6b; text-align:center; font-size:14px;"><?php echo $error; ?></p>
        <?php endif; ?>

        <input type="text" name="username" placeholder="Username" required 
               style="display:block; width:100%; padding:10px; margin-bottom:15px; background:#0A192F; border:1px solid #233554; color:white; border-radius:5px;"><br>
        
        <input type="password" name="password" placeholder="Password" required 
               style="display:block; width:100%; padding:10px; margin-bottom:15px; background:#0A192F; border:1px solid #233554; color:white; border-radius:5px;"><br>
        
        <button type="submit" 
                style="width:100%; padding:10px; background:transparent; border:2px solid #64FFDA; color:#64FFDA; cursor:pointer; border-radius:5px; font-weight:bold;">
            Login
        </button>
    </form>
</body>
</html>