<?php
    include "dbConnection.php";

    $id = $_POST['id'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $reminder = $_POST['reminder'];

    if(!empty($id) && !empty($date) && !empty($description) && !empty($reminder)) {
        $result = mysqli_query($mysqli, "UPDATE calendar
                                            SET date='$date', description='$description', reminder_time='$reminder', email_sent='false'
                                            WHERE id=$id");
    } else {
        // TODO
    }
?>