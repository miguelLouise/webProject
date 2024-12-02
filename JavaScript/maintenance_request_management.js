$(document).ready(function(){
    $(".container").show().delay(5000).fadeOut(50);

    // open issue image
    $(document).on("click", "#open_maintenance_issue_img", function() {
        const getMaintenanceId = $(this).val();
        const issue_img = document.getElementById(getMaintenanceId + "=issue_img");

        $(issue_img).toggle();
    });

    // close issue image
    $(document).on("click", "#close_btn", function() {
        const getMaintenanceId = $(this).val();
        const issue_img = document.getElementById(getMaintenanceId + "=issue_img");

        $(issue_img).toggle();
    });

    // open set date and time
    $(document).on("click", "#set_schedule_btn", function() {
        const getMaintenanceId = $(this).val();
        const setMaintenanceSchedule = document.getElementById(getMaintenanceId + "=maintenance_schedule");

        $(setMaintenanceSchedule).toggle();
        console.log(getMaintenanceId);
    });

     // close set date and time
    $(document).on("click", "#close_set_schedule", function() {
        const getMaintenanceId = $(this).val();
        const set_schedule = document.getElementById(getMaintenanceId + "=maintenance_schedule");

        $(set_schedule).toggle();
    });

    // update maintenance status
    $(document).on("change", "#maintenance_request_status", function() {
        const getMaintenanceStatus = $(this).val().split(",");
        const getStatus = getMaintenanceStatus[0];
        const getMaintenanceId = getMaintenanceStatus[1];

        // console.log(getMaintenanceStatus);
        // console.log(getStatus);
        // console.log(getMaintenanceId);

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
        // maintenance category
        $(document).on("change", "#maintenance_category", function() {
            const maintenanceCategory = $(this).val();
            const maintenanceUrgency = $("#maintenance_urgency").val();
            const maintenanceDateFrom = $("#date_from").val();
            const maintenanceDateTo = $("#date_to").val();
            const maintenanceStatus = $("#maintenance_status").val();

            if (maintenanceUrgency === null && maintenanceDateFrom === "" && maintenanceDateTo === "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategory.php',
                    data: {maintenance_category:maintenanceCategory},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } // 2 parameters
            else if (maintenanceUrgency !== null && maintenanceDateFrom === "" && maintenanceDateTo === "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgency.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                            // console.log(data);
                    }
                });
            } else if (maintenanceUrgency === null && maintenanceDateFrom !== "" && maintenanceDateTo === "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceDateFrom.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_date_from:maintenanceDateFrom},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceUrgency === null && maintenanceDateFrom === "" && maintenanceDateTo !== "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceDateTo.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceUrgency === null && maintenanceDateFrom === "" && maintenanceDateTo === "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceStatus.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } //3 parameters
            else if (maintenanceUrgency !== null && maintenanceDateFrom !== "" && maintenanceDateTo === "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateFrom.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceUrgency !== null && maintenanceDateFrom === "" && maintenanceDateTo !== "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateTo.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceUrgency !== null && maintenanceDateFrom === "" && maintenanceDateTo === "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceStatus.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceUrgency === null && maintenanceDateFrom !== "" && maintenanceDateTo !== "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceDateFromAndMaintenanceCategoryAndMaintenanceDateTo.php',
                    data: {maintenance_date_from:maintenanceDateFrom, maintenance_category:maintenanceCategory, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            }
            //4 parameters
            else if (maintenanceUrgency !== null && maintenanceDateFrom !== "" && maintenanceDateTo !== "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateFromAndMaintenanceDateTo.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceUrgency !== null && maintenanceDateFrom !== "" && maintenanceDateTo === "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateFromAndMaintenanceStatus.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceUrgency === null && maintenanceDateFrom !== "" && maintenanceDateTo !== "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceDateFromAndMaintenanceDateToAndMaintenanceStatus.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_date_from:maintenanceDateFrom, maintenance_date_to:maintenanceDateTo, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceUrgency !== null && maintenanceDateFrom === "" && maintenanceDateTo !== "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateToAndMaintenanceStatus.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_to:maintenanceDateTo, maintenance_status:maintenanceStatus},
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

         // maintenance urgency
         $(document).on("change", "#maintenance_urgency", function() {
            const maintenanceCategory = $("#maintenance_category").val();
            const maintenanceUrgency = $(this).val();
            const maintenanceDateFrom = $("#date_from").val();
            const maintenanceDateTo = $("#date_to").val();
            const maintenanceStatus = $("#maintenance_status").val();

            if (maintenanceCategory === null && maintenanceDateFrom === "" && maintenanceDateTo === "" && maintenanceStatus === null) {
                $.ajax({
                type: 'POST',
                url: 'ajax/filterByMaintenanceUrgency.php',
                data: {maintenance_urgency:maintenanceUrgency},
                    success: function(data){
                        $('#maintenance-requests').html(data);
                }
            });
            } // 2 parameters
            else if (maintenanceCategory !== null && maintenanceDateFrom === "" && maintenanceDateTo === "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgency.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory === null && maintenanceDateFrom !== "" && maintenanceDateTo === "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceUrgencyAndMaintenanceDateFrom.php',
                    data: {maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory === null && maintenanceDateFrom === "" && maintenanceDateTo !== "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceUrgencyAndMaintenanceDateTo.php',
                    data: {maintenance_urgency:maintenanceUrgency, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory === null && maintenanceDateFrom === "" && maintenanceDateTo === "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceUrgencyAndMaintenanceStatus.php',
                    data: {maintenance_urgency:maintenanceUrgency, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } // 3 parameters
            else if (maintenanceCategory !== null && maintenanceDateFrom !== "" && maintenanceDateTo === "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateFrom.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory !== null && maintenanceDateFrom === "" && maintenanceDateTo !== "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateTo.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory !== null && maintenanceDateFrom === "" && maintenanceDateTo === "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceStatus.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } //4 parameters
            else if (maintenanceCategory !== null && maintenanceDateFrom !== "" && maintenanceDateTo !== "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateFromAndMaintenanceDateTo.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory !== null && maintenanceDateFrom !== "" && maintenanceDateTo === "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateFromAndMaintenanceStatus.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });

            } else if (maintenanceCategory === null && maintenanceDateFrom !== "" && maintenanceDateTo !== "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceUrgencyAndMaintenanceDateFromAndMaintenanceDateToAndMaintenanceStatus.php',
                    data: {maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom, maintenance_date_to:maintenanceDateTo, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory !== null && maintenanceDateFrom === "" && maintenanceDateTo !== "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateToAndMaintenanceStatus.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_to:maintenanceDateTo, maintenance_status:maintenanceStatus},
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

        // maintenance date from
        $(document).on("change", "#date_from", function() {
            const maintenanceCategory = $("#maintenance_category").val();
            const maintenanceUrgency = $("#maintenance_urgency").val();
            const maintenanceDateFrom = $(this).val();
            const maintenanceDateTo = $("#date_to").val();
            const maintenanceStatus = $("#maintenance_status").val();

            if ( maintenanceCategory === null && maintenanceUrgency === null && maintenanceDateTo === "" && maintenanceStatus === null) {
                $.ajax({
                type: 'POST',
                url: 'ajax/filterByMaintenanceDateFrom.php',
                data: {maintenance_date_from:maintenanceDateFrom},
                    success: function(data){
                        $('#maintenance-requests').html(data);
                }
            });
            } // 2 parameters
            else if ( maintenanceCategory !== null && maintenanceUrgency === null && maintenanceDateTo === "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceDateFrom.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_date_from:maintenanceDateFrom},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            }  else if ( maintenanceCategory === null && maintenanceUrgency !== null && maintenanceDateTo === "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceUrgencyAndMaintenanceDateFrom.php',
                    data: {maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if ( maintenanceCategory === null && maintenanceUrgency === null && maintenanceDateTo !== "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceDateFromAndMaintenanceDateTo.php',
                    data: {maintenance_date_from:maintenanceDateFrom, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            }
            else if (maintenanceCategory === null && maintenanceUrgency === null && maintenanceDateTo === "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceDateFromAndMaintenanceStatus.php',
                    data: {maintenance_date_from:maintenanceDateFrom, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } // 3 parameters
            else if (maintenanceCategory !== null && maintenanceUrgency !== null && maintenanceDateTo === "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateFrom.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory !== null && maintenanceUrgency === null && maintenanceDateTo !== "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceDateFromAndMaintenanceCategoryAndMaintenanceDateTo.php',
                    data: {maintenance_date_from:maintenanceDateFrom, maintenance_category:maintenanceCategory, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory !== null && maintenanceUrgency === null && maintenanceDateTo === "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceStatusAndMaintenanceCategoryAndMaintenanceDateFrom.php',
                    data: {maintenance_status:maintenanceStatus, maintenance_category:maintenanceCategory, maintenance_date_from:maintenanceDateFrom},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } //4 parameters
            else if (maintenanceCategory !== null && maintenanceUrgency !== null && maintenanceDateTo !== "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateFromAndMaintenanceDateTo.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory !== null && maintenanceUrgency !== null && maintenanceDateTo === "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateFromAndMaintenanceStatus.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory === null && maintenanceUrgency !== null && maintenanceDateTo !== "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceUrgencyAndMaintenanceDateFromAndMaintenanceDateToAndMaintenanceStatus.php',
                    data: {maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom, maintenance_date_to:maintenanceDateTo, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory !== null && maintenanceUrgency === null && maintenanceDateTo !== "" && maintenanceStatus !== null) {
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

        // maintenance date to
        $(document).on("change", "#date_to", function() {
            const maintenanceCategory = $("#maintenance_category").val();
            const maintenanceUrgency = $("#maintenance_urgency").val();
            const maintenanceDateFrom = $("#date_from").val();
            const maintenanceDateTo = $(this).val();
            const maintenanceStatus = $("#maintenance_status").val();

            if (maintenanceCategory === null && maintenanceUrgency === null && maintenanceDateFrom === "" && maintenanceStatus === null) {
                $.ajax({
                type: 'POST',
                url: 'ajax/filterByMaintenanceDateTo.php',
                data: {maintenance_date_to:maintenanceDateTo},
                    success: function(data){
                        $('#maintenance-requests').html(data);
                }
            });
            } // 2 parameters
            else if (maintenanceCategory !== null && maintenanceUrgency === null && maintenanceDateFrom === "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceDateTo.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory === null && maintenanceUrgency !== null && maintenanceDateFrom === "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceUrgencyAndMaintenanceDateTo.php',
                    data: {maintenance_urgency:maintenanceUrgency, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory === null && maintenanceUrgency === null && maintenanceDateFrom !== "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceDateFromAndMaintenanceDateTo.php',
                    data: {maintenance_date_to:maintenanceDateTo, maintenance_date_from:maintenanceDateFrom},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            }  else if (maintenanceCategory === null && maintenanceUrgency === null && maintenanceDateFrom === "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceDateFromAndMaintenanceDateTo.php',
                    data: {maintenance_date_to:maintenanceDateTo, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } // 3 parameters
            else if (maintenanceCategory !== null && maintenanceUrgency !== null && maintenanceDateFrom === "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateTo.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory !== null && maintenanceUrgency === null && maintenanceDateFrom !== "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceDateFromAndMaintenanceCategoryAndMaintenanceDateTo.php',
                    data: {maintenance_date_from:maintenanceDateFrom, maintenance_category:maintenanceCategory, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory !== null && maintenanceUrgency === null && maintenanceDateFrom === "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceDateToAndMaintenanceCategoryAndMaintenanceStatus.php',
                    data: {maintenance_date_to:maintenanceDateTo, maintenance_category:maintenanceCategory, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            }//4 parameters
            else if (maintenanceCategory !== null && maintenanceUrgency !== null && maintenanceDateFrom !== "" && maintenanceStatus === null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateFromAndMaintenanceDateTo.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom, maintenance_date_to:maintenanceDateTo},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory !== null && maintenanceUrgency !== null && maintenanceDateFrom === "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceCategoryAndMaintenanceUrgencyAndMaintenanceDateToAndMaintenanceStatus.php',
                    data: {maintenance_category:maintenanceCategory, maintenance_urgency:maintenanceUrgency, maintenance_date_to:maintenanceDateTo, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory === null && maintenanceUrgency !== null && maintenanceDateFrom !== "" && maintenanceStatus !== null) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/filterByMaintenanceUrgencyAndMaintenanceDateFromAndMaintenanceDateToAndMaintenanceStatus.php',
                    data: {maintenance_urgency:maintenanceUrgency, maintenance_date_from:maintenanceDateFrom, maintenance_date_to:maintenanceDateTo, maintenance_status:maintenanceStatus},
                        success: function(data){
                            $('#maintenance-requests').html(data);
                    }
                });
            } else if (maintenanceCategory !== null && maintenanceUrgency === null && maintenanceDateFrom !== "" && maintenanceStatus !== null) {
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
                            console.log(data);
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

