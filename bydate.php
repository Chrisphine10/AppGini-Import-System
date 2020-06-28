<?php
$currDir=dirname(__FILE__);
include("$currDir/defaultLang.php");
include("$currDir/lib.php");
include("$currDir/header.php");
?>
<?php
	$supplier = $_GET['supplier'];
	$startdate = $_GET['start'];
	$enddate = $_GET['end'];
	include("config.php");

	// Create connection
	try {
		$conn = new PDO("mysql:host=$dbServer;dbname=$dbDatabase", $dbUsername, $dbPassword);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT contacts.name, total_price, due FROM shipping_db INNER JOIN contacts ON(shipping_db.supplier=contacts.id) WHERE (supplier='$supplier') AND due BETWEEN '$startdate' AND '$enddate'");
?>
<style>
span{
	margin-left: 10px;
	margin-right: 10px;
}
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
<button class="btn btn-outline-success" style="margin:2px;" onclick="printContent('print')">Print</button>
<button class="btn btn-outline-secondary" style="margin: 2px" onclick="goBack()">Back</button>

<div class="card m-2" id="print">
<div class="card-body">

<h4>Summary Period<span><?php echo $startdate?></span>To<span><?php echo $enddate?><span> </h4>
<table class="table table-striped table-bordered table-hover">
<thead class="thead-dark">
<tr>
<th>#</th>
<th>Supplier</th>
<th>Total Price</th>
<th>Payment Date</th>
</tr>
</thead>
<?php
$stmt->execute();
$sum = 0;
$i = 1;
while ($row = $stmt->fetch()) {
	?>
<tbody>
<tr>
<?php
$sum += $row[1];
echo '<td>'. $i++ . '</td>';
echo '<td>'.$row[0].'</td>';
echo '<td>'.$row[1].'</td>';
echo '<td>'.$row[2].'</td>';
?>
</tr>
<?php
 };
 echo "<tr>";
 echo "<td></td>";
 echo "<td><strong>Total</strong></td>";
 echo "<td><strong>$sum</strong></td>";
 echo "<td></td>";
echo "</tr></tbody></table>";
?>
</div>
</div>

<?php
	  } catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	  }
  $conn = null;
?>