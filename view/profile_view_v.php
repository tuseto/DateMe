<?php
$title = 'Profile';
include '../templates/header.php';
?>
<h2>Profile view</h2>

<?php

class ProfileViewView {
    
    public function init($data){
        $this->showProfile($data);
        $this->showChanges();
        
    }

    public function showChanges() {


        if ($_GET['viewprofile'] != '' && $_GET['viewprofile'] != 'image') {
            echo 'New ' . $_GET['viewprofile'] . ': <form action="" method="POST" name="login_form" enctype="multipart/form-data">'
            . '<input type=text name=' . $_GET['viewprofile'] . '>'
            . '<input type=submit name=submit></form>';
        }
        if ($_GET['viewprofile'] == 'image'):
            ?>
            New image: <form action="" method="POST" name="login_form" enctype="multipart/form-data">
                <input type=file name=image><input type=submit name=submit> <?php
            endif;
        }

        public function showProfile($data) {
            if (isset($_SESSION['username'])) {
                foreach ($data as $k => $v) {

                    if ($k != 'id' && $k != 'picture') {
                        if ($k != 'email' && $k != 'bdate' && $k != 'password') {
                            echo '<div>' . $k . ': ' . $v . ' <a href=index.php?viewprofile=' . $k . '>Change</a></div>';
                        }
                        elseif ($k == 'password') {
                            echo '<div>' . $k . '  <a href=index.php?viewprofile=' . $k . '>Change</a></div>';
                        }
                        else {
                            echo '<div>' . $k . ': ' . $v . '';
                        }
                    }
                }
                echo '<img src=./user_pics/user_thumbnails/' . $data['picture'] . '><a href=index.php?viewprofile=image>Change</a><br>';
            }
        }

    }

    include '../templates/footer.php';

//--------------------------------------
    