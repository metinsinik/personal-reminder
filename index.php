<!DOCTYPE html>
<?php
    session_start();
    include_once("actions/dbConnection.php");
    include_once("actions/sendEmail.php");
?>
<html lang="en">
    <head>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="screen2.css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="actions/actions.js"></script>
    </head>
    <body>
        <div class="logo">__________________________________________________________________________________________________________________________________
            <span class="logo-text" style="font-size:18mm">logo</span></div>
        <div class="main-container">
            <section class="vertical-tab">
                <div class="tab-buttons">
                    <button id="home-button" onclick="navigate('home')">Home</button>
                    <button id="menu1-button" onclick="navigate('menu1')">Menüpunkt 1</button>
                    <button id="menu2-button" onclick="navigate('menu2')">Menüpunkt 2</button>
                </div>
                <div class="contents" id="content">
                    <div class="tab-content" id="home" style = "display: none"><?php include "screen1.php"?></div>
                    <div class="tab-content" id="menu1" style = "display: none"><?php include "screen1.php"?></div>
                    <div class="tab-content" id="menu2" style = "display: block"><?php include "screen2.php"?></div>
                </div>
            </section>
        </div>
        <script>
            function navigate(tabName) {
                var i;
                var content = document.getElementsByClassName("tab-content");
                for (i = 0; i < content.length; i++) {
                    content[i].style.display = "none";
                    document.getElementById(content[i].id + "-button").classList.remove("active");
                }
                document.getElementById(tabName).style.display = "block";
                document.getElementById(tabName + "-button").classList.add("active");
            }
        </script>

        <div id='user_form' title="Edit">
            <form action="" method="post">
                <div style="width: 100%;">
                        <div style="display:inline-block; margin-right: 40px">
                            <label for="date-edit">Datum (TT/MM)</label> </br>
                            <input id="day-edit" type="text" value="" name="day-edit" maxlength="2" size="2" required>
                            <input id="month-edit" type="text" value="" name="month-edit" maxlength="2" size="2" required>
                        </div>
                        <div style="display:inline-block;  ">
                            <label for="description-edit">Bezeichung</label> </br>
                            <input id="description-edit" type="text" value="" name="description-edit" required>
                        </div>
                        <div style="display:inline-block; float: right; margin-right: 20px">
                            <label for="reminder-edit">Erinnerung</label> </br>
                            <select id="reminder-edit" name="reminder-edit" required>
                                <option value="">--bitte auswählen--</option>
                                <option value="1 Tag">1 Tag</option>
                                <option value="2 Tage">2 Tage</option>
                                <option value="4 Tage">4 Tage</option>
                                <option value="1 Woche">1 Woche</option>
                                <option value="2 Wochen">2 Wochen</option>
                            </select>
                        </div>
                        <input id="id-edit" hidden value="">
                </div>
                <div style="width: 100%; margin-top: 12px">
                    <input id="save-changes" type="button" name="Save" value="SPEICHERN" class="text-only-button">
                </div>
            </form>
        </div>
    </body>
</html>