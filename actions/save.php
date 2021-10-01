<?php
    include "dbConnection.php";

    $date = $_POST['date'];
    $description = $_POST['description'];
    $reminder = $_POST['reminder'];

    if(!empty($date) && !empty($description) && !empty($reminder)) {
        $result = mysqli_query($mysqli, "INSERT INTO calendar(date, description, reminder_time, email)
                                        VALUES('$date','$description', '$reminder', '$defaultReceiver')");
    } else {
        // TODO handle
    }
?>