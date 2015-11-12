<?php

$title = 'Login';
include '../templates/header.php';

class LoginView {

    public function init_view() {
        if (!isset($_SESSION['isLogged']))
        {
            echo '<h2>Login</h2>
<div>
    <form action="" method="POST" name="login_form">
        Name: <input type="text" name="username"><br>
        Pass: <input type="password" name="password"><br>
        <input type="submit" name="submit">
    </form>
</div>';
        }
    }

}
?>

<?php include '../templates/footer.php'; ?>
