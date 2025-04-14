<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        @import url(../styles/base.css);

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--light-clr);
            overflow: hidden;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url(../images/background.jpg);
        }

        .message {
            position: relative;
        }

        .message::after {
            content: '';
            width: 5rem;
            height: .6rem;
            left: 0;
            right: 0;
            bottom: -1.5rem;
            margin: 0 auto;
            position: absolute;
            border-radius: 5rem;
            box-shadow: inherit;
            background-color: var(--light-clr);
        }

        .message::before {
            content: attr(message-tag);
            position: absolute;
            top: 1rem;
            right: 1rem;
            border-radius: .5rem;
            padding: .7rem 1rem;
            font-weight: 600;
        }

        div {
            padding: 0 10rem;
            height: 16rem;
            border-radius: .5rem;
            background-color: #fafafa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 1.7rem;
            box-shadow: var(--shadow-box);
        }

        .success-message::before {
            background-color:rgba(46, 184, 31, 0.34);
        }

        .failed-message::before {
            background-color:rgba(220, 37, 37, 0.26);
        }

        .success-message {
            color: var(--primary-clr);
        }

        .failed-message {
            color:rgb(203, 26, 26); 
        }

        a {
            text-decoration: none;
            color: var(--light-clr);
            padding: .7rem 3rem;
            border-radius: .5rem;
            margin-top: 2rem;
            background-color: var(--primary-clr);
        }
        
    </style>

    <title>signin-result</title>
</head>
<body>
<?php
        if (isset($_POST['txtUsername']) && !empty($_POST['txtUsername']) &&
        isset($_POST['txtPassword']) && !empty($_POST['txtPassword'])) {
            $username = $_POST['txtUsername'];
            $password = $_POST['txtPassword'];
        } else {
            exit("<div class='failed-message message' message-tag='Error'><p class='failed-text'>The Filds is Empty. Please Fill the All Input's</p><a href='./signin.html'>Back to Signin</a></div>");
        }

        $dataBase = mysqli_connect("localhost", "root", "", "shop_db");
        if (mysqli_connect_errno()) {
            exit("<p class='error'>Can't Connect to DataBase. error => ".mysqli_connect_error()."</p>");
        }

        $addQuery = "SELECT * FROM `user` WHERE `user_name`='$username' AND `user_password`='$password'";
        $resolve = mysqli_query($dataBase, $addQuery);
        $data = mysqli_fetch_array($resolve); 
        if ($data) {
            echo("<div class='success-message message' message-tag='Success'><p class='success-text'>Wellcome Back ".$data['user_name']."</p><a href='../public/index.html'>Back to Home</a></div>");
        } else {
            exit("<div class='failed-message message' message-tag='Failed'><p class='failed-text'>The $username Account Not Found Please Signup 👇</p><a href='./signup.html'>Signup</a></div>");
        }

        mysqli_close($dataBase);
    ?>
</body>
</html>