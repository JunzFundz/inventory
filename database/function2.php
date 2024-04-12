<?php

include "db_conn.php";

$sql = "SELECT * FROM item WHERE room = 'Laboratory 1' ORDER BY pc_num";
$result = mysqli_query($conn, $sql);
