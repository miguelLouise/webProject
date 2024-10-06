<?php
require_once "./includes/login/login_view.php";
include "./middleware/admin_middleware.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Messaging</title>
    <link rel="stylesheet" href="css/inbox_admin.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

    <div class="inbox_page_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header.php'); ?>
        <!-- header -->
    </div>

    <!-- page content -->
    <header>
        <div class="announcement-bar">
            <p>Hello! This is an example of a small announcement!</p>
        </div>
        <div class="header-content">
            <div class="logo">
                <img src="Assets/DDLOGO.png" alt="Logo" />
            </div>
            <div class="search-bar">
                <input type="search" id="searchMessage" name="searchMessage" placeholder="Search Message or Name..." autocomplete="off" />
                <img src="Assets/search.png" alt="Search Icon" />
            </div>
            <div class="notifications">
                <img src="Assets/notif.png" alt="Notifications Icon" />
            </div>
        </div>
    </header>

    <div class="container">
        <aside class="sidebar">
            <button class="new-message-btn" onclick="showNewMessageForm()">
                <span class="material-icons">add</span> New Message
            </button>
            <nav class="menu">
                <ul>
                    <li onclick="showInbox()">Inbox</li>
                    <li onclick="showSentMessages()">Sent Messages</li>
                    <li onclick="showDrafts()">Draft</li>
                </ul>
            </nav>
        </aside>
        
        <main class="content">
            <div id="inbox" class="message-section active">
                <h2>Inbox</h2>
                <div class="message-list">
                    <div class="message-item">
                        <h4>Message from User 1</h4>
                        <p>Sep 15, 2024</p>
                    </div>
                    <div class="message-item">
                        <h4>Message from User 2</h4>
                        <p>Sep 16, 2024</p>
                    </div>
                </div>
            </div>

            <div id="new-message-form" class="message-section">
                <h2>New Message</h2>
                <form>
                    <!-- Added autocomplete attributes -->
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter recipient's email" autocomplete="email">
                    
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="6" placeholder="Write your message" autocomplete="off"></textarea>
                    
                    <button type="submit" class="send-btn">Send</button>
                </form>
            </div>

            <div id="sent-messages" class="message-section">
                <h2>Sent Messages</h2>
                <div class="message-list">
                    <div class="message-item">
                        <h4>Sent Message 1</h4>
                        <p>Sep 14, 2024</p>
                    </div>
                </div>
            </div>

            <div id="drafts" class="message-section">
                <h2>Drafts</h2>
                <div class="message-list">
                    <div class="message-item">
                        <h4>Draft 1</h4>
                        <p>Sep 13, 2024</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="javascript/inbox_page_admin.js"></script>

</body>

</html>
