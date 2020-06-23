<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<style>
.form-control{
	width: 300px!important;
	align-items: centre;
}
</style>
<?php

	$servername = "localhost";
	$username = "root";
	$dbname = "farmicac_imports_clone";
	$password = "";

	// Create connection
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'shipping_db' AND COLUMN_NAME NOT IN ('id')");
		$stmt->execute();

		?>
		<div class="container mt-5 mb-5">
		<div class="column"> 
		<div class="card">
		<div class="card-header">
		<h3>Select the fields to display</h3>
		</div>
		<div class="card-body">

		<form action="results.php" method="post">
		<div class="form-check form-check-block">
		<div class="row">
					
			
		<?php
			while ($row = $stmt->fetch()) {
				echo '<div class="col-3">';
				if($row[0] === 'supplier'){
				   echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
				   echo '<label class="form-check-label" for='. $row[0].'>Supplier</label><br>';
			
				}
				elseif($row[0] === 'description'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Desciption</label><br>';
				}
				elseif($row[0] === 'shipping'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Shipping</label><br>';
				}
				elseif($row[0] === 'date_ordered'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Date Ordered</label><br>';
				}
				elseif($row[0] === 'bol_date'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>BoL Date</label><br>';
				}
				elseif($row[0] === 'designation'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Designation</label><br>';
				}
				elseif($row[0] === 'status'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Status</label><br>';
				}
				elseif($row[0] === 'unit'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Unit</label><br>';
				}
				elseif($row[0] === 'quantity'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Quantity</label><br>';
				}
				elseif($row[0] === 'unit_price'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Unit Price</label><br>';
				}
				elseif($row[0] === 'total_price'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Total Price</label><br>';
				}
				elseif($row[0] === 'payment_terms'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Payment Terms</label><br>';
				}
				elseif($row[0] === 'due'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Payment Date</label><br>';
				}
				elseif($row[0] === 'profoma_invoice'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Profoma Invoice</label><br>';
				}
				elseif($row[0] === 'copy_invoice'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Copy of Invoice</label><br>';
				}
				elseif($row[0] === 'commercial_invoice'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Commercial Invoice</label><br>';
				}
				elseif($row[0] === 'bill_of_ladding'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>BoL</label><br>';
				}
				elseif($row[0] === 'clearing_document'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Clearing Document</label><br>';
				}
				elseif($row[0] === 'other_documents'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Other Documents</label><br>';
				}
				elseif($row[0] === 'logged_by'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Logged By</label><br>';
				}
				elseif($row[0] === 'bol_date_status'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>BoL Date Status</label><br>';
				}
				elseif($row[0] === 'currency'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>Currency</label><br>';
				}
				elseif($row[0] === 'bol_status'){
					echo '<input  class="form-check-input" type="checkbox" id='. $row[0].' name="columns[]" value='. $row[0].'>';
					echo '<label class="form-check-label" for='. $row[0].'>BoL Status</label><br>';
				}
				else{
					echo '<p>error</p>';
				}
				
				echo '</div>';
			}
			
		?>
		</div>
		</div>
		<br>
		<?php

		?>
		<label for="limit"></label>Limit</br>
		<input class="form-control" type="number" name="limit" id="limit"><br>
		<label for="limit"></label>Order By</br>
		<?php
		$stmt = null;
			$stmt = $conn->prepare("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'shipping_db' AND COLUMN_NAME NOT IN ('id')");
			$stmt->execute();
		?>
		<select class="form-control" name="order" id="order">
		<option value="">-select column for order-</option>
		<?php
			while ($row = $stmt->fetch()) {
				if($row[0] === 'supplier'){
					echo '<option value='. $row[0].'>Supplier</option>';
				}
				elseif($row[0] === 'description'){
					echo '<option value='. $row[0].'>Desciption</option>';
				}
				elseif($row[0] === 'shipping'){
					echo '<option value='. $row[0].'>Shipping</option>';
				}
				elseif($row[0] === 'date_ordered'){
					echo '<option value='. $row[0].'>Date Ordered</option>';
				}
				elseif($row[0] === 'bol_date'){
					echo '<option value='. $row[0].'>BoL Date</option>';
				}
				elseif($row[0] === 'designation'){
					echo '<option value='. $row[0].'>Designation</option>';
				}
				elseif($row[0] === 'status'){
					echo '<option value='. $row[0].'>Status</option>';
				}
				elseif($row[0] === 'unit'){
					echo '<option value='. $row[0].'>Unit</option>';
				}
				elseif($row[0] === 'quantity'){
					echo '<option value='. $row[0].'>Quantity</option>';
				}
				elseif($row[0] === 'unit_price'){
					echo '<option value='. $row[0].'>Unit Price</option>';
				}
				elseif($row[0] === 'total_price'){
					echo '<option value='. $row[0].'>Total Price</option>';
				}
				elseif($row[0] === 'payment_terms'){
					echo '<option value='. $row[0].'>Payment Terms</option>';
				}
				elseif($row[0] === 'due'){
					echo '<option value='. $row[0].'>Payment Date</option>';
				}
				elseif($row[0] === 'profoma_invoice'){
					echo '<option value='. $row[0].'>Profoma Invoice</option>';
				}
				elseif($row[0] === 'copy_invoice'){
					echo '<option value='. $row[0].'>Copy of Invoice</option>';
				}
				elseif($row[0] === 'commercial_invoice'){
					echo '<option value='. $row[0].'>Commercial Invoice</option>';
				}
				elseif($row[0] === 'bill_of_ladding'){
					echo '<option value='. $row[0].'>BoL</option>';
				}
				elseif($row[0] === 'clearing_document'){
					echo '<option value='. $row[0].'>Clearing Document</option>';
				}
				elseif($row[0] === 'other_documents'){
					echo '<option value='. $row[0].'>Other Documents</option>';
				}
				elseif($row[0] === 'logged_by'){
					echo '<option value='. $row[0].'>Logged By</option>';
				}
				elseif($row[0] === 'bol_date_status'){
					echo '<option value='. $row[0].'>BoL Date Status</option>';
				}
				elseif($row[0] === 'currency'){
					echo '<option value='. $row[0].'>Currency</option>';
				}
				elseif($row[0] === 'bol_status'){
					echo '<option value='. $row[0].'>BoL Status</option>';
				}
				else{
					echo '<p>error</p>';
				}
			}
		?>
		</select><br>
		<label for="start"></label>Start Date</br>
		<input class="form-control" type="date" name="start" id="start"><br>
		<label for="end"></label>End Date</br>
		<input class="form-control" type="date" name="end" id="end"><br>
		<button class="btn btn-outline-primary" type="submit">Query</button>
		</form>
		</div>
		</div>
		</div>

		<?php
	  } catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	  }
  $conn = null;
?>

</div>
