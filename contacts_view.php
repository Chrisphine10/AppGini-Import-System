<?php
// This script and data application were generated by AppGini 5.62
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/contacts.php");
	include("$currDir/contacts_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('contacts');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "contacts";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`contacts`.`id`" => "id",
		"`contacts`.`name`" => "name",
		"`contacts`.`entity`" => "entity",
		"`contacts`.`email`" => "email",
		"`contacts`.`phone`" => "phone",
		"`contacts`.`mobile`" => "mobile",
		"`contacts`.`contact_person`" => "contact_person"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`contacts`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => 6,
		7 => 7
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`contacts`.`id`" => "id",
		"`contacts`.`name`" => "name",
		"`contacts`.`entity`" => "entity",
		"`contacts`.`email`" => "email",
		"`contacts`.`phone`" => "phone",
		"`contacts`.`mobile`" => "mobile",
		"`contacts`.`contact_person`" => "contact_person"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`contacts`.`id`" => "No.",
		"`contacts`.`name`" => "Company",
		"`contacts`.`entity`" => "Entity",
		"`contacts`.`email`" => "Email",
		"`contacts`.`phone`" => "Telephone Number",
		"`contacts`.`mobile`" => "Mobile Number",
		"`contacts`.`contact_person`" => "Contact person"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`contacts`.`id`" => "id",
		"`contacts`.`name`" => "name",
		"`contacts`.`entity`" => "entity",
		"`contacts`.`email`" => "email",
		"`contacts`.`phone`" => "phone",
		"`contacts`.`mobile`" => "mobile",
		"`contacts`.`contact_person`" => "contact_person"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array();

	$x->QueryFrom = "`contacts` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "contacts_view.php";
	$x->RedirectAfterInsert = "contacts_view.php?SelectedID=#ID#";
	$x->TableTitle = "Contacts";
	$x->TableIcon = "table.gif";
	$x->PrimaryKey = "`contacts`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("No.", "Company", "Entity", "Email", "Telephone Number", "Mobile Number", "Contact person");
	$x->ColFieldName = array('id', 'name', 'entity', 'email', 'phone', 'mobile', 'contact_person');
	$x->ColNumber  = array(1, 2, 3, 4, 5, 6, 7);

	// template paths below are based on the app main directory
	$x->Template = 'templates/contacts_templateTV.html';
	$x->SelectedTemplate = 'templates/contacts_templateTVS.html';
	$x->TemplateDV = 'templates/contacts_templateDV.html';
	$x->TemplateDVP = 'templates/contacts_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `contacts`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='contacts' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `contacts`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='contacts' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`contacts`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: contacts_init
	$render=TRUE;
	if(function_exists('contacts_init')){
		$args=array();
		$render=contacts_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: contacts_header
	$headerCode='';
	if(function_exists('contacts_header')){
		$args=array();
		$headerCode=contacts_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: contacts_footer
	$footerCode='';
	if(function_exists('contacts_footer')){
		$args=array();
		$footerCode=contacts_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>