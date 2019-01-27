<?php

require '../Db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_POST);

    $full_mame = $_POST['full_name'];
    $household_size = $_POST['household_size'];
    $fb_selected = $_POST['fb_selected'];

    // ready to insert
    $sql = "INSERT INTO `visitor` (`full_name`, `household_size`, `fb_selected`) VALUES (?, ?, ?);";
    $stmt = DB::getInstance()->prepare($sql);

    $exec = $stmt->execute(
        array(
            $full_mame,
            $household_size,
            $fb_selected
        )
    );

    echo 'success!';

}