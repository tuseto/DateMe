<?php
$title = 'Profile';
include '../templates/header.php';
?>
<h2>Profile view</h2>
<?php

class OtherView {

    public function init($data) {
        if (isset($_SESSION['username']))
        {
            foreach ($data as $k => $v)
            {

                if ($k != 'id' && $k != 'picture' && $k != 'password' && $k != 'email')
                {
                    echo '<div>' . $k . ': ' . $v . '</div>';
                }
            }
            echo '<img src=./user_pics/user_thumbnails/' . $data['picture'] . '><br>';
            if ($data['username'] != $_SESSION['username'])
            {
                echo '<a href=index.php?dateme='.$data['id'].'>Date Me</a>';
            }
        }
    }

}

include '../templates/footer.php';

