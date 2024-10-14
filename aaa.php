<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<body>
<div id="selectContainer">
    <?php
    $data[] = ["apple", "banana", "orange"];
    foreach ($data as $item) {
        echo '<select id="select_' . $item . '" onchange="updateValue(this)">
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
        </select>';
    }
    ?>
</div>
</body>
</html>