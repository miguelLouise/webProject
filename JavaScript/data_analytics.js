$(document).ready(function(){
    $(document).on("click", "#generateCharts", function() {
        const startDate = $('#startDate').val();
        const endDate = $('#endDate').val();

        if(startDate !== "" && endDate === ""){ //START DATE ONLY
        const split_start_date = $('#startDate').val().split("-");
        const start_date_year = split_start_date[0];
        const start_date_month = split_start_date[1];
        const concatinated_start_date = start_date_year + "-" + start_date_month + "-" + 1;

        console.log("date  greater than ", concatinated_start_date)

         // RESERVATIONS
         $.ajax({
            type: 'POST',
            url: 'ajax/data_analytics_ajax/getMonthlyReservationsStartDate.php',
            data: {date_start:concatinated_start_date},
            success: function(data){
                const output_array = JSON.parse(data);

                const chart_label = []
                const chart_data = []
                output_array.forEach(person => {
                    chart_label.push(month_names[person.month_name])
                    chart_data.push(person.total_rows)
                });

                // BAR GRAPH
                const tenants_bar_chart = document.getElementById('monthly_reservations_chart').getContext('2d');
                const barChart = new Chart(tenants_bar_chart, {
                    type: 'bar',
                    data: {
                    labels: chart_label,
                    datasets: [
                        {
                            label: 'Reservations',
                            data: chart_data
                        }
                    ]
                    },
                    options: {
                        responsive: true
                    }
                });
            }
        });

        // TENANTS
        $.ajax({
            type: 'POST',
            url: 'ajax/data_analytics_ajax/getDormlinkTenantsStartDate.php',
            data: {date_start:concatinated_start_date},
            success: function(data){
                const output_array = JSON.parse(data);

                const chart_label = []
                const online_chart_data = []
                const walkin_chart_data = []

                output_array.forEach(person => {
                    chart_label.push(month_names[person.month_name])
                    online_chart_data.push(person.online_tenants)
                    walkin_chart_data.push(person.walkin_tenants)
                });

                const dormlink_tenants_chart = document.getElementById('dormlink_tenants_chart').getContext('2d');
                const tenants_chart = new Chart(dormlink_tenants_chart, {
                    type: 'bar',
                    data: {
                    labels: chart_label,
                    datasets: [
                        {
                            label: 'Online',
                            data: online_chart_data
                        },
                        {
                            label: 'Walk-In',
                            data: walkin_chart_data
                        }
                    ]
                    },
                    options: {
                        responsive: true
                    }
                });
            }
        });

        // MAINTENANCE REQUEST
        $.ajax({
            type: 'POST',
            url: 'ajax/data_analytics_ajax/getMaintenanceRequestStartDate.php',
            data: {date_start:concatinated_start_date},
            success: function(data){
                const output_array = JSON.parse(data);

                const chart_label = []
                const total_chart_data = []
                const active_chart_data = []
                const solved_chart_data = []

                output_array.forEach(data => {
                    chart_label.push(month_names[data.month_name])
                    total_chart_data.push(data.total_maintenance)
                    active_chart_data.push(data.active_maintenance)
                    solved_chart_data.push(data.solved_maintenance)
                });


                const maintenance_request_chart = document.getElementById('maintenance_request_chart').getContext('2d');
                const maintenance_chart = new Chart(maintenance_request_chart, {
                    type: 'bar',
                    data: {
                    labels: chart_label,
                    datasets: [
                        {
                            label: 'Total',
                            data: total_chart_data
                        },
                        {
                            label: 'Active',
                            data: active_chart_data
                        },
                        {
                            label: 'Completed',
                            data: solved_chart_data
                        }
                    ]
                    },
                    options: {
                        responsive: true
                    }
                });
            }
        });

        } else if(startDate === "" && endDate !== ""){//END DATE ONLY
        const split_end_date = $('#endDate').val().split("-");
        const end_date_year = split_end_date[0];
        const end_date_month = split_end_date[1];

        const end_date_with_day = new Date(end_date_year, end_date_month, 0);
        const last_day_of_end_date = end_date_with_day.getDate();
        const concatinated_end_date = end_date_year + "-" + end_date_month + "-" + last_day_of_end_date;

        console.log("date  less than ", concatinated_end_date)

                // RESERVATIONS
                $.ajax({
                    type: 'POST',
                    url: 'ajax/data_analytics_ajax/getMonthlyReservationsEndDate.php',
                    data: {date_end:concatinated_end_date},
                    success: function(data){
                        const output_array = JSON.parse(data);

                        const chart_label = []
                        const chart_data = []
                        output_array.forEach(person => {
                            chart_label.push(month_names[person.month_name])
                            chart_data.push(person.total_rows)
                        });

                        // BAR GRAPH
                        const tenants_bar_chart = document.getElementById('monthly_reservations_chart').getContext('2d');
                        const barChart = new Chart(tenants_bar_chart, {
                            type: 'bar',
                            data: {
                            labels: chart_label,
                            datasets: [
                                {
                                    label: 'Reservations',
                                    data: chart_data
                                }
                            ]
                            },
                            options: {
                                responsive: true
                            }
                        });
                    }
                });

                // TENANTS
                $.ajax({
                    type: 'POST',
                    url: 'ajax/data_analytics_ajax/getDormlinkTenantsEndDate.php',
                    data: {date_end:concatinated_end_date},
                    success: function(data){
                        const output_array = JSON.parse(data);

                        const chart_label = []
                        const online_chart_data = []
                        const walkin_chart_data = []

                        output_array.forEach(person => {
                            chart_label.push(month_names[person.month_name])
                            online_chart_data.push(person.online_tenants)
                            walkin_chart_data.push(person.walkin_tenants)
                        });

                        const dormlink_tenants_chart = document.getElementById('dormlink_tenants_chart').getContext('2d');
                        const tenants_chart = new Chart(dormlink_tenants_chart, {
                            type: 'bar',
                            data: {
                            labels: chart_label,
                            datasets: [
                                {
                                    label: 'Online',
                                    data: online_chart_data
                                },
                                {
                                    label: 'Walk-In',
                                     data: walkin_chart_data
                                }
                            ]
                            },
                            options: {
                                responsive: true
                            }
                        });
                    }
                });

                // MAINTENANCE REQUEST
                $.ajax({
                     type: 'POST',
                    url: 'ajax/data_analytics_ajax/getMaintenanceRequestEndDate.php',
                    data: {date_end:concatinated_end_date},
                    success: function(data){
                        const output_array = JSON.parse(data);

                        const chart_label = []
                        const total_chart_data = []
                        const active_chart_data = []
                        const solved_chart_data = []

                        output_array.forEach(data => {
                            chart_label.push(month_names[data.month_name])
                            total_chart_data.push(data.total_maintenance)
                            active_chart_data.push(data.active_maintenance)
                            solved_chart_data.push(data.solved_maintenance)
                        });


                        const maintenance_request_chart = document.getElementById('maintenance_request_chart').getContext('2d');
                        const maintenance_chart = new Chart(maintenance_request_chart, {
                            type: 'bar',
                            data: {
                            labels: chart_label,
                            datasets: [
                                {
                                    label: 'Total',
                                    data: total_chart_data
                                },
                                {
                                    label: 'Active',
                                    data: active_chart_data
                                 },
                                 {
                                     label: 'Completed',
                                    data: solved_chart_data
                                }
                            ]
                            },
                            options: {
                                responsive: true
                            }
                        });
                    }
                });
        } else if(startDate !== "" && endDate !== ""){ //GET MONTHLY DATA BETWEEN 2 DATES
            if(startDate <= endDate){
                const split_start_date = $('#startDate').val().split("-");
                const split_end_date = $('#endDate').val().split("-");

                const start_date_year = split_start_date[0];
                const start_date_month = split_start_date[1];
                const concatinated_start_date = start_date_year + "-" + start_date_month + "-" + 1;

                const end_date_year = split_end_date[0];
                const end_date_month = split_end_date[1];

                const end_date_with_day = new Date(end_date_year, end_date_month, 0);
                const last_day_of_end_date = end_date_with_day.getDate();
                const concatinated_end_date = end_date_year + "-" + end_date_month + "-" + last_day_of_end_date;

                // RESERVATIONS
                $.ajax({
                    type: 'POST',
                    url: 'ajax/data_analytics_ajax/getMonthlyReservations.php',
                    data: {date_start:concatinated_start_date, date_end:concatinated_end_date},
                    success: function(data){
                        const output_array = JSON.parse(data);

                        const chart_label = []
                        const chart_data = []
                        output_array.forEach(person => {
                            chart_label.push(month_names[person.month_name])
                            chart_data.push(person.total_rows)
                        });

                        // BAR GRAPH
                        const tenants_bar_chart = document.getElementById('monthly_reservations_chart').getContext('2d');
                        const barChart = new Chart(tenants_bar_chart, {
                            type: 'bar',
                            data: {
                            labels: chart_label,
                            datasets: [
                                {
                                    label: 'Reservations',
                                    data: chart_data
                                }
                            ]
                            },
                            options: {
                                responsive: true
                            }
                        });
                    }
                });

                // TENANTS
                $.ajax({
                    type: 'POST',
                    url: 'ajax/data_analytics_ajax/getDormlinkTenants.php',
                    data: {date_start:concatinated_start_date, date_end:concatinated_end_date},
                    success: function(data){
                        const output_array = JSON.parse(data);

                        const chart_label = []
                        const online_chart_data = []
                        const walkin_chart_data = []

                        output_array.forEach(person => {
                            chart_label.push(month_names[person.month_name])
                            online_chart_data.push(person.online_tenants)
                            walkin_chart_data.push(person.walkin_tenants)
                        });

                        const dormlink_tenants_chart = document.getElementById('dormlink_tenants_chart').getContext('2d');
                        const tenants_chart = new Chart(dormlink_tenants_chart, {
                            type: 'bar',
                            data: {
                            labels: chart_label,
                            datasets: [
                                {
                                    label: 'Online',
                                    data: online_chart_data
                                },
                                {
                                    label: 'Walk-In',
                                    data: walkin_chart_data
                                }
                            ]
                            },
                            options: {
                                responsive: true
                            }
                        });
                    }


                });

                // MAINTENANCE REQUEST
                $.ajax({
                    type: 'POST',
                    url: 'ajax/data_analytics_ajax/getMaintenanceRequest.php',
                    data: {date_start:concatinated_start_date, date_end:concatinated_end_date},
                    success: function(data){
                        const output_array = JSON.parse(data);

                        const chart_label = []
                        const total_chart_data = []
                        const active_chart_data = []
                        const solved_chart_data = []

                        output_array.forEach(data => {
                            chart_label.push(month_names[data.month_name])
                            total_chart_data.push(data.total_maintenance)
                            active_chart_data.push(data.active_maintenance)
                            solved_chart_data.push(data.solved_maintenance)
                        });


                        const maintenance_request_chart = document.getElementById('maintenance_request_chart').getContext('2d');
                        const maintenance_chart = new Chart(maintenance_request_chart, {
                            type: 'bar',
                            data: {
                            labels: chart_label,
                            datasets: [
                                {
                                    label: 'Total',
                                    data: total_chart_data
                                },
                                {
                                    label: 'Active',
                                    data: active_chart_data
                                },
                                {
                                    label: 'Completed',
                                    data: solved_chart_data
                                }
                            ]
                            },
                            options: {
                                responsive: true
                            }
                        });
                    }
                });
            } else {
                console.log("invalid date selection");
            }
        } else {
            alert("graph will not work");
        }

    })
})

const month_names = [
    "","January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"  
];
