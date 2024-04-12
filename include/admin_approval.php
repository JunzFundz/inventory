<?php
session_start();
include '../database/db_conn.php';

// Query to count the number of items
$sql = "SELECT COUNT(*) AS totalItems FROM request WHERE status='pending'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalItems = $row['totalItems'];

?>

<!DOCTYPE html>
<html>

<head>
  <title>NORSU ISMS | Request Lists</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/css/bootstrap.min.css">
  <link rel="stylesheet" href="panel.css">
  <link rel="stylesheet" href="css-grids.css">
  <link rel="shortcut icon" href="../img/norsu.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Display:wght@500&display=swap" rel="stylesheet">
  <script src="../script/js/bootstrap.min.js"></script>
  <style>
    body {
      font-family: 'Wix Madefor Display', sans-serif;
    }
  </style>
</head>

<body>
  <div class="position-button">
    <a href="admin_panel.php" style="text-decoration: none;color:black"><img src="../img/icons8-back-64.png" alt=""
        class="back-home"><i>Dashboard</i></a>
  </div>
  <div class="admin-style">

    <h1 class="text-center text-white bg-dark col-md-12">PENDING LIST</h1>

    <table class="table table-bordered col-md-12">
      <thead>
        <tr>
          <th scope="col">Request ID</th>
          <th scope="col">ITEM</th>
          <th scope="col">PERSON REQUESTED</th>
          <th scope="col">QUANTITY</th>
          <th scope="col">DATE REQUESTED</th>
          <th scope="col">ROOM</th>
          <th scope="col">REASON</th>
          <th scope="col">STATUS</th>
          <th scope="col">ACTION</th>
        </tr>
      </thead>

      <?php
      $query = "SELECT * FROM request WHERE status = 'pending' ORDER BY request_id ASC";

      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_array($result)) {
        ?>
        <tbody>
          <tr>
            <th scope="row">
              <?php echo $row['request_id']; ?>
            </th>
            <td>
              <?php echo $row['item_n']; ?>
            </td>
            <td>
              <?php echo $row['requested_by']; ?>
            </td>
            <td>
              <?php echo $row['item_quantity']; ?>
            </td>
            <td>
              <?php echo $row['date_requested']; ?>
            </td>
            <td>
              <?php echo $row['req_room']; ?>
            </td>
            <td>
              <?php echo $row['message']; ?>
            </td>
            <td>
              <?php echo $row['status']; ?>
            </td>
            <td>
              <form action="admin_approval.php" method="POST">
                <input type="hidden" name="request_id" value="<?php echo $row['request_id']; ?>" />

                <input type="submit" name="approve" value="Approve" class="btn btn-success button-class-action"> <br>
                <input type="submit" name="delete" value="Reject" class="btn btn-danger button-class-action">

              </form>
            </td>
          </tr>
        </tbody>
      <?php } ?>
    </table>

    <?php
    if (isset($_POST['approve'])) {
      $request_id = $_POST['request_id'];
      $select = "UPDATE request SET status = 'Approved' WHERE request_id = '$request_id' ";
      $resut = mysqli_query($conn, $select);
      echo '<script type = "text/javascript">';
      echo 'if (confirm("Request Accepted")) {';
      echo '  window.location.href = "admin_approval.php";';
      echo '}';
      echo '</script>';
    }

    if (isset($_POST['delete'])) {
      $request_id = $_POST['request_id'];
      $select = "DELETE FROM request WHERE request_id = '$request_id' ";
      $resut = mysqli_query($conn, $select);
      echo '<script type = "text/javascript">';
      echo 'alert("Requested Rejected ");';
      echo 'window.location.href = "admin_approval.php" ';
      echo '</script>';
    }
    ?>

    <a onclick="printPage()" href="">Print</a>

    <h1 class="text-center text-white bg-success col-md-12">APPROVED LIST</h1>

    <!-- Add the delete button -->

    <table class="table table-bordered col-md-12">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">ITEM</th>
          <th scope="col">PERSON REQUESTED</th>
          <th scope="col">QUANTITY</th>
          <th scope="col">DATE REQUESTED</th>
          <th scope="col">ROOM</th>
          <th scope="col">REASON</th>
          <th scope="col">STATUS</th>
        </tr>
      </thead>

      <?php
      $query = "SELECT * FROM request WHERE status = 'Approved'";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_array($result)) { ?>

        <tbody>
          <tr>
          <th scope="row">
              <?php echo $row['request_id']; ?>
            </th>
            <td>
              <?php echo $row['item_n']; ?>
            </td>
            <td>
              <?php echo $row['requested_by']; ?>
            </td>
            <td>
              <?php echo $row['item_quantity']; ?>
            </td>
            <td>
              <?php echo $row['date_requested']; ?>
            </td>
            <td>
              <?php echo $row['req_room']; ?>
            </td>
            <td>
              <?php echo $row['message']; ?>
            </td>
            <td>
              <?php echo $row['status']; ?>
            </td>
          </tr>
        </tbody>

      <?php } ?>

    </table>
    </br>
    </br>
    </br>
  </div>

  <script>
    function printPage() {
      window.print();
    }
  </script>
</body>

</html>