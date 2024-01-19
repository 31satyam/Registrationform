<?php
$insert = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['name']) && isset($_POST['gender']) &&
        isset($_POST['age']) && isset($_POST['email']) &&
        isset($_POST['phone']) && isset($_POST['desc'])
    ) {
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "winter_trip";

        $con = mysqli_connect($server, $username, $password, $database);

        if (!$con) {
            die("Connection to the database failed due to: " . mysqli_connect_error());
        }

        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];

        $sql = "INSERT INTO `winter_trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
                VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";

        if ($con->query($sql) === true) {
            $insert = true;
        } else {
            echo "ERROR: " . $sql . "<br>" . $con->error;
        }

        $con->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="Banner-mobile-1.webp" alt="ABESIT">
    <div class="container">
        <h1>Welcome to ABESIT Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the trip</p>";
        }
    ?>
        <form action="index2.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>
