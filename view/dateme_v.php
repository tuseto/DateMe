<?php

$title = 'Date';
include '../templates/header.php';

class DateView {

    public function init_view() {
        if (isset($_SESSION['username']))
        {
            echo '<h1>Propose Date</h1>
<div>
    <form action="" method="POST" name="date_form">
        Place: <input type="text" name="place"><br>
        Reason: <input type="text" name="reason"><br>
        <input type="submit" name="submit">
    </form>
</div>';
        }
    }

}
?>

<?php include '../templates/footer.php'; ?>
