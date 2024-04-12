<?php include '../database/db_update_item.php'; ?>
<!DOCTYPE html>
<html>

<head>

	<title>Update Item</title>
	<link rel="stylesheet" href="../excess/style.css">
	<link rel="stylesheet" href="../style/css/bootstrap.css">
	<link rel="shortcut icon" href="../img/norsu.png" type="image/x-icon">
	<link rel="stylesheet" href="css-grids-admin.css">
</head>
<style>
	form {
		margin: -10% 30% 30% 30%;
	}
  .modal-new-width{
    margin-top: 60px;
    margin-bottom: -50px;
    width: 40% ;
  }
  .newcorsur:hover{
	cursor: help;
}
</style>

<body>

	<div class="container modal-new-width">
  <form class="row g-3" method="post" action="../database/db_update_item.php">

  <h4 class="display-4 text-center">Update Item</h4>

<?php if (isset($_GET['error'])) { ?>
<div class="alert alert-danger" role="alert">
<?php echo $_GET['error']; ?>
</div>
<?php } ?>

<div class="col-md-6">
<label for="itemscol" class="form-label newcorsur"><strong>Item</strong></label>
<input type="text" 
     class="form-control" 
     id="itemscol" 
     name="" required 
      value="Computer" disabled>
</div>


<div class="col-md-6">
<label for="serial" class="form-label"><strong>Serial </strong></label>
<input type="text" 
     class="form-control" 
     id="serial" 
     name="serial" required 
      value="<?= $row['serial'] ?>">
</div>

<div class="col-md-3">
<label for="pc_num" class="form-label newcorsur"> <strong>Pc num</strong></label>
<input type="text" 
     class="form-control" 
     id="pc_num" 
     name="pc_num" required 
      value = "<?= $row['pc_num'] ?>">
</div>

<div class="col-md-3">
    <label for="item_condition" class="form-label newcorsur"><strong>Condition</strong></label>
    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="item_condition">
        <option value="working" <?php if ($row['item_condition'] === 'working') echo 'selected'; ?>>Working</option>
        <option value="defect" <?php if ($row['item_condition'] === 'defect') echo 'selected'; ?>>Defective</option>
    </select>
</div>


<div class="col-md-5">
<label for="room" class="form-label newcorsur"> <strong>Room</strong></label>
<select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="room"  value="<?= $row['room'] ?>">

			<option value="Laboratory 1" <?php if ($row['room'] === 'Laboratory 1') echo 'selected'; ?>>Lab 1</option>
        <option value="Laboratory 2" <?php if ($row['room'] === 'Laboratory 2') echo 'selected'; ?>>Lab 2</option>
    </select>
</div>


<br>
<label for="line">Components</label>
<div class="line-in" name="line" style="width: 100%; height: 2px; background-color: white;"></div>
<div class="col-md-3">
<label for="m_con" class="form-label newcorsur"><strong>Mouse</strong></label>
<select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="m_con"  value="<?= $row['m_con'] ?>" >
        <option value="working" <?php if ($row['m_con'] === 'working') echo 'selected'; ?>>Working</option>
        <option value="defect" <?php if ($row['m_con'] === 'defect') echo 'selected'; ?>>Defective</option>
    </select>
</div>


<div class="col-md-3">
<label for="k_con" class="form-label newcorsur"><strong>Keyboard</strong></label>
<select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="k_con"  value="<?= $row['k_con'] ?>" >

        <option value="working" <?php if ($row['k_con'] === 'working') echo 'selected'; ?>>Working</option>
        <option value="defect" <?php if ($row['k_con'] === 'defect') echo 'selected'; ?>>Defective</option>
    </select>
</div>

<div class="col-md-3">
<label for="f_con" class="form-label newcorsur"><strong>Monitor</strong></label>
<select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="f_con"  value="<?= $row['f_con'] ?>" >

        <option value="working" <?php if ($row['f_con'] === 'working') echo 'selected'; ?>>Working</option>
        <option value="defect" <?php if ($row['f_con'] === 'defect') echo 'selected'; ?>>Defective</option>
    </select>
</div>

<div class="col-md-3">
<label for="ups_con" class="form-label newcorsur"> <strong>UPS</strong></label>
<select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="ups_con"  value="<?= $row['ups_con'] ?>" >

        <option value="working" <?php if ($row['ups_con'] === 'working') echo 'selected'; ?>>Working</option>
        <option value="defect" <?php if ($row['ups_con'] === 'defect') echo 'selected'; ?>>Defective</option>
    </select>
</div>

<div class="col-md-3">
<label for="avr_con" class="form-label newcorsur"> <strong>AVR </strong></label>
<select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="avr_con"  value="<?= $row['avr_con'] ?>" >

        <option value="working" <?php if ($row['avr_con'] === 'working') echo 'selected'; ?>>Working</option>
        <option value="defect" <?php if ($row['avr_con'] === 'defect') echo 'selected'; ?>>Defective</option>
    </select>
</div>
<input type="text" 
	  		   name="item_id"
	  		   value="<?=$row['item_id']?>"
	  		   hidden >


 <button class="btn btn-secondary" type="sumbit" name="update">Update</button>

 </div>
</form>

</body>

</html>