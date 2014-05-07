<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>All The News</title>
     <?php
    	session_start();
    	$_SESSION['login']=$_COOKIE['login']; 
    	$_SESSION['user']=$_COOKIE['user'];
    	$_SESSION['u_id']=$_COOKIE['u_id']; 
    ?>
    <link rel="stylesheet" type="text/css" href="sdmenu/sdmenu.css" />
   
	<script type="text/javascript" src="sdmenu/sdmenu.js">
		/***********************************************
		* Slashdot Menu script- By DimX
		* Submitted to Dynamic Drive DHTML code library: http://www.dynamicdrive.com
		* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
		***********************************************/
	</script>

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

	<script type="text/javascript" src="ATN.js">
	</script>

    <link rel="stylesheet" type="text/css" href="ATN.css" />

</head>

		<body>

				<!--#echo var="DATE_LOCAL" -->
				 
				<div id="popupbox"> 
					<form name="Login" action="login.php" method="post">
						<center>Username:</center>
						<center><input name="username" size="14" id="usernameL" /></center>
						<center>Password:</center>
						<center><input name="password" type="password" size="14" id="passwordL" /></center>
						<br />
						<center>
							<input type="submit" name="submit" value="login" />
							<button type="button" onclick="closeFunction()">Cancel</button>
						</center>
					</form>
				</div> 

				<div id="regbox"> 
					<form name="reg" id='reg' action="siteUpdate.php" method="post">
						<center>Username:</center>
						<center><input name="username" size="14" /></center>
						<center>Password:</center>
						<center><input name="password" type="password" id='p1' size="14" /></center>
						<center>Confirm Password:</center>
						<center><input name="passwordC" type="password" id='p2' size="14" /></center>
						<div id="problem"><center>Password Mismatch</center></div>
						<br />
						<center>
							<button type="button" onclick="passCheck()">Register</button>
							<button type="button" onclick="closeFunction()">Cancel</button>
						</center>
					</form>
				</div> 

				<div class="header"><a href="main.php"><img src="img/logo.png"></img></a></div>
				<div class="barRight"></div>
				
				
				<div style="float: left" id="my_menu" class="sdmenu">
				    <div>
				      	<?php if(isset($_SESSION['login'])) {?>
				      	<span><?php echo $_SESSION['user'] ?></span>
				        	<a href="javascript:logout();">Logout</a>
				        <?php } else { ?>
				        <span>Account</span> 
				        	<a href="javascript:login('show');">Login</a> 
				        	<a href="javascript:regShow();">Register</a> 
				        <?php }?>
				        <a href="">Account Setting -Not Yet Implemented-</a>
				      </div>
				      <div>
				        <span>Sites</span>
				        <a href="sites.php">Add Site-</a>
				        <a href="">List of current sites here -Not Yet Implemented-</a>
				       
				      </div>
				      <div>
				        <span>Ranking</span>
				        <a href="Keywords.php">Enter New Key Word</a>
				        <a href="">Modify Key Words -Not Yet Implemented-</a>
				        <a href="">Other -Not Yet Implemented-</a>
				      </div>
				    <div>
				        <span>About</span>
				        <a href="?foo=bar">-Not Yet Implemented-</a>
				    </div>
				</div>

				
				<div class="content">
					<div class="info">
						<?php
							include 'rss.php';
					 		loadRSS($_SESSION['u_id']);
					 	?>
					 </div>
				</div>
				
			<!--<a href="index.html" class="b1 button">Home</a>
			<a href="About.html" class="b1 button">About</a>
			<a href="Ministries.html" class="b1 button">Ministries</a>
			<a href="Contact.html" class="b1 button">Contact</a>
			-->
	  	
		</body>
	</html>
</div>