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

      session_start();

      date_default_timezone_set('Asia/Manila');
      $date_today = date("Y-m-d");
      $room_tenants = $get_tenant_info["tenants"];
      $room_tenants--;
      // dormlink tenants
      if ($get_user_maintenance_request) {
        $date = date("Y-m-d");
        foreach($get_user_maintenance_request as $data){
        delete_maintenance_request($dbconn, $data["tenant_id"]);
        }

        $update_room_status = update_room_status($room_tenants, $get_tenant_info["max_capacity"]);
        change_room_status($dbconn, $update_room_status, $get_tenant_info["room_id"]);
        update_room_tenant($dbconn, $room_tenants, $get_tenant_info["room_number"]);
        delete_tenant($dbconn, $tenant_id, $date);
        // archive_user_info($dbconn, $get_tenant_info["tenant_id"], $get_tenant_info["user_id"], $get_tenant_info["name"], $get_tenant_info["contact_number"], $get_tenant_info["email"], $get_tenant_info["birthday"], $get_tenant_info["room_id"], $get_tenant_info["contract"], $get_tenant_info["start_of_contract"], $date);

        $_SESSION["tenant_record_deleted"] = "Tenant Record Deleted Successfully";

        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
      } else {// walkin tenants
        $date = date("Y-m-d");
        $update_room_status = update_room_status($room_tenants, $get_tenant_info["max_capacity"]);
        change_room_status($dbconn, $update_room_status, $get_tenant_info["room_id"]);
        update_room_tenant($dbconn, $room_tenants, $get_tenant_info["room_number"]);
        delete_tenant($dbconn, $tenant_id, $date);
        archive_user_info($dbconn, $get_tenant_info["tenant_id"], $get_tenant_info["user_id"], $get_tenant_info["name"], $get_tenant_info["contact_number"], $get_tenant_info["email"], $get_tenant_info["birthday"], $get_tenant_info["room_id"], $get_tenant_info["contract"], $get_tenant_info["start_of_contract"], $date);

        $_SESSION["tenant_record_deleted"] = "Tenant Record Deleted Successfully";

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

