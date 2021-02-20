<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once('config.php');
include_once('functions.php');

if (isset($_POST['submit'])) {  
	
		if(empty($_POST['myusername'])) {
		$msg_un = "You must supply your username.";
		}
		else {
		$msg_un = "";
		$un = $_POST['myusername'];
		}
		
		if(empty($_POST['mypassword'])) {
		$msg_pwd = " You must supply your password.";
		}
		else {
		$msg_pwd = "";
		$pwd = $_POST['mypassword'];
		}
		
		if (empty($msg_un) && empty($msg_pwd)) {
				
				//If all input is OK Execute script
				require("config.php");
				$un = $_POST['myusername'];
				$pwd = $_POST['mypassword'];
				$salt = substr(sha1($un),30);
				$newpwd = md5($pwd);
				
				$pwd_salt = "$newpwd" . "$salt";
				$pwd_final = $pwd_salt;
			
				// Connect to server and select database.
				$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sth = $conn->prepare("SELECT * from users WHERE `username` = :username");
				
				$sth->execute(array(':username' => $un));
				
				$records = $sth->fetchAll();
				if(count($records) != 0) {
				
							foreach ($records as $row) {
								
									$dbusername = $row['username'];
									$stored_hash = $row['password'];
									//$pwd_final;
									
									if ($pwd_final == $row['password']) {
										
										$myip = "81.131.27.42";
										$ip = "81.131.27.42";
										//$ip = $_SERVER['REMOTE_ADDR'];
											//Restrict access by ip
											if($myip == $ip){
												//Register sessions
												$_SESSION['myusername'] = $_POST['myusername'];
												//echo "Session = " .  $_SESSION['myusername'];
												$url = "./index.php";
												echo redirect($url);
											}
											else {
												echo "<div class='form-error'><h4 style='text-align:center; margin-top:0px; margin-bottom: 0px; color:#fff;'>Sorry...you are not allowed to have access to this site!</h4></div>";	
											}
										
										

									}

									else {
										echo "<div class='form-error'><h4 style='text-align:center; margin-top:0px; margin-bottom: 0px; color:#fff;'>Wrong username or password!!</h4></div>";	
									}
								
							} //foreach
				}
				else {
		  			echo "<div class='form-error'><h4 style='text-align:center; margin-top:0px; margin-bottom: 0px; color:#fff;'>Wrong username or password</h4></div>";
				}
				
		}//end if empty
		else {
			echo "<div class='form-error'><h4 style='text-align:center; margin-top:0px; margin-bottom: 0px; color:#fff;'>Please correct the following Errors:</h4></div>";
		}

}
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
<!--	
<script>
if (!!navigator.userAgent.match(/Trident\/7\./))	
  return "ie";
	alert('THIS IS IE');		
</script>-->

<!--	
<script type="text/javascript">
	
		if(/MSIE \d|Trident.*rv:/.test(navigator.userAgent))
			$(document).ready(function(){
			alert('THIS IS IE!');
			});	
	
</script>
-->

	
	
<!--	
<script type="text/javascript">
    if(/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) {
		alert('Hello');
		document.write('$(document).ready(function(){ $("#myModal").modal("show");});');
	}    
</script>
-->
	
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal("show");
	});
</script>	

	
	
	

<!--	
<script type="text/javascript">	
$(function(){
	if(/MSIE \d|Trident.*rv:/.test(navigator.userAgent))
		alert('yes');
});
</script>	
-->
	
</head>

<body>
	
<span class="top_bar top_bar_1"></span><span class="top_bar top_bar_2"></span><span class="top_bar top_bar_3"></span><span class="top_bar top_bar_4"></span><span class="top_bar top_bar_5"></span>		
<div style="clear:left;"></div>	
<div class="banner-top-login">	
	<div class="float-left"><img src="images/logo.png"></div>
	<div class="float-right"><a href="#" class="btn btn-secondary">Login</a></div>
</div>




    
	<form class="form-signin text-center" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      
      
		<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
		
      <label>Username: <?php if(isset($_POST['submit']) && !empty($msg_un)) { echo "<span class='note'>".$msg_un."</span>"; } ?></label>
      <input name="myusername" type="text" id="myusername" class="form-control" value="<?php if(isset($_POST['submit'])) { echo $_POST['myusername']; } ?>" placeholder="Email address" >
		
      <label>Password: <?php if(isset($_POST['submit']) && !empty($msg_pwd)) { echo "<span class='note'>".$msg_pwd."</span>"; } ?></label>
      <input name="mypassword" type="password" id="mypassword" class="form-control" value="<?php if(isset($_POST['submit'])) { echo $_POST['mypassword']; } ?>" placeholder="Password">
		
      <!--
		<div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
		-->
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Login">Sign in</button>
	 
      <p class="mt-5 mb-3 text-muted">&copy;Andrew Hosegood <?php echo date('Y'); ?> </p>
    </form>
	
	
	<!-- Enquiry My Car Modal -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-info-circle" aria-hidden="true"></i> Browser Not Supported</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <h5>Sorry it appears you are using a browser thats not supported!</h5>
                <p>Internet Explorer is not compatible with this website. We recommend you upgrade to a more modern browser such as <a href="https://www.google.com/chrome/">Chrome</a> for a better viewing experience.</p>


            </div>
        </div>
    </div>
</div>
<!-- End Enquiry Modal -->
	
	
  </body>
</html>