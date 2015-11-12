<?php

class UploadPicture {

    

    public function __construct($image, $username) {
        //This code repeats in validation.php
        $target_dir = "./user_pics/";
        $target_file = $target_dir . $username . '_' . basename($image["name"]);
        //end
        if (move_uploaded_file($image["tmp_name"], $target_file))
        {
            echo "The file " . basename($image["name"]) . " has been uploaded.";
        }
        else
        {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}
