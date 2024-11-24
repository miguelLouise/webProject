<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try {
      require_once '../dbh.inc.php';
      require_once 'tenant_management_model.php';
      require_once 'tenant_management_controller.php';
      require_once '../room_management/room_management_model.php';
      require_once '../maintenance_management/maintenance_management_model.php';

      $tenant_id = $_POST["tenant_id"];

      $get_tenant_info = get_tenant_info($dbconn, $tenant_id);
      $get_user_maintenance_request = get_user_maintenance_request($dbconn, $tenant_id);
      $get_room_information = get_room_information($dbconn, $get_tenant_info['room_id']);

      session_start();

      date_default_timezone_set('Asia/Manila');
      $date_today = date("Y-m-d");
      $room_tenants = $get_tenant_info["tenants"];
      $room_tenants--;

      // dormlink tenants
      if ($get_user_maintenance_request) {

        //INSERT INTO MAINTENANCE REQUEST TABLE ARCHIVE
        foreach($get_user_maintenance_request as $data){
          set_maintenance_request_is_archive($dbconn, $data['maintenance_request_id']);
          if ($data['date_completed'] === null) {
            archive_active_maintenance_request($dbconn, $data['maintenance_request_id'], $data['user_id'], $data['tenant_id'], $get_room_information['room_id'], $get_room_information['room_type'], $get_room_information['floor_number'], $get_room_information['room_number'], $data['category'], $data['maintenance_urgency'], $data['description'], $data['date'],  $data['time'], $data['maintenance_status'], $date_today);
          } else {
            archive_maintenance_request($dbconn, $data['maintenance_request_id'], $data['user_id'], $data['tenant_id'], $get_room_information['room_id'], $get_room_information['room_type'], $get_room_information['floor_number'], $get_room_information['room_number'], $data['category'], $data['maintenance_urgency'], $data['description'], $data['date'],  $data['time'], $data['maintenance_status'], $data['date_completed'], $date_today);
          }
        }

        // // UPDATE ROOMS
        $update_room_status = update_room_status($room_tenants, $get_tenant_info["max_capacity"]);
        change_room_status($dbconn, $update_room_status, $get_tenant_info["room_id"]);
        update_room_tenant($dbconn, $room_tenants, $get_tenant_info["room_number"]);

        // UPDATE is_deleted VALUE IN TENANTS TABLE
        delete_tenant($dbconn, $tenant_id, $date_today);

        // INSERT INTO TENANT ARCHIVE TABLE
        archive_dormlink_tenant_info($dbconn, $get_tenant_info["tenant_id"], $get_tenant_info["user_id"], $get_tenant_info["name"], $get_tenant_info["contact_number"], $get_tenant_info["email"], $get_tenant_info["birthday"], $get_tenant_info["room_id"], $get_tenant_info["contract"], $get_tenant_info["start_of_contract"],  $get_tenant_info["end_of_contract"], $date_today);

        $_SESSION["tenant_record_deleted"] = "Tenant Record Removed Successfully";

        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
      }
      // walkin tenants
      else {
        // UPDATE ROOMS
        $update_room_status = update_room_status($room_tenants, $get_tenant_info["max_capacity"]);
        change_room_status($dbconn, $update_room_status, $get_tenant_info["room_id"]);
        update_room_tenant($dbconn, $room_tenants, $get_tenant_info["room_number"]);

        // UPDATE is_deleted VALUE IN TENANTS TABLE
        delete_tenant($dbconn, $tenant_id, $date_today);

        // INSERT INTO TENANT ARCHIVE TABLE
        archive_walkin_tenant_info($dbconn, $get_tenant_info["tenant_id"], $get_tenant_info["name"], $get_tenant_info["contact_number"], $get_tenant_info["email"], $get_tenant_info["birthday"], $get_tenant_info["room_id"], $get_tenant_info["contract"], $get_tenant_info["start_of_contract"], $get_tenant_info["end_of_contract"], $date_today);

        $_SESSION["tenant_record_deleted"] = "Tenant Record Removed Successfully";

        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
      }
      } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
      }
} else {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    die();
}

