<?php

require '../Db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $visitor_id = $_POST['visitor_id'];
    print_r($_POST['item_name']);

    $sql = 'INSERT INTO `foodrequest` VALUES (?, ?, ?, ?, ?, ?);';
    $stmt = DB::getInstance()->prepare($sql);
    $exec = $stmt->execute(
        array(
            $visitor_id,
            $_POST['item_name'][0],
            $_POST['item_name'][1],
            $_POST['item_name'][2],
            $_POST['item_name'][3],
            $_POST['item_name'][4]
        )
    );

    echo 'success!';


}