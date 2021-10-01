<?php
    include "dbConnection.php";
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "DELETE FROM calendar WHERE id='$id'");
?>