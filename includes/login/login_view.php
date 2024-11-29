<?php
session_start();

function display_login_error(string $var_name)
{
    if (isset($_SESSION[$var_name])) {
        $error_warning = $_SESSION[$var_name];

        echo $error_warning;

        unset($_SESSION[$var_name]);
    }
}

function displayInfo(string $var_name)
{
    if (isset($_SESSION[$var_name])) {
        $email = $_SESSION[$var_name];

        echo $email;

        unset($_SESSION[$var_name]);
    }
}

function display_user_info()
{
    if (isset($_SESSION["user_logged_in"])) {
        echo $_SESSION["user_name"];
        echo "<br>";
        echo $_SESSION["user_email"];
    }
}

function disappearing_login_success_message(string $var_name){
    if (isset($_SESSION[$var_name])) {
        $reservation_success = $_SESSION[$var_name];
        ?>
        <div class="message_container" id="message_container"
        style="font-family: 'Montserrat', sans-serif;
                font-size: 25px;
                font-weight: 600;
                background-color: rgb(255, 255, 255);
                position: absolute;
                height: 25%;
                width: 35%;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 2px solid rgb(137, 137, 137);
                font-size: 18px;
                box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                z-index: 10;

                @media (max-width: 950px) {
                    width: 45%;
                }

                 @media (max-width: 690px) {
                    height: 40%;
                    width: 60%;
                }

                 @media (max-width: 431px) {
                    height: 40%;
                    width: 80%;
                }
                ">
            <?php echo $reservation_success; ?>
        </div>
        <?php
        unset($_SESSION[$var_name]);
    }
}
?>


