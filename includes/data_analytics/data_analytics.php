<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'data_analytics_controller.php';

        $start_date = $_POST["startDate"];
        $end_date = $_POST["endDate"];

        if($start_date !== "" && $end_date === ""){
            echo "date greater than ", $start_date;
        } elseif ($start_date === "" && $end_date !== "") {
            echo "date less than ", $start_date;
        } elseif ($start_date !== "" && $end_date !== "") {
            echo "data between ", $start_date, " and ", $end_date;
            $get_month_range = get_month_range($start_date, $end_date);
            print_r($get_month_range);

            $json_data = json_encode($get_month_range);

            echo $json_data;

            header("Location: " . $_SERVER['HTTP_REFERER']);
            die();

        }




    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }
} else {
    header("Location: ../../login_page.php");
    die();
}
