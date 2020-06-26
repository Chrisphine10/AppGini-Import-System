<script>
$j(function(){
    $j('td.shipping_db-bol_date_status').each(function(){
		    if($j(this).text() == 'Actual'){
				$j(this).parent().addClass('danger');
        }
	})
})
</script>