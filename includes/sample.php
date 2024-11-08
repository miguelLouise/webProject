<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try {
        if ($_POST['action'] == 'delete')  {
            echo "delete";
        }

        elseif ($_POST['action'] == 'cancel') {
            header("Location: ../../hjhjh.php");
            die();
        }
      } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
      }
} else {
    header("Location: ../../tenant_management_page_admin.php");
    die();
}

