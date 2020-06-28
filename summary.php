<?php
$currDir=dirname(__FILE__);
include("$currDir/defaultLang.php");
include("$currDir/lib.php");
include("$currDir/header.php");
include("config.php");
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
function submitForm(sub) {
document.forms[sub].submit();
}
function clickMe(id, start, end) {
var start = start;
var end = end;
var supplier = id;
let form = document.createElement('form');
form.action = 'bydate.php';
form.method = 'GET';

form.innerHTML = '<input type="number" name="supplier" value='+supplier+'><input type="date" name="start" value='+start+'><input type="date" name="end" value='+end+'>';

// the form must be in the document to submit it
document.body.append(form);

form.submit();
}

</script>
<style>
tr:hover{
	cursor: pointer;
}
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

<?php

	$startdate = $_GET['start'];
	$enddate = $_GET['end'];
	$servername = "localhost";
	$username = "root";
	$dbname = "farmicac_imports_clone";
	$password = "";

	// Create connection
	try {
		$conn = new PDO("mysql:host=$dbServer;dbname=$dbDatabase", $dbUsername, $dbPassword);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT contacts.name, sum(total_price), contacts.id FROM shipping_db INNER JOIN contacts ON(shipping_db.supplier=contacts.id) WHERE due BETWEEN '$startdate' AND '$enddate' GROUP BY supplier ORDER BY total_price DESC");
?>

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
</tr>
</thead>
<?php
$stmt->execute();

$i = 1;
$sum = 0;
while ($row = $stmt->fetch()) {
	?>
<tbody>
<form action="bydate.php" method="get" name="test">
<tr class="submit" onclick="clickMe('<?php echo $row[2]?>', '<?php echo $startdate; ?>', '<?php echo $enddate; ?>')">
<?php
$sum += $row[1];
echo '<td>'. $i++ . '</td>';
echo '<td>'.$row[0].'</td>';
echo '<td>'.$row[1].'</td>';
?>
</tr>
</form>
</tbody>
<tr class="success">
<?php
 };
 echo "<td></td>";
 echo "<td><strong>Total</strong></td>";
 echo "<td><strong>$sum</strong></td>";
echo "</table>";
?>
</tr>
</div>
</div>

<?php
	  } catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	  }
  $conn = null;
?>