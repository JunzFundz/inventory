
<?php
// Start session and include database connection file
if(isset($_POST['request'])) {
    include 'db_conn.php';
    $fname = $_POST['fname'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Insert request into database
    $sql = mysqli_query($conn, "INSERT INTO request (subject, message, status) VALUES ('$subject', '$message', 'pending')");


    if($sql>0) {
        echo "Request sent successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
