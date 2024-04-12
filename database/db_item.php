<?php

if (isset($_POST['add'])) {

	include "db_conn.php";

	$pc_num = $_POST['pc_num'];
	$serial = $_POST['serial'];
	$room = $_POST['room'];
	$m_con = $_POST['m_con'];
	$k_con = $_POST['k_con'];
	$f_con = $_POST['f_con'];
	$ups_con = $_POST['ups_con'];
	$avr_con = $_POST['avr_con'];
	$item_condition = $_POST['item_condition'];

		$sql = "INSERT INTO item (pc_num, serial, room, m_con, k_con, f_con, ups_con, avr_con, item_condition) VALUES ('$pc_num', '$serial', '$room', '$m_con', '$k_con', '$f_con', '$ups_con', '$avr_con', '$item_condition')";

		$result = mysqli_query($conn, $sql);

		if (mysqli_query($conn, $sql)) {
			echo '<script type = "text/javascript">';
			echo 'alert("Item added sucessfully");';
			echo 'window.location.href = "../include/admin_panel.php" ';
			echo '</script>';
		} else {
			echo "Error: " . mysqli_error($conn);
		}
	
} else {
	include "db_conn.php";

	$sql = "SELECT * FROM item";
	$result = mysqli_query($conn, $sql);
}