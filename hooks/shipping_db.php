<?php
	// For help on using hooks, please refer to https://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks

	function shipping_db_init(&$options, $memberInfo, &$args){

		return TRUE;
	}

	function shipping_db_header($contentType, $memberInfo, &$args){
		$header='';

		switch($contentType){
			case 'tableview':
				$header='';
				break;

			case 'detailview':
				$header='';
				break;

			case 'tableview+detailview':
				$header='';
				break;

			case 'print-tableview':
				$header='';
				break;

			case 'print-detailview':
				$header='';
				break;

			case 'filters':
				$header='';
				break;
		}

		return $header;
	}

	function shipping_db_footer($contentType, $memberInfo, &$args){
		$footer='';

		switch($contentType){
			case 'tableview':
				$footer='';
				break;

			case 'detailview':
				$footer='';
				break;

			case 'tableview+detailview':
				$footer='';
				break;

			case 'print-tableview':
				$footer='';
				break;

			case 'print-detailview':
				$footer='';
				break;

			case 'filters':
				$footer='';
				break;
		}

		return $footer;
	}

	function shipping_db_before_insert(&$data, $memberInfo, &$args){
		if($data['bol_date_status'] == 'Actual') {
			$date = $data['bol_date'];
			$terms = $data['payment_terms'];
			if(strcmp($terms, 'O/A 180 days') === 0){
				$data['due'] = date('Y-m-d', strtotime($date. ' + 180 days'));
			}
			elseif (strcmp($terms, 'O/A 90 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 90 days'));
			}
			elseif (strcmp($terms, 'O/A 60 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 60 days'));
			}
			elseif (strcmp($terms, 'LC 365 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 365 days'));
			}
			elseif (strcmp($terms, 'LC 180 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 180 days'));
			}
			elseif (strcmp($terms, 'LC 90 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 90 days'));
			}
			elseif (strcmp($terms, 'LC 60 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 60 days'));
			}
			elseif (strcmp($terms, 'TT 360 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 360 days'));
			}
			elseif (strcmp($terms, 'TT 180 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 180 days'));
			}
			elseif (strcmp($terms, 'TT 90 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 90 days'));
			}
			elseif (strcmp($terms, 'TT 60 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 60 days'));
			}
			else {
				$data['due'] = 'error: something is wrong.';
			}
			
			//$date_test = date_format($date, "Y-m-d");
			//$data['due'] = strval($date_test);
		} 
		return TRUE;
	}
/*
			switch ($terms) {
				case 'A/O 180 days':
					//$data['due'] = date('Y-m-d', strtotime($data['bol_date']. ' + 180 days'));
					date_add($date,date_interval_create_from_date_string("180 days"));
					break;
				case 'O/A 90 days':
					date_add($date,date_interval_create_from_date_string("90 days"));
					break;
					
				case 'O/A 60 days':
					date_add($date,date_interval_create_from_date_string("60 days"));
					break;
					
				case 'LC 365 days':
					date_add($date,date_interval_create_from_date_string("365 days"));
					break;
					
				case 'LC 180 days':
					date_add($date,date_interval_create_from_date_string("180 days"));
					break;
					
				case 'LC 90 days':
					date_add($date,date_interval_create_from_date_string("90 days"));
					break;
					
				case 'LC 60 days':
					date_add($date,date_interval_create_from_date_string("60 days"));
					break;
					
				case 'TT 360 days':
					date_add($date,date_interval_create_from_date_string("360 days"));
	
					break;
					
				case 'TT 180 days':
					date_add($date,date_interval_create_from_date_string("180 days"));
				
					break;
					
				case 'TT 90 days':
					date_add($date,date_interval_create_from_date_string("90 days"));
					
					break;
					
				case 'TT 60 days':
					date_add($date,date_interval_create_from_date_string("60 days"));
					
					break;
					
				default:
					$data = "test";
					break;
			}
			*/
	function shipping_db_after_insert($data, $memberInfo, &$args){

		return TRUE;
	}

	function shipping_db_before_update(&$data, $memberInfo, &$args){
		if($data['bol_date_status'] == 'Actual') {
			$date = $data['bol_date'];
			$terms = $data['payment_terms'];
			if(strcmp($terms, 'O/A 180 days') === 0){
				$data['due'] = date('Y-m-d', strtotime($date. ' + 180 days'));
			}
			elseif (strcmp($terms, 'O/A 90 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 90 days'));
			}
			elseif (strcmp($terms, 'O/A 60 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 60 days'));
			}
			elseif (strcmp($terms, 'LC 365 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 365 days'));
			}
			elseif (strcmp($terms, 'LC 180 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 180 days'));
			}
			elseif (strcmp($terms, 'LC 90 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 90 days'));
			}
			elseif (strcmp($terms, 'LC 60 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 60 days'));
			}
			elseif (strcmp($terms, 'TT 360 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 360 days'));
			}
			elseif (strcmp($terms, 'TT 180 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 180 days'));
			}
			elseif (strcmp($terms, 'TT 90 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 90 days'));
			}
			elseif (strcmp($terms, 'TT 60 days') === 0) {
				$data['due'] = date('Y-m-d', strtotime($date. ' + 60 days'));
			}
			else {
				$data['due'] = 'No date specified';
			}
			
		return TRUE;
	}
}

	function shipping_db_after_update($data, $memberInfo, &$args){

		return TRUE;
	}

	function shipping_db_before_delete($selectedID, &$skipChecks, $memberInfo, &$args){

		return TRUE;
	}

	function shipping_db_after_delete($selectedID, $memberInfo, &$args){

	}

	function shipping_db_dv($selectedID, $memberInfo, &$html, &$args){

	}

	function shipping_db_csv($query, $memberInfo, &$args){

		return $query;
	}
	function shipping_db_batch_actions(&$args){

		return array();
	}
