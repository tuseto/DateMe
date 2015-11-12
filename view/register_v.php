<?php

class RegisterView {

    public function initView() {

        $title = 'Register';
        include '../templates/header.php';
        ?>
        <h2>Register</h2>
        <div>
            <form action="" method="POST" name="login_form" enctype="multipart/form-data">
                Name: <input type="text" name="username" >*<br>
                Pass: <input type="password" name="password" >*<br>
                Email: <input type="text" name="email" >*<br>
                Phone: <input type="text" name="phone"><br>
                Bdate: <input type="date" name="bdate" >*<br>
                Info: <textarea name="information" rows="5" cols="40"></textarea><br>
                Interests: <input type="text" name="interests"><br>
                City: <input type=  "text" name="city" >*<br>
                Image: <input type="file" name="image" >*<br>
                <input type="submit" name="submit"><br>
            </form>
        </div>
        <?php 
        include '../templates/footer.php';
    }

}
