<?php
$title = 'Dates';
include '../templates/header.php';
?>
<h2>Dates List</h2>
<?php

class DatesListView {

    public function init($sended) {
        echo '<h3>Requested Dates</h3>';

        foreach ($sended as $date)
        {
            $ans_status = '';
            if ($date['answer_status'] == 0)
            {
                $ans_status = 'Pending';
            }
            elseif ($date['answer_status'] == 1)
            {
                $ans_status = 'Accepted';
            }
            else
            {
                $ans_status = 'Rejected';
            }
            echo $date['username'] .
            '<br><img src=./user_pics/user_thumbnails/' . $date['picture'] . '><br> Place: ' . $date['place'] . '<br>
                Reason: ' . $date['reason'] . '<br>
                    Status: ' . $ans_status . '<br><br>';
        }
    }

    public function init_received($received) {
        echo '<h3>Received Dates</h3>';

        foreach ($received as $date)
        {


            echo $date['username'] .
            '<br><img src=./user_pics/user_thumbnails/' . $date['picture'] . '><br>Place: ' . $date['place'] . '<br>
                Reason: ' . $date['reason'] . '<br>';
            if ($date['answer_status'] == 0)
            {

                echo '<a href=index.php?dateslist=approve&id=' . $date['id'] . '>approve</a> <a href=index.php?dateslist=reject&id=' . $date['id'] . '>reject</a>';
            }
            elseif ($date['answer_status'] == 1)
            {
                echo 'Accepted';
            }
            else
            {
                echo 'Rejected';
            }

            echo '<br><br>';
        }
    }

    public function warning() {
        echo 'Please register or login';
    }

}

include '../templates/footer.php';
?>
