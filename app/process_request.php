<?php

require '../Db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $visitor_id = $_POST['visitor_id'];

    $today = date('Y:m:d');
    $newDate = Date('Y:m:d', strtotime("+6 days"));

    $sql = 'INSERT INTO `foodrequest` (`userid`, `food1`, `food2`, `food3`, `food4`, `food5`, `pickupdate`) VALUES (?, ?, ?, ?, ?, ?, ?);';
    $stmt = DB::getInstance()->prepare($sql);
    $exec = $stmt->execute(
        array(
            $visitor_id,
            $_POST['item_name'][0],
            $_POST['item_name'][1],
            $_POST['item_name'][2],
            $_POST['item_name'][3],
            $_POST['item_name'][4],
            $newDate
        )
    );

    echo $newDate;

}