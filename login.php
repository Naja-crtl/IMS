<?php
// Check login credentials (replace with your actual authentication logic)
$username = $_POST['username'];
$password = $_POST['password'];

if ($username === 'admin' && $password === 'password') {
    // Redirect to management page on successful login
    header('Location: management.php');
} else {
    // Redirect back to the login page on failed login
    header('Location: index.html');
}
?>
