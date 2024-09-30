<?php
include_once("dbcon.php");
$sql_query = "SELECT  `NAME`, `CATEGORY`, `DEPARTMENT`, `SUBJECT`, `CLASS`, `DATE_FROM`, `DATE_TO`, `PR/OR/TW`, `NO_OF_STUDENTS`, `TOTAL` FROM billing";
$resultset = mysqli_query($connection, $sql_query) or die("database error:". mysqli_error($connection));
$developer_records = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
	$developer_records[] = $rows;
}	
if(isset($_POST["export_data"])) {	
	$filename = "veds_".date('Ymd') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
	$show_coloumn = false;
	if(!empty($developer_records)) {
	  foreach($developer_records as $record) {
		if(!$show_coloumn) {
		  // display field/column names in first row
		  echo implode("\t", array_keys($record)) . "\n";
		  $show_coloumn = true;
		}
		echo implode("\t", array_values($record)) . "\n";
	  }
	}
	exit;  
}
?>

