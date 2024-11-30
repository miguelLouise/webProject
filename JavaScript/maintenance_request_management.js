$(document).ready(function(){

    // update maintenance status
    $(document).on("change", "#maintenance_request_status", function() {
        const getMaintenanceStatus = $(this).val().split(",");
        const getStatus = getMaintenanceStatus[0];
        const getMaintenanceId = getMaintenanceStatus[1];

        console.log(getMaintenanceStatus);
        console.log(getStatus);
        console.log(getMaintenanceId);

        $.ajax({
            type: 'POST',
            url: 'ajax/updateMaintenanceStatus.php',
            data: {maintenance_status:getStatus, maintenance_id:getMaintenanceId},
            success: function(data){

            }
        });

        if (getStatus === "Completed") {
           $.ajax({
                type: 'POST',
                url: 'ajax/setMaintenanceComplete.php',
                data: {maintenance_id:getMaintenanceId},
                success: function(data){

                }
            });
        }
    });


    // filtering search
   // maintenance status
   $(document).on("change", "#maintenance_status", function() {
    const maintenanceCategory = $("#maintenance_category").val();
    const maintenanceUrgency = $("#maintenance_urgency").val();
    const maintenanceDateFrom = $("#date_from").val();
    const maintenanceDateTo = $("#date_to").val();
    const maintenanceStatus = $(this).val();

    if (maintenanceCategory === null && maintenanceUrgency === null && maintenanceDateFrom ==="" && maintenanceDateTo === "") {
        $.ajax({
            type: 'POST',
            url: 'ajax/filterByMaintenanceStatus.php',
            data: {maintenance_status:maintenanceStatus},
                success: function(data){
                    $('#maintenance-requests').html(data);
            }
        });
    } // 2 parameters
    else if (maintenanceCategory !== null && maintenanceUrgency === null && maintenanceDateFrom ==="" && maintenanceDateTo === "") {
        $.ajax({
            type: 'POST',
            url: 'ajax/filterByMaintenanceCategoryAndMaintenanceStatus.php',
            data: {maintenance_category:maintenanceCategory, maintenance_status:maintenanceStatus},
                success: function(data){
                    $('#maintenance-requests').html(data);
            }
        });
    } else if (maintenanceCategory === null && maintenanceUrgency !== null && maintenanceDateFrom ==="" && maintenanceDateTo === "") {
        $.ajax({
            type: 'POST',
            url: 'ajax/filterByMaintenanceUrgencyAndMaintenanceStatus.php',
            data: {maintenance_urgency:maintenanceUrgency, maintenance_status:maintenanceStatus},
                success: function(data){
                    $('#maintenance-requests').html(data);
            }
        });
    } else if (maintenanceCategory === null && maintenanceUrgency === null && maintenanceDateFrom !=="" && maintenanceDateTo === "") {
        $.ajax({
            type: 'POST',
            url: 'ajax/filterByMaintenanceDateFromAndMaintenanceStatus.php',
            data: {maintenance_date_from:maintenanceDateFrom, maintenance_status:maintenanceStatus},
                success: function(data){
                    $('#maintenance-requests').html(data);
            }
        });
    } else if (maintenanceCategory === null && maintenanceUrgency === null && maintenanceDateFrom ==="" && maintenanceDateTo !== "") {
        $.ajax({
            type: 'POST',
            url: 'ajax/filterByMaintenanceDateFromAndMaintenanceDateTo.php',
            data: {maintenance_date_to:maintenanceDateTo, maintenance_status:maintenanceStatus},
                success: function(data){
                    $('#maintenance-requests').html(data);
            }
        });
    } // 3 parameters
    else if (maintenanceCategory !== null && maintenanceUrgency !== null && maintenanceDateFrom ==="" && maintenanceDateTo === "") {
        $.ajax({
            type: 'POST',
            url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceStatus.php',
            data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_status:maintenanceStatus},
                success: function(data){
                    $('#maintenance-requests').html(data);
            }
        });
    } else if (maintenanceCategory !== null && maintenanceUrgency === null && maintenanceDateFrom !=="" && maintenanceDateTo === "") {
        $.ajax({
            type: 'POST',
            url: 'ajax/filterByMaintenanceStatusAndMaintenanceCategoryAndMaintenanceDateFrom.php',
            data: {maintenance_status:maintenanceStatus, maintenance_category:maintenanceCategory, maintenance_date_from:maintenanceDateFrom},
                success: function(data){
                    $('#maintenance-requests').html(data);
            }
        });
    }  else if (maintenanceCategory !== null && maintenanceUrgency === null && maintenanceDateFrom === "" && maintenanceDateTo !== "") {
        $.ajax({
            type: 'POST',
            url: 'ajax/filterByMaintenanceDateToAndMaintenanceCategoryAndMaintenanceStatus.php',
            data: {maintenance_date_to:maintenanceDateTo, maintenance_category:maintenanceCategory, maintenance_status:maintenanceStatus},
                success: function(data){
                    $('#maintenance-requests').html(data);
            }
        });
    } //4 parameters
    else if (maintenanceCategory !== null && maintenanceUrgency !== null && maintenanceDateFrom !== "" && maintenanceDateTo === "") {
        $.ajax({
            type: 'POST',
            url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateFromAndMaintenanceStatus.php',
            data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom, maintenance_status:maintenanceStatus},
                success: function(data){
                    $('#maintenance-requests').html(data);
            }
        });
    } else if (maintenanceCategory !== null && maintenanceUrgency !== null && maintenanceDateFrom === "" && maintenanceDateTo !== "") {
        $.ajax({
            type: 'POST',
            url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateToAndMaintenanceStatus.php',
            data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_to:maintenanceDateTo, maintenance_status:maintenanceStatus},
                success: function(data){
                    $('#maintenance-requests').html(data);
            }
        });
    } else if (maintenanceCategory === null && maintenanceUrgency !== null && maintenanceDateFrom !== "" && maintenanceDateTo !== "") {
        $.ajax({
            type: 'POST',
            url: 'ajax/filterByMaintenanceUrgencyAndMaintenanceDateFromAndMaintenanceDateToAndMaintenanceStatus.php',
            data: {maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom, maintenance_date_to:maintenanceDateTo, maintenance_status:maintenanceStatus},
                success: function(data){
                    $('#maintenance-requests').html(data);
            }
        });
    } else if (maintenanceCategory !== null && maintenanceUrgency === null && maintenanceDateFrom !== "" && maintenanceDateTo !== "") {
        $.ajax({
            type: 'POST',
            url: 'ajax/filterByMaintenanceCategoryAndMaintenanceDateFromAndMaintenanceDateToAndMaintenanceStatus.php',
            data: {maintenance_category:maintenanceCategory, maintenance_date_from:maintenanceDateFrom, maintenance_date_to:maintenanceDateTo, maintenance_status:maintenanceStatus},
                success: function(data){
                    $('#maintenance-requests').html(data);
            }
        });
    } else {
        $.ajax({
            type: 'POST',
            url: 'ajax/filterByAll.php',
            data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom, maintenance_date_to:maintenanceDateTo, maintenance_status:maintenanceStatus},
                success: function(data){
                    $('#maintenance-requests').html(data);
            }
        });
    }
});
});

