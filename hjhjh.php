<?php
require_once './includes/login/login_view.php';
require_once './includes/tenant_management/tenant_management_model.php';
require_once './includes/tenant_management/tenant_management_view.php';
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_model.php';
// include "./middleware/user_middleware.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/hjhjh.css">
</head>
<body>


<button id="myButton">Show/Hide Div</button>
<div id="myDiv" style="display: none;">
<button >sample button</button>
    <div class="div1">
    confirm delete
  <form id="deleteForm" action="includes/sample.php" method="post" novalidate>
  <input type="hidden" name="id" value="123">
  <!-- <button type="submit">Delete</button> -->
  <button type="submit" name="action" value="delete">delete</button>
  <button type="submit" name="action" value="cancel">cancel</button>
  </form>
    </div> 
</div>



<script>
function confirmDelete() {
  if (confirm("Are you sure you want to delete?")) {
    // Proceed with deletion (e.g., submit a form, send an AJAX request)
    document.getElementById("deleteForm").submit();
  }
}

const button = document.getElementById("myButton");
  const div = document.getElementById("myDiv");

  button.addEventListener("click",   
 () => {
    if (div.style.display === "none") {
      div.style.display = "block";
    } else {
      div.style.display   
 = "none";
    }
  });
</script>
</body>
</html>