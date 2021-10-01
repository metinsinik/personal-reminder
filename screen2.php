<div class="border" style="width: 100%;">
    <form action="" method="post" class="input-area">
        <div style="width: 100%;">
                <div style="display:inline-block; margin-right: 40px">
                    <label for="date">Datum (TT/MM)</label> </br>
                    <input id="day" type="text" value="" name="day" maxlength="2" size="2" required>
                    <input id="month" type="text" value="" name="month" maxlength="2" size="2" required>
                </div>
                <div style="display:inline-block;">
                    <label for="bezeichung">Bezeichung</label> </br>
                    <input id="bezeichung" type="text" value="" name="bezeichung" required>
                </div>
                <div style="display:inline-block; float: right; margin-right: 20px">
                    <label for="reminder">Erinnerung</label> </br>
                    <select id="reminder" name="reminder" required>
                        <option value="">--bitte auswählen--</option>
                        <option value="1 Tag">1 Tag</option>
                        <option value="2 Tage">2 Tage</option>
                        <option value="4 Tage">4 Tage</option>
                        <option value="1 Woche">1 Woche</option>
                        <option value="2 Wochen">2 Wochen</option>
                    </select>
                </div>
        </div>
        <div style="width: 100%; margin-top: 12px">
            <input id="add" type="button" name="Save" value="SPEICHERN" class="text-only-button">
        </div>
    </form>
    <table class="data-table">
        <thead style="text-align: left;">
            <tr>
                <th>Datum</th>
                <th>Bezeichnung</th>
                <th>Erinnerung</th>
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody id="user_data"> </tbody>
    </table>

</div>