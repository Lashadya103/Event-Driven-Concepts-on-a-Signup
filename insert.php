<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "choicees";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['register'])) {
    // Retrieve form data
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $pname = $_POST['preferredName'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $pcommunication = $_POST['communicationPreference'];
    $phone = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_code = md5(rand());

    // Generate a random salt
    $salt = uniqid(mt_rand(), true);

    // Generate the salted password hash using 'bcrypt' method to prevent prom bruteforce attacks 
    $saltedPassword = password_hash($password . $salt, PASSWORD_BCRYPT);

    // Prepare and execute the insert query
    $query = "INSERT INTO users_customer_website(firstname, lastname, preferredname, age, address, gender, communication_pref, mobile, email, password, salt, verification_code) VALUES ('$fname', '$lname', '$pname', '$age', '$address', '$gender', '$pcommunication', '$phone', '$email', '$saltedPassword', '$salt', '$verify_code')";
    if (mysqli_query($con, $query)) {
        $_SESSION['status'] = "Data inserted successfully";
        // Redirect or display success message
        header("Location: website.php");
        exit();
    } else {
        $_SESSION['status'] = "Error in inserting data: " . mysqli_error($con);
        // Redirect or display error message
        header("Location: progressbartest.php");
        exit();
    }
}

// Close the database connection
mysqli_close($con);
?>
