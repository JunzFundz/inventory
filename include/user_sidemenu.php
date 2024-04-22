<?php include "../database/function2.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style/css/bootstrap.css">
	<link rel="stylesheet" href="panel.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../style/css/datatables.css">
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
				<table class="table table-striped" id="myTable">
					<thead class="backgroun-inn">
						<tr>
						<th scope="col">PC Number</th>
							<th scope="col">Serial #</th>
							<th scope="col">Room</th>
							<th scope="col">Condition</th>
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
								<?php require_once('load_modals.php'); ?>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>
		</div>
	</div>

	<script src="../script/js/bootstrap.bundle.min.js"></script>
	<script src="../script/js/datatables.js"></script>
	<script>
		$(document).ready(function () {
			let table = new DataTable('#myTable');
		})
	</script>
</body>

</html>