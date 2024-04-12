<?php
session_start(); 

include '../database/db_conn.php';

?>

<!DOCTYPE html>
<html>

<head>
  <title>NORSU ISMS | Submit Request </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="panel.css">
  <link rel="shortcut icon" href="../img/norsu.png" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
  body {
    height: 100vh;
  }
</style>

<body>

  <br><br>
  <center>
    <form method="post" action="">
      <div id="request" class="form-group text-left col-md-6 mb-4 request-form-width">
        <h2>USER REQUEST FORM</h2></br>
        <div class="form-group">
          <label for="requested_by">PERSON REQUESTED</label>
          <input class="form-control" type="text" name="requested_by"
            value="">
        </div>

        <div class="form-group">
          <label for="form-select">PC#</label>
          <select class="form-select" name="item_n" aria-label="Default select example" required>
            <?php
            $query = "SELECT * FROM item WHERE room = 'Laboratory 1' ORDER BY item_id ASC";


            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result)) {
              $item_n = $row['pc_num'];
              ?>

              <option value="<?php echo $item_n; ?>"><?php echo $item_n; ?></option>
            <?php } ?>
          </select>

        </div>

        <div class="form-group">
          <label for="item_quantity">QUANTITY</label>
          <input type="number" class="form-control" id="item_quantity" name="item_quantity" required>
        </div>

        <div class="form-group">
          <label for="date_requested">DATE</label>
          <input type="date" class="form-control" id="date_requested" name="date_requested" required>
        </div>

        <label for="req_room">ROOM</label>
        <select class="form-select form-select-md mb-3" aria-label=".form-select-sm example" name="req_room">
          <option selected disabled>Select Room</option>
          <option value="Laboratory 1">Lab 1</option>
          <option value="Laboratory 2">Lab 2</option>
        </select>


        <div class="form-outline  col-md-6 mb-4 text-area-form">
          <label for="message">REASON</label>
          <textarea name="message" id="message" class="col-md-12"></textarea>

        </div>

        <div class="pt-1 col-md-6 mb-2">
          <button class="btn btn-dark btn-lg btn-success-34" type="submit" name="submit">Submit</button>
        </div>
    </form>
  </center>
</body>

</html>

<?php

if (isset($_POST['submit'])) {

  $requested_by = $_POST['requested_by'];
  $item_n = $_POST['item_n'];
  $item_quantity = $_POST['item_quantity'];
  $date_requested = $_POST['date_requested'];
  $req_room = $_POST['req_room'];
  $message = $_POST['message'];

  $sub = mysqli_query($conn, "INSERT INTO request ( requested_by, item_n, item_quantity, date_requested, req_room, message, status) VALUES ('$requested_by', '$item_n', '$item_quantity', '$date_requested', '$req_room', '$message', 'Pending')");



  if ($sub > 0) {
    echo '<script>
            var result = confirm("Your request is under process! Would you like to request again?");
            if (result) {
              window.location.href = "user_request.php";
            } else {
              window.location.href = "user_panel.php";
            }
          </script>';
  } else {
    echo "Something went wrong!";
  }
}
?>