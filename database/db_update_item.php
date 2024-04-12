<?php

if (isset($_GET['item_id'])) {
    include "db_conn.php";

    $item_id = $_GET['item_id'];

    $sql = "SELECT * FROM item WHERE item_id = $item_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        $sql = "SELECT * FROM item";
        $result = mysqli_query($conn, $sql);
    }
} else if (isset($_POST['update'])) {
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
    $item_id = $_POST['item_id'];


        $sql = "UPDATE item SET 
        pc_num = '$pc_num', 
        serial = '$serial', 
        room = '$room',
        m_con = '$m_con', 
        k_con = '$k_con',  
        f_con = '$f_con', 
        ups_con = '$ups_con', 
        avr_con = '$avr_con', 
        item_condition = '$item_condition' 
        WHERE item_id = $item_id";
        
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: ../include/admin_panel.php?success=Successfully updated");
        } else {
            header("Location: ../interface/update_item.php?item_id=$item_id&error=unknown error occurred");
        }
    
} else {
    include "db_conn.php";

    $sql = "SELECT * FROM item";
    $result = mysqli_query($conn, $sql);
}
?>