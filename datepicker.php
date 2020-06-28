<?php
$currDir=dirname(__FILE__);
include("$currDir/defaultLang.php");
include("$currDir/lib.php");
include("$currDir/header.php");

?>
<style>
.column {
  float: left;
  width: 33.33%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.column {
  float: left;
}

.left, .right {
  width: 30%;
}

.middle {
  width: 50%;
}
.form-control{
	width: 300px!important;
	align-items: centre;
}
</style>

<script>
// Listen for click on toggle checkbox
$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});
function goBack() {
  window.history.back();
}
</script>
		<h5 style="margin: 0px;">Select month to summerise:</h5>
		
		<div class="card-body">

		<form action="summary.php" method="get">
	
		<br>
		<?php

		?>
		<label for="start"></label>Start Date</br>
		<input class="form-control" type="date" name="start" id="start"><br>
		<label for="end"></label>End Date</br>
		<input class="form-control" type="date" name="end" id="end"><br>
		<button class="btn btn-outline-primary" type="submit">Query</button>
		</form>
		</div>


