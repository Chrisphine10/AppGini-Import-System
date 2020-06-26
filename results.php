<?php
$currDir=dirname(__FILE__);
include("$currDir/defaultLang.php");
include("$currDir/lib.php");
include("$currDir/header.php");

?>
<script>

function printContent(printpage){
    var headstr = "<html><head><title>" + document.title + "</title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return true;
}
function goBack() {
  window.history.back();
}
</script>
<style>
@media print {
    #print {
        background-color: white;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
    }
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
?>

<button class="btn btn-outline-success" style="margin:2px;" onclick="printContent('print')">Print</button>
<button class="btn btn-outline-secondary" style="margin: 2px" onclick="goBack()">Back</button>
<div class="card m-2" id="print">

		<div class="card-body">
<table class="table table-striped table-bordered table-hover">
<thead class="thead-dark">
<tr>
<?php

$columns = $_POST['columns'];
$limit = $_POST['limit'];
$order = $_POST['order'];
$startdate = $_POST['start'];
$enddate = $_POST['end'];
echo '<th>#</th>';
foreach ($columns as $column){
	if($column === 'supplier'){
		echo '<th>Supplier</th>';
	}
	elseif($column === 'description'){
		echo '<th>Desciption</th>';
	}
	elseif($column === 'shipping'){
		echo '<th>Shipping</th>';
	}
	elseif($column === 'date_ordered'){
		echo '<th>Date Ordered</th>';
	}
	elseif($column === 'bol_date'){
		echo '<th>BoL Date</th>';
	}
	elseif($column === 'designation'){
		echo '<th>Designation</th>';
	}
	elseif($column === 'status'){
		echo '<th>Status</th>';
	}
	elseif($column === 'unit'){
		echo '<th>Unit</th>';
	}
	elseif($column === 'quantity'){
		echo '<th>Quantity</th>';
	}
	elseif($column === 'unit_price'){
		echo '<th>Unit Price</th>';
	}
	elseif($column === 'total_price'){
		echo '<th>Total Price</th>';
	}
	elseif($column === 'payment_terms'){
		echo '<th>Payment Terms</th>';
	}
	elseif($column === 'due'){
		echo '<th>Payment Date</th>';
	}
	elseif($column === 'profoma_invoice'){
		echo '<th>Profoma Invoice</th>';
	}
	elseif($column === 'copy_invoice'){
		echo '<th>Copy of Invoice</th>';
	}
	elseif($column === 'commercial_invoice'){
		echo '<th>Commercial Invoice</th>';
	}
	elseif($column === 'bill_of_ladding'){
		echo '<th>BoL</th>';
	}
	elseif($column === 'clearing_document'){
		echo '<th>Clearing Document</th>';
	}
	elseif($column === 'other_documents'){
		echo '<th>Other Documents</th>';
	}
	elseif($column === 'logged_by'){
		echo '<th>Logged By</th>';
	}
	elseif($column === 'bol_date_status'){
		echo '<th>BoL Date Status</th>';
	}
	elseif($column === 'currency'){
		echo '<th>Currency</th>';
	}
	elseif($column === 'bol_status'){
		echo '<th>BoL Status</th>';
	}
	else{
		echo '<p>error</p>';
	}
	if ($limit != null && $order == null && $startdate == null && $enddate == null) {
	  $stmt = $conn->prepare("SELECT *,contacts.name FROM shipping_db INNER JOIN contacts ON(shipping_db.supplier=contacts.id) LIMIT $limit");
	}
	elseif($order !=null && $limit == null && $startdate == null && $enddate == null){
		if($order == "supplier"){
			$stmt = $conn->prepare("SELECT *,contacts.name FROM shipping_db INNER JOIN contacts ON(shipping_db.supplier=contacts.id) ORDER BY contacts.name ASC");
		}
		else{
			$stmt = $conn->prepare("SELECT *,contacts.name FROM shipping_db INNER JOIN contacts ON(shipping_db.supplier=contacts.id) ORDER BY $order ASC");
		}
	}
	elseif($order !=null && $limit != null && $startdate == null && $enddate == null){
		if($order == "supplier"){
			$stmt = $conn->prepare("SELECT *,contacts.name FROM shipping_db INNER JOIN contacts ON(shipping_db.supplier=contacts.id) ORDER BY contacts.name ASC LIMIT $limit");
		}
		else{
		  $stmt = $conn->prepare("SELECT *,contacts.name FROM shipping_db INNER JOIN contacts ON(shipping_db.supplier=contacts.id) ORDER BY $order ASC LIMIT $limit");
	  }
  }
	elseif($startdate != null && $enddate != null && $limit == null && $order == null){
		$stmt = $conn->prepare("SELECT *,contacts.name FROM shipping_db INNER JOIN contacts ON(shipping_db.supplier=contacts.id) WHERE date_ordered BETWEEN '$startdate' AND '$enddate'");
	}
	elseif($limit != null && $order == null && $startdate != null && $enddate != null){
		$stmt = $conn->prepare("SELECT *,contacts.name FROM shipping_db INNER JOIN contacts ON(shipping_db.supplier=contacts.id) WHERE date_ordered BETWEEN '$startdate' AND '$enddate' LIMIT $limit");
	}
	elseif($limit == null && $order != null && $startdate != null && $enddate != null){
		if($order == "supplier"){
			$stmt = $conn->prepare("SELECT *,contacts.name FROM shipping_db INNER JOIN contacts ON(shipping_db.supplier=contacts.id) WHERE date_ordered BETWEEN '$startdate' AND '$enddate' ORDER BY contacts.name ASC");
		}
		else{
		  $stmt = $conn->prepare("SELECT *,contacts.name FROM shipping_db INNER JOIN contacts ON(shipping_db.supplier=contacts.id) WHERE date_ordered BETWEEN '$startdate' AND '$enddate' ORDER BY $order ASC");
	  }
  }
	elseif($limit != null && $order != null && $startdate != null && $enddate != null){
		if($order == "supplier"){
			$stmt = $conn->prepare("SELECT *,contacts.name FROM shipping_db INNER JOIN contacts ON(shipping_db.supplier=contacts.id) WHERE date_ordered BETWEEN '$startdate' AND '$enddate' ORDER BY contacts.name ASC LIMIT $limit");
		}
		else{
		  $stmt = $conn->prepare("SELECT *,contacts.name FROM shipping_db INNER JOIN contacts ON(shipping_db.supplier=contacts.id) WHERE date_ordered BETWEEN '$startdate' AND '$enddate' ORDER BY $order ASC LIMIT $limit");
	  }
  }
	else{
		$stmt = $conn->prepare("SELECT *,contacts.name FROM shipping_db INNER JOIN contacts ON(shipping_db.supplier=contacts.id)");
	}
}
?>
</tr>
</thead>
<?php
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  $i = 1;
  foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
	  ?>
	  <tbody>
	<tr>
		<?php
		if ($columns != null){
			echo '<td>'. $i++ . '</td>';
		}
		foreach ($columns as $column){
			if($column == 'supplier'){
				echo '<td>'.$row['name'].'</td>';
			}else{
				echo '<td>'.$row[$column].'</td>';
			}
		}
		?>
	</tr>
	</tbody>
	<?php
 };
echo "</table>";

?>
<button class="btn btn-outline-success" style="margin:2px;" onclick="printContent('print')">Print</button>
<button class="btn btn-outline-secondary" style="margin: 2px" onclick="goBack()">Back</button>
		<?php
	  } catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	  }
  $conn = null;
?>

</div>
</div>