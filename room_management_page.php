<?php
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Management</title>
    <link rel="stylesheet" href="css//room_management.css">
</head>

<body>
    <div class="room_mngmt_page_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header.php'); ?>
        <!-- header -->

        <!-- page content -->
        <div class="room_mngmt_page_container2">
            <div class="room_mngmt_page_container3">
                <div class="room_mngmt_page_container4">
                    <p style="background-color: yellow; display:flex; justify-content:center; padding: 10px 10px 10px 10px;">Add room</p>
                    <div class="rmngmt_div1">
                        room management
                        <br>
                        add room
                        <form action="" method="post">
                            type room number
                            <br>
                            <br>
                            monthly fee for the room
                            <br>

                            <div class="rmngmt_div2">
                                floor number
                                <select>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <br>
                            <div class="rmngmt_div3">
                                room capacity
                                <button type="button" id="minus_btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                                        <path d="M200-440v-80h560v80H200Z" />
                                    </svg>
                                </button>

                                <span id="counter">1</span>

                                <button type="button" id="add_btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                                        <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="room_mngmt_page_container5">
                    <div class="rmngmt_div4"></div>
                    <table id="dbtable">
                        <tr>
                            <td>room id</td>
                            <td>room number</td>
                            <td>floor number</td>
                            <td>capacity</td>
                            <td>fee</td>
                        </tr>
                        <?php showTable($dbconn); ?>
                    </table>
                </div>

            </div>
        </div>

        <!-- chatbot -->
        <?php include('./templates/chatbot.php'); ?>
        <!-- chatbot -->
    </div>
    <script>
        const addBtn = document.getElementById("add_btn");
        const minusBtn = document.getElementById("minus_btn");
        const number = document.getElementById("counter");
        let counter = 1;
        addBtn.addEventListener("click", function() {
            if (counter < 10) {
                counter++;
                // console.log(counter);
                number.innerHTML = counter;
            }
        })

        minusBtn.addEventListener("click", function() {
            if (counter > 1) {
                counter--;
                // console.log(counter);
                number.innerHTML = counter;
            }
        })
    </script>
</body>

</html>