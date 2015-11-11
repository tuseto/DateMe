<?php

class Validation {

    public static $err = array();

    private function __construct() {
        
    }

    public static function username($username) {
        $trimed_username = trim($username);

        if (preg_match('/^[a-zA-Z0-9]{5,}$/', $trimed_username))
        {
            return $trimed_username;
        }
        else
        {
            throw new Exception('Invalid username');
        }
    }

    public static function password($password) {
        $trimed_password = trim($password);
        if (preg_match('/^[0-9A-Za-z!@#$%]{5,12}$/', $password))
        {
            return $trimed_password;
        }
        else
        {
            throw new Exception('Invalid password');
        }
    }

    public static function email($email) {
        $trimed_email = trim($email);
        if (preg_match('/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD', $trimed_email))
        {
            return $trimed_email;
        }
        else
        {
            throw new Exception('Invalid email');
        }
    }

    public static function phone($phone) {
        $trimed_phone = trim($phone);
        if (preg_match('/^[0-9]{0,15}$/', $trimed_phone))
        {
            return $trimed_phone;
        }
        else
        {
            throw new Exception('Invalid phone');
        }
    }

    public static function bdate($bdate) {
        return $bdate;
    }

    public static function information($info) {
        if (preg_match('/^[A-Za-z0-9., !?:]{0,250}$/', $info))
        {
            return $info;
        }
        else
        {
            throw new Exception('Invalid info');
        }
    }

    public static function interests($interests) {
        if (preg_match('/^[A-Za-z0-9., ]{0,60}$/', $interests))
        {
            return $interests;
        }
        else
        {
            throw new Exception('Invalid interests');
        }
    }

    public static function city($city) {
        if (preg_match('/^[A-Za-z ]{0,30}$/', $city))
        {
            return $city;
        }
        else
        {
            throw new Exception('Invalid city');
        }
    }

    public static function image($image) {
        $target_dir = "../user_pics/";
        $target_file = $target_dir . basename($image["name"]);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

        if (isset($_FILES['image']) && !empty($_FILES['image']['name']))
        {
            if (getimagesize($image["tmp_name"]) === false)
            {
                throw new Exception("File is not an image.");
            }
        }
        else
        {
            throw new Exception("Please upload an image.");
        }

// Check if file already exists
        if (file_exists($target_file))
        {
            throw new Exception("Sorry, file already exists.");
        }
// Check file size
        if ($image["size"] > 5000000)
        {
            throw new Exception("Sorry, your file is too large:" . $image['size'] . ".");
        }
// Allow certain file formats
        if ($imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
        {
            throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }

        return $image;
    }

}
