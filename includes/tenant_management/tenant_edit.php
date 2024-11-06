<?php

if($_SERVER["REQUEST_METHOD"] == "GET"){
    try {
      require_once '../dbh.inc.php';
      require_once 'tenant_management_model.php';
      require_once '../room_management/room_management_model.php';

        $tenant_id = $_GET["tenant_id"];

        session_start();

        if ($_GET['action'] == 'add')  {
            echo "i dont know yet";
        }
        // delete reservation
        elseif ($_GET['action'] == 'delete') {
          $get_tenant_info = get_tenant_info($dbconn, $tenant_id);
          $room_tenants = $get_tenant_info["tenants"];

          $room_tenants--;

          
          update_room_tenant($dbconn, $room_tenants, $get_tenant_info["room_number"]);
          soft_delete_maintenance_request($dbconn, $tenant_id);
          delete_tenant($dbconn, $tenant_id);

          $_SESSION["tenant_record_deleted"] = "tenant record deleted successfully";

          header("Location: ../../tenant_management_page_admin.php");
          die();
        }
      } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
      }
} else {
    header("Location: ../../tenant_management_page_admin.php");
    die();
}

