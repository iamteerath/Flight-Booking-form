<?php
$insert = false;
if(isset($_POST[`name`])){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
// echo"Successful in connectiong to the db";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `booking`.`booking` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully inserted";
    $insert = true;

    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Fitness Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Flight Booking">
    <div class="container">
        <h1>Welcome to Flight Booking Form</h1>
        <p>Enter your details and submit this form to confirm your flight booking </p>
        <?php
        if($insert ==true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you :) </p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone No.">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn"> Submit</button>
        </form>
    </div>

    <script src="index.js"></script>
    <!-- INSERT INTO `booking` (`s.no.`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'test name', '23', 'male', 'nxjsncj@gmail.com', '9898989', 'hi whatsup', current_timestamp()); -->
</body>
</html>