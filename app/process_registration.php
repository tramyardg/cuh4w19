<?php

require '../Db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_mame = $_POST['full_name'];
    $household_size = $_POST['household_size'];

    if (!empty($_POST['fb_selected'])) {
        $fb_selected = $_POST['fb_selected'];
        // ready to insert
        $sql = "INSERT INTO `visitor` (`user_id`, `full_name`, `household_size`, `fb_selected`) VALUES (?, ?, ?, ?);";
        $stmt = DB::getInstance()->prepare($sql);

        $data = array(
            randomNumber(5),
            $full_mame,
            $household_size,
            $fb_selected
        );
        $exec = $stmt->execute($data);
        $arr = array('data' => $data);
        echo json_encode($arr);
    } else {
        echo 'null';
    }

}

function randomNumber($length)
{
    $result = '';

    for ($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}