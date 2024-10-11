<?php
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/aaa.css">
</head>
<body>
  <form method="post" >

<label for="floor">floor number:</label>
<select name="floor" id="floor" oninput="this.form.submit();">
<option value="0" selected disabled hidden>floor number</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select>
  </form>
  <!-- selected disabled hidden -->
<?php 
// $roomTypes = showRoomTypes($dbconn);
// $roomTyp = $_POST["roomType"];
$flr = $_POST["floor"];
echo $flr;
// $aaa = query02($dbconn, $roomTyp, $flr);
// print_r($aaa);
// echo '<br>';

// echo '<label for="roomType">room type:</label>';
// echo '<select name="roomType" id="roomType" >';
// echo '<option value="1">1</option>';
// echo '</select>';
 ?>


</select>
</body>
</html>

