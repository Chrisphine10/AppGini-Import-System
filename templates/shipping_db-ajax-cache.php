<script>
	$j(function(){
		var tn = 'shipping_db';

		/* data for selected record, or defaults if none is selected */
		var data = {
			supplier: { id: '<?php echo $rdata['supplier']; ?>', value: '<?php echo $rdata['supplier']; ?>', text: '<?php echo $jdata['supplier']; ?>' },
			shipping: { id: '<?php echo $rdata['shipping']; ?>', value: '<?php echo $rdata['shipping']; ?>', text: '<?php echo $jdata['shipping']; ?>' }
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for supplier */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'supplier' && d.id == data.supplier.id)
				return { results: [ data.supplier ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for shipping */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'shipping' && d.id == data.shipping.id)
				return { results: [ data.shipping ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

