<?php
$title = 'Home';
include '../templates/header.php';
?>
<h2>Home</h2>
<h3>Last registered users</h3>
<?php

class HomeView {

    public function init_view($users) {
        echo '<div class=home_view>';
        foreach ($users as $user)
        {
            if (!isset($_SESSION['username']))
            {
                echo '<span class=user><a href=index.php?other_view=' . $user['id'] . '>' . $user['username'] . '</a>' . '<br><img src=./user_pics/user_thumbnails/' . $user['picture'] . '></span>';
            }
            elseif ($_SESSION['username'] != $user['username'])
            {
                echo '<span class=user><a href=index.php?other_view=' . $user['id'] . '>' . $user['username'] . '</a>' . '<br><img src=./user_pics/user_thumbnails/' . $user['picture'] . '></span>';
            }
        }
                echo '</div>';

    }

}
?>

<?php include '../templates/footer.php'; ?>