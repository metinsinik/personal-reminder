<?php
    include "dbConnection.php";
    include("sendEmail.php");
    $result = mysqli_query($mysqli, "SELECT * FROM calendar ORDER BY id DESC") or die(mysqli_error($mysqli));

    $output = '';

    $totalRows = mysqli_num_rows ( $result );
    if($totalRows > 0){
        while($item = mysqli_fetch_array($result)) {

            $day = date("d",strtotime($item['date']));
            $month = date("m",strtotime($item['date']));
            $year = date("y",strtotime($item['date']));

            $timeValue = explode(" ", $item['reminder_time'])[0];
            $dayOrWeek = explode(" ", $item['reminder_time'])[1];

            if ( $dayOrWeek === "Woche" || $dayOrWeek === "Wochen" ) {
                $timeValue = $timeValue * 7;
            }

            //Check if the email sent already and dates to send the notification
            if(!$item['email_sent'] && date('Y-m-d', strtotime($item['date']. ' - '.$timeValue.' days')) < date("Y-m-d")) {
                    $message = "Good day, you have an upcoming event. Note: ".$item['description'];
                    $sent = sendNotification($defaultSender, $defaultReceiver, $message);
                    $res = mysqli_query($mysqli, "UPDATE calendar
                                                        SET email_sent='$sent'
                                                        WHERE id=".$item['id']);
            }

            $output .=
            "<tr>
                <td id='date-".$item['id']."'>".$day.".".$month.".</td>
                <td id='description-".$item['id']."'>".$item['description']."</td>
                <td id='reminder-".$item['id']."'>".$item['reminder_time']."</td>
                <td>
                    <a id='".$item['id']."' style='cursor:pointer;' class='edit'>bearbeiten</a>
                    |
                    <a id='".$item['id']."' style='cursor:pointer;' class='delete'>löschen</a>
                </td>";
        }
    }

    echo $output;
?>