<?php 

class Helpers {

    public static function validateData($data) {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}

?>