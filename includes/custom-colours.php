<style>
<?php


//grab the custon colour values from the database
	
	$sth = $conn->prepare("SELECT * from $tbl_name_custom_colour");
	$sth->execute(array(':id' => $id));
	$records = $sth->fetchAll();
	$count = count($records);
	if(count($records) != 0) {
	
		foreach ($records as $row) {
?>

		.button-selector [type="radio"] + .font-<?php echo $row['id']; ?>-button:before {
			content: '';
			display: inline-block;
			width: 1em;
			height: 1em;
			vertical-align: -0.25em;
			border-radius: 0.0em;
			border: 0.128em solid #efefef;
			box-shadow: 0 0 0 0.12em #333;
			margin-right: 0.75em;
			transition: 0.5s ease all;
			background-color: <?php echo $row['colour']; ?> !important;
		}
		
		.button-selector [type="radio"] + .font-<?php echo $row['id']; ?>-button {
			font-size:14px;
		}
	
		.button-selector [type="radio"]:checked + .font-<?php echo $row['id']; ?>-button:before {
	  		box-shadow: 0 0 0 0.35em <?php echo $row['colour']; ?>;
		}
	
		.button-selector-2 [type="radio"] + .font-<?php echo $row['id']; ?>-bg-button:before {
			content: '';
			display: inline-block;
			width: 1em;
			height: 1em;
			vertical-align: -0.25em;
			border-radius: 0.0em;
			border: 0.128em solid #efefef;
			box-shadow: 0 0 0 0.12em #333;
			margin-right: 0.75em;
			transition: 0.5s ease all;
			background-color: <?php echo $row['colour']; ?> !important;
		}
		
		.button-selector-2 [type="radio"] + .font-<?php echo $row['id']; ?>-bg-button {
			font-size:14px;
		}
	
		.button-selector-2 [type="radio"]:checked + .font-<?php echo $row['id']; ?>-bg-button:before {
	  		box-shadow: 0 0 0 0.35em <?php echo $row['colour']; ?>;
		}
	
			

<?php
		}
	}
?>
</style>