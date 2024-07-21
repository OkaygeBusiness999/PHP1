<?php

function logArrival($isLate) {
    $dateTime = date("Y-m-d H:i:s");
    if ($isLate) {
        $dateTime .= " meskanie";
    }
    file_put_contents("log.txt", $dateTime . "\n", FILE_APPEND);
}

function getLogs() {
    return file_get_contents("log.txt");
}

$hour = date("H");

if ($hour >= 20 && $hour <= 24) {
    die("Cannot log arrivals after 20:00");
}

$isLate = ($hour > 8);

logArrival($isLate);

echo getLogs();
?>
