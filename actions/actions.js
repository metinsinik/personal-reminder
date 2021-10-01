$(document).ready(function(){
    const fetchData = () => {
        $.ajax({
            url:"./actions/fetch.php",
            method:"GET",
            success: function(data) {
                $("#user_data").html(data);
            }
        });
    }

    const cleanFields = () => {
        $("#day").val("");
        $("#month").val("");
        $("#bezeichung").val("");
        $("#reminder").val("");
    }

    const areFieldsValid = (day, month, reminder, description) => {
        if(!day || !month || !description || !reminder) {
            alert("Please fill all the fields first");
        } else if(isNaN(month) || month > 12 || month < 1) {
            alert("Please enter a correct month value");
        } else if (day < 1 || day > daysInMonth(month - 1, new Date().getFullYear())) {
            alert("Please enter a correct day value considering month");
        } else {
            return true;
        }
        return false;
    }

    $("#user_form").dialog({
        autoOpen:false,
        maxWidth:1000,
        width: 1000
    });

    //CRUD
    $("#add").click(() => {
        const day = $("#day").val();
        const month = $("#month").val();
        const description = $("#bezeichung").val();
        const reminder = $("#reminder").val();
        //Validate if all the fields are filled in
        if(areFieldsValid(day, month, description, reminder)) {
            const date = `${new Date().getFullYear()}-${month}-${day}`;
            $.ajax({
                url:"./actions/save.php",
                method:"POST",
                data:{date, month, description, reminder},
                success:function(data){
                    fetchData();
                    cleanFields();
                }
            });
        }
    });

    $(document).on('click', '.edit', () => {
        const id = $('.edit').attr("id");
        const day = $("#date-"+id).text().split('.')[0];
        const month = $("#date-"+id).text().split('.')[1];
        const description = $("#description-"+id).text();
        const reminder = $("#reminder-"+id).text();

        $("#day-edit").val(day);
        $("#month-edit").val(month);
        $("#description-edit").val(description);
        $("#reminder-edit").val(reminder);
        $("#id-edit").val(id);
        $("#user_form").dialog('open');
    });

    $(document).on('click', '#save-changes', () => {

        const id = $("#id-edit").val();
        const day = $("#day-edit").val();
        const month = $("#month-edit").val();
        const description = $("#description-edit").val();
        const reminder = $("#reminder-edit").val();
        const date = `${new Date().getFullYear()}-${month}-${day}`;

        $.ajax({
            url:"./actions/edit.php",
            method:"POST",
            data:{id, date, description, reminder},
            success: (data) => {
                fetchData();
                $("#user_form").dialog('close');
            },
            error: () => {
                // An error dialog can be shown here
            }
        });
    });

    $(document).on('click', '.delete', function() {
        var response = confirm('Are you sure you want to delete?');
        if (response === true) {
            var id = $(this).attr("id");
            $.ajax({
                url:"./actions/delete.php?id="+id,
                method:"POST",
                success: (data) => {
                    fetchData();
                }
            });
        }
    });

    function daysInMonth(m, y) { // m is 0 indexed: 0-11
        switch (m) {
            case 1 :
                return (y % 4 == 0 && y % 100) || y % 400 == 0 ? 29 : 28;
            case 8 : case 3 : case 5 : case 10 :
                return 30;
            default :
                return 31
        }
    }

    fetchData();
});