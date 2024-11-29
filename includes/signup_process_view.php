<?php
session_start();

function display_signup_error(string $var_name)
{
    if (isset($_SESSION[$var_name])) {
        $error_warning = $_SESSION[$var_name];

        echo $error_warning;

        unset($_SESSION[$var_name]);
    }
}

function signup_success_message(string $var_name)
{
    if (isset($_SESSION[$var_name])) {
        $signup_success = $_SESSION[$var_name];

        echo '<div style="background-color: #a0db9d; position: absolute; top: 175px; height: 50px; width: 400px; border: 2px solid #558f52;">' .
            $signup_success .
            '</div>';

        unset($_SESSION[$var_name]);
    }
}

function disappearing_signup_success_message(string $var_name){
    if (isset($_SESSION[$var_name])) {
        $reservation_success = $_SESSION[$var_name];
        ?>
        <div class="message_container" id="message_container">
            <?php echo $reservation_success; ?>
        </div>
        <?php
        unset($_SESSION[$var_name]);
    }
}
?>

<style>
        .message_container{
            font-family: 'Montserrat', sans-serif;
            font-size: 22px;
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
            text-align: center;
            border: 2px solid rgb(137, 137, 137);
            font-size: 18px;
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
            z-index: 10;
        }

        @media (max-width: 950px) {
            .message_container{
                width: 45%;
            }
        }

        @media (max-width: 690px) {
            .message_container{
                height: 40%;
                width: 60%;
            }
        }

        @media (max-width: 431px) {
            .message_container{
                height: 40%;
                width: 80%;
            }
        }
    </style>
