<?php include "../database/function.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style/css/bootstrap.css">
	<link rel="stylesheet" href="panel.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
	<title>NORSU ISMS | Admin Dashboard</title>

	<style>
		body {
			background: #BFD5E2;
		}
	</style>
</head>

<body class="side-menu-bg">

	<div class="container">
		<div class="box">
			<h1 class="display-4 text-center title-1">Inventory & Supply Management for Computer System <br> NORSU - Bais
				Campus</h1><br>
				
			<?php if (mysqli_num_rows($result)) { ?>
				<table class="table table-striped">
					<thead class="backgroun-inn">
						<tr>
							<th scope="col">PC Number</th>
							<th scope="col">Serial #</th>
							<th scope="col">Room</th>
							<th scope="col">Condition</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php

						while ($rows = mysqli_fetch_assoc($result)) { ?>
							<tr>
								<td>
									<?= $rows['pc_num']; ?>
								</td>
								<td>
									<?= $rows['serial']; ?>
								</td>
								<td>
									<?= $rows['room']; ?>
								</td>
								<td>
									<?= $rows['item_condition']; ?>
								</td>
								<td>
									<a class="btn" href="view.php?item_id=<?= $rows['item_id']?>"><img
											src="../img/eye.ico" alt="View Item" class="icon-size"></a>

									<a class="btn" href="update_item.php?item_id=<?= $rows['item_id']?>"><img
											src="../img/icons8-update-48.png" alt="" class="icon-size"></a>

									<a class="btn" href="../database/db_item_delete.php?item_id=<?= $rows['item_id'] ?>"><img
											src="../img/icons8-delete-48.png" alt="" class="icon-size"></a>
								</td>
								<?php require_once('load_modals.php'); ?>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>
		</div>
	</div>

	<script src="../script/js/bootstrap.bundle.min.js"></script>
</body>

</html>