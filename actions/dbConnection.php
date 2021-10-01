<?php
    $defaultSender = 'metin.sinik91@gmail.com';
    $defaultReceiver = 'metin.sinik91@gmail.com';

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'test';

    $mysqli = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

    if(!$mysqli){
        die("ERROR: DB Connection error!" . mysqli_connect_error());
    } else {
        $tables = mysqli_query($mysqli, "SHOW tables");
        $calendarExists = false;
        $mailExists = false;
        while ($row = mysqli_fetch_array($tables)) {
            if ($row[0] === "calendar") {
                $calendarExists = true;
            } else if ($row[0] === "mail") {
                $mailExists = true; // TODO keep logs of the sent mail in the mail table
            }
        }
        if (!$calendarExists) {
            // Creating "calendar" table if not exists
            $sql = "CREATE TABLE `calendar` (
                `id` int(12) NOT NULL auto_increment,
                `date` date NOT NULL,
                `description` varchar(100) NOT NULL,
                `reminder_time` varchar(12) NOT NULL,
                `email` varchar(100) NOT NULL,
                `email_sent` boolean DEFAULT false,
                PRIMARY KEY  (`id`));";
            if ($mysqli->query($sql) === false) {
                echo "Error Creating table: " . $mysqli->error;
            }
        }
    }
?>