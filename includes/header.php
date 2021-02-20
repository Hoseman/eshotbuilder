<div class="bar-top">
<span class="top_bar top_bar_1"></span><span class="top_bar top_bar_2"></span><span class="top_bar top_bar_3"></span><span class="top_bar top_bar_4"></span><span class="top_bar top_bar_5"></span>
</div>		
<div style="clear:left;"></div>	
<?php $header_base_url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>

<header class="navigation-header">
		<nav class="navbar-ah-2 navbar-expand-md-ah fixed-top">
			<div class="container banner-top">
				<div class="row">
					
				<div class="<?php if($header_base_url == $_SERVER['SERVER_NAME'] . "/"){ echo 'col-sm-6'; } elseif($header_base_url == $_SERVER['SERVER_NAME'] . "/index.php"){ echo 'col-sm-6'; } else { 'col-sm-3'; } ?>"><a href="./index.php"><div class="float-left"><img src="images/logo.png"></a></div></div>
				<div class="<?php if($header_base_url == $_SERVER['SERVER_NAME'] . "/"){ echo 'col-sm-6'; } elseif($header_base_url == $_SERVER['SERVER_NAME'] . "/index.php"){ echo 'col-sm-6'; } else { 'col-sm-9'; } ?>">
				<div class="float-right">
					
			<?php
					if($header_base_url == $_SERVER['SERVER_NAME'] . "/"){
						echo "";
					}
					elseif($header_base_url == $_SERVER['SERVER_NAME'] . "/index.php"){
						echo "";
					}
					else {
						echo '<a id="button-1" class="btn-ah btn-secondary" href="#">Base Settings</a>';
						echo '<a id="button-2" class="btn-ah btn-secondary" href="#">Insert Column</a>';
						echo '<a id="button-3" class="btn-ah btn-secondary" href="#">Add Custom Class</a>';
						echo '<a class="btn-ah btn-secondary" href="view_source.php?eshot_id=' . $eshot_id . '" target="_blank">Preview</a>';
						//echo '<a class="btn-ah btn-outline-success-ah" href="download.php?eshot_id=' . $eshot_id . '&eshot_name=' . $eshot_name . '">Download HTML</a>';
					}
			?>
			
			
			<a class="btn-ah btn-secondary" href="/logout.php">Logout</a>
			</div>	
			</div>	
			</div>			
		</nav>
</header>
	


<!--
<div class="banner-top">	
	<div class="float-left"><img src="images/logo.png"></div>
	
</div>
				-->