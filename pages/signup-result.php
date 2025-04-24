<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup-result</title>

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

</head>
<body>
    <?php
        if (isset($_POST['txtFullname']) && !empty($_POST['txtFullname']) &&
        isset($_POST['txtUsername']) && !empty($_POST['txtUsername']) &&
        isset($_POST['numCode']) && !empty($_POST['numCode']) &&
        isset($_POST['txtPassword']) && !empty($_POST['txtPassword']) &&
        isset($_POST['txtcPassword']) && !empty($_POST['txtcPassword']) &&
        isset($_POST['txtEmail']) && !empty($_POST['txtEmail']) &&
        isset($_POST['txtAddress']) && !empty($_POST['txtAddress'])) {
            $fullname = $_POST['txtFullname'];
            $username = $_POST['txtUsername'];
            $nationalCode = $_POST['numCode'];
            $password = $_POST['txtPassword'];
            $cpassword = $_POST['txtcPassword'];
            $email = $_POST['txtEmail'];
            $address = $_POST['txtAddress'];
        } else {
            exit("<div class='failed-message message' message-tag='Error'><p class='failed-text'>The Filds is Empty. Please Fill the All Input's</p><a href='./signup.html'>Back to Signup</a></div>");
        }

        if ($password !== $cpassword) {
            exit("<div class='failed-message message' message-tag='Error'><p class='failed-text'>your Password is Not Equal with Confirm Password</p><a href='./signup.html'>Back to Signup</a></div>");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            exit("<div class='failed-message message' message-tag='Error'><p class='failed-text'>Your Email Not True!!!</p><a href='./signup.html'>Back to Signup</a></div>");
        }

        include("../assets/includes/connect.php");

        $addQuery = "INSERT INTO `user`(`user_fullname`, `user_name`, `user_code`, `user_password`, `user_email`, `user_address`) VALUES ('$fullname','$username','$nationalCode','$password','$email','$address')";
        $resolve = mysqli_query($dataBase, $addQuery); 
        if ($resolve) {
            echo("<div class='success-message message' message-tag='Success'><p class='success-text'>Your Account Added to DataBase</p><a href='../public/index.html'>Back to Home</a></div>");
        } else {
            exit("<div class='failed-message message' message-tag='Failed'><p class='failed-text'>I Can't add Your Account to DataBase Please try again</p><a href='../public/index.html'>Back to Home</a></div>");
        }

        mysqli_close($dataBase);
    ?>
</body>
</html>