<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!(isset($_SESSION['myusername']) && $_SESSION['myusername'] != '')) { header ("Location: login.php"); }
include 'config.php';
$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$myid=1;

	if(isset($_POST['submit'])){
		
		//Count the number of records
		//$id = 1;
		//$sth = $conn->prepare("SELECT DISTINCT eshot_id, eshot_name FROM $tbl_name");
		//$sth->execute(array(':id' => $id));
		//$records = $sth->fetchAll();
		//echo $count = count($records);
		
		//Grab the last entry from the DB
		$id = 1;
		$sth = $conn->prepare("SELECT DISTINCT eshot_id, eshot_name FROM $tbl_name ORDER BY eshot_id DESC LIMIT 1 ");
		$sth->execute(array(':id' => $id));
		$records = $sth->fetchAll();
		$array = array();
		
		if(count($records) != 0) {
					foreach ($records as $row) {
						$eshot_id_array[] = $row['eshot_id'];
					}
		}
		echo $eshot_id_array[0];
		//exit;
		//prepare the data to insert into DB
		$eshot_name = $_POST['eshot_name'];
		$eshot_url = $_POST['eshot_url'];
		$eshot_title = $_POST['eshot_title'];
		if(empty($_POST['col_base_colour'])){
			echo $col_base_colour = "#ffffff";
		}
		else {
			echo $col_base_colour = $_POST['col_base_colour'];	
		}	
		$year = $_POST['year'];
		$eshot_full_url = $_POST['year']."/". $_POST['eshot_url'];
		$eshot_id = $eshot_id_array[0] +1;
		
		if(!empty($eshot_name) && !empty($eshot_url) && !empty($year) && !empty($eshot_id) && !empty($eshot_title)){
			//Do the insert
			$sql = "INSERT INTO $tbl_name (eshot_id, eshot_name, eshot_url, eshot_title, col_base_colour) VALUES (:eshot_id, :eshot_name, :eshot_url, :eshot_title, :col_base_colour)";
			$q = $conn->prepare($sql);
			$q->execute(array(
						  ':eshot_id'=>$eshot_id,
						  ':eshot_name'=>$eshot_name,
						  ':eshot_url'=>$eshot_full_url,
						  ':eshot_title'=>$eshot_title,
						  ':col_base_colour'=>$col_base_colour
						 ));
		}
		else{
			echo "<p>You must enter a value in all the fields!</p>";
			exit;
		}
		
			
	}//end if isset	
	?>	
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet"> 
<link rel="stylesheet" href="css/style.css">

	
</head>

<body>


	
<?php include 'includes/header.php'; ?>

    <!-- Begin page content -->
    <div class="container home-padding">

<!-- Accordian -->

<div class="accordion" id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link btn-animate-1" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i id="ah" class="fa fa-plus-circle" aria-hidden="true"></i> Add Eshot
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
	  		<form method="post" action="" class="eshot-builder-form" >
				<div class="container">
					<div class="add-eshot">
							<div class="add-eshot-left">
								<label class="" name="eshot_name"><strong>Eshot Name:</strong></label>
								<input class="form-control" name="eshot_name" value="" placeholder="Eshot Name Goes Here...">
							</div>
							<div class="add-eshot-middle">
								<label class="" name="eshot_url"><strong>Full path to images folder:</strong></label><br>
								<span class="add-eshot-form-1">emails.bigmarketing.co.uk</span>
								<span class="add-eshot-form-2">
									/
								</span>
								<span class="add-eshot-form-2">
									<select name="year">
										<option value="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>
										<option value="<?php echo date("Y") -1; ?>"><?php echo date("Y") -1; ?></option>
										<option value="<?php echo date("Y") -2; ?>"><?php echo date("Y") -2; ?></option>
									</select>
								</span>
								<span class="add-eshot-form-2">
									/
								</span>
								<span class="add-eshot-form-3">
									<input class="form-control eshot-url" name="eshot_url" value="" placeholder="path-to/images-folder/">
								</span>
							</div>
							<div class="add-eshot-middle">
								<label class="" name="eshot_name"><strong>Eshot Title:</strong></label>
								<input class="form-control" name="eshot_title" placeholder="Eshot Page Title Goes Here..." value="">
							</div>
							<div class="add-eshot-middle">
								<label class="" name="eshot_base_colour"><strong>Eshot Background Colour (If left empty default colour is white):</strong></label>
								<input class="form-control" name="col_base_colour" placeholder="#ffffff" value="">
							</div>	
							<div class="add-eshot-right">
								<input type="submit" value="Save" name="submit" class="btn btn-primary eshot-name-submit">
							</div>
					</div>
				</div><!-- end container -->
			</form><!-- end form -->
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link btn-animate-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <i class="fa fa-minus-circle" aria-hidden="true"></i> Delete Eshots
        </button>
      </h5>
    </div>

	<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
		
			<div class="container">
						<div class="delete-eshot">	
							<form method="post" action="delete_eshot.php" class="eshot-builder-form" >	
							<select name="eshot_delete_id" class="form-control delete-eshot-form-field">
							<option value="">Please choose...</option>	
							<?php
							$sth = $conn->prepare("SELECT DISTINCT eshot_id, eshot_name FROM $tbl_name");
								$sth->execute(array(':id' => $myid));
								$records = $sth->fetchAll();
								$count = count($records);

								if(count($records) != 0) {
									foreach ($records as $row) {
									$eshot_id = $row['eshot_id'];
									$eshot_name = $row['eshot_name'];	
									?>
										<option value="<?php echo $eshot_id; ?>"><?php echo $eshot_name; ?></option>
									<?php
									}
								}
							?>	
							</select>
							<input type="submit" value="Delete" name="submit" class="btn btn-primary delete-eshot-submit" onclick="return confirm('Are you sure you want to delete?')">
							</form><!-- end form -->
						</div>	
			</div><!-- End Container -->	  

      </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link btn-animate-3 collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <i class="fa fa-pencil-square" aria-hidden="true"></i> Current Eshots
        </button>
      </h5>
	</div>
	
    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
		
			<ul class="list-group">
					
					<?php
							//$sth = $conn->prepare("SELECT * from $tbl_name where eshot_id like 1");
							$sth = $conn->prepare("SELECT DISTINCT eshot_id, eshot_name FROM $tbl_name");
							$sth->execute(array(':id' => $myid));
							$records = $sth->fetchAll();
							$count = count($records);
			
							if(count($records) != 0) {
			
								foreach ($records as $row) {								
									//$id = $row['id'];
									$eshot_id = $row['eshot_id'];
									$eshot_name = $row['eshot_name'];			
					?>
						<li class="list-group-item"><i class="fa fa-fw">&#xf016</i> (<?php echo $eshot_id; ?>) <?php echo $eshot_name; ?> 
							<a href="/eshot-builder.php?eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name; ?>" class="btn btn-primary pull-right">View</a>
						</li>
						
					<?php						
								}
							}
			
						?>	
			
			</ul>
	

      </div>
    </div>
  </div>
</div>

		<!-- Accordian -->

		
		<div class="row">
			

			

			
		</div>
	

		
		
	<!--	</div> -->
		
		
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="scripts/custom.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>	

	
</body>
</html>