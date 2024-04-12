<?php
require '../database/db_conn.php'
	?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Display:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../panel.css">
<style>
.modal{
    font-family: 'Geologica', sans-serif;
}

@import url('https://fonts.googleapis.com/css2?family=Geologica:wght@500&display=swap');

.new-add-btn {
    --primary-color: #645bff;
    --secondary-color: #fff;
    --hover-color: #111;
    --arrow-width: 10px;
    --arrow-stroke: 2px;
    box-sizing: border-box;
    border: 0;
    border-radius: 20px;
    color: var(--secondary-color);
    padding: 1em 1.8em;
    background: var(--primary-color);
    display: flex;
    transition: 0.2s background;
    align-items: center;
    gap: 0.6em;
    font-weight: bold;
  }
  
  .new-add-btn .arrow-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .new-add-btn .arrow {
    margin-top: 1px;
    width: var(--arrow-width);
    background: var(--primary-color);
    height: var(--arrow-stroke);
    position: relative;
    transition: 0.2s;
  }
  
  .new-add-btn .arrow::before {
    content: "";
    box-sizing: border-box;
    position: absolute;
    border: solid var(--secondary-color);
    border-width: 0 var(--arrow-stroke) var(--arrow-stroke) 0;
    display: inline-block;
    top: -3px;
    right: 3px;
    transition: 0.2s;
    padding: 3px;
    transform: rotate(-45deg);
  }
  
  .new-add-btn:hover {
    background-color: var(--hover-color);
  }
  
  .new-add-btn:hover .arrow {
    background: var(--secondary-color);
  }
  .new-add-btn:hover .arrow:before {
    right: 0;
  }
/* content */

.modal-new-style{
    padding-top: 30px;
    padding-left: 30px;
    padding-right: 30px;
    padding-bottom: -30px;
    border-radius: 20px !important;
}
.title-sign{
    font-size: 35px !important;
    text-align: center !important;
}
.modal-header{
    display: flex;
    justify-content: center !important;
}
</style>




<div class="modal fade" id="add-item" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-new-style">
      <div class="modal-header text-center">
        <h1 class="modal-title fs-5 title-sign" id="exampleModalLabel">Add Item</h1>
      </div>
      <div class="modal-body">
      <form class="row g-3" method="post" action="../database/db_item.php"">

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
           value="Computer">
  </div>


  <div class="col-md-6">
    <label for="serial" class="form-label"> <strong>Serial </strong></label>
    <input type="text" 
           class="form-control" 
           id="serial" 
           name="serial" required 
           value="<?php if (isset($_GET['serial']))
	                     echo($_GET['serial']); ?>">
  </div>

  <div class="col-md-3">
    <label for="pc_num" class="form-label newcorsur"> <strong>Pc num</strong></label>
    <input type="text" 
           class="form-control" 
           id="pc_num" 
           name="pc_num" required 
           value="<?php if (isset($_GET['pc_num']))
	                     echo($_GET['pc_num']); ?>">
	</div>

  <div class="col-md-3">
    <label for="item_condition" class="form-label newcorsur"><strong>Condition</strong></label>
    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="item_condition" value="<?php if (isset($_GET['item_condition']))
						echo ($_GET['item_condition']); ?>" >

						<option selected value="working">Working</option>
						<option value="defect" >Defective</option>
					</select>
  </div>

  <div class="col-md-5">
    <label for="room" class="form-label newcorsur"> <strong>Room</strong></label>
    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="room" value="<?php if (isset($_GET['room']))
						echo ($_GET['room']); ?>">
						<option selected value="Laboratory 1">Lab 1</option>
						<option value="Laboratory 2">Lab 2</option>
					</select>
	</div>


<br>
<label for="line">Specifications</label>
<div class="line-in" name="line" style="width: 100%; height: 2px; background-color: white;"></div>
  <div class="col-md-3">
    <label for="m_con" class="form-label newcorsur"><strong>Mouse</strong></label>
    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="m_con" value="<?php if (isset($_GET['m_con']))
						echo ($_GET['m_con']); ?>" >

						<option selected value="working">Working</option>
						<option value="defect" >Defective</option>
					</select>
	</div>


	<div class="col-md-3">
    <label for="k_con" class="form-label newcorsur"><strong>Keyboard</strong></label>
    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="k_con" value="<?php if (isset($_GET['k_con']))
						echo ($_GET['k_con']); ?>" >

						<option selected value="working">Working</option>
						<option value="defect" >Defective</option>
					</select>
  </div>

	<div class="col-md-3">
    <label for="f_con" class="form-label newcorsur"><strong>Monitor</strong></label>
    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="f_con" value="<?php if (isset($_GET['f_con']))
						echo ($_GET['f_con']); ?>" >

						<option selected value="working">Working</option>
						<option value="defect" >Defective</option>
					</select>
  </div>

	<div class="col-md-3">
    <label for="ups_con" class="form-label newcorsur"> <strong>UPS</strong></label>
    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="ups_con" value="<?php if (isset($_GET['ups_con']))
						echo ($_GET['ups_con']); ?>" >

						<option selected value="working">Working</option>
						<option value="defect" >Defective</option>
					</select>
  </div>

	<div class="col-md-3">
    <label for="avr_con" class="form-label newcorsur"> <strong>AVR </strong></label>
    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="avr_con" value="<?php if (isset($_GET['avr_con']))
						echo ($_GET['avr_con']); ?>" >

						<option selected value="working">Working</option>
						<option value="defect" >Defective</option>
					</select>
  </div>

  <div class="modal-footer">
       <button class="new-add-btn" name="add" type="submit">
    Add
    <div class="arrow-wrapper">
        <div class="arrow"></div>

    </div>
</button>
      </div>
      </form>
      </div>
      
    </div>
  </div>
</div>