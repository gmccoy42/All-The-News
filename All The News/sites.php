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

<script type="text/javascript" src="ATN.js">
</script>

<link rel="stylesheet" type="text/css" href="ATN.css" />

</head>

		<body>
				 
				<div id="popupbox"> 
					<form name="Login" action="login.php" method="post">
						<center>Username:</center>
						<center><input name="username" size="14" /></center>
						<center>Password:</center>
						<center><input name="password" type="password" size="14" /></center>
						<br />
						<center>
							<input type="submit" name="submit" value="login" />
							<button onclick="closeFunction()">Cancel</button>
						</center>
					</form>
				</div> 

				<div id="popupbox"> 
					<form name="reg" action="Register.php" method="post">
						<center>Username:</center>
						<center><input name="username" size="14" /></center>
						<center>Password:</center>
						<center><input name="password" type="password" size="14" /></center>
						<center>Confirm Password:</center>
						<center><input name="passwordC" type="password" size="14" /></center>
						<br />
						<center>
							<button onclick="passCheck()">Register</button>
							<button onclick="closeFunction()">Cancel</button>
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
				        <a href="account.php">Account Setting</a>
				      </div>
				      <div>
				        <span>Sites</span>
				        <a href="sites.php">Add Site-</a>
				        <a href="">List of current sites here -Not Yet Implemented-</a>
				       
				      </div>
				      <div class="collapsed">
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
						
					 </div>
				</div>

				
				<div class="content">
					<div class="info">
						<p>Add Site</p>
						<form name="newSite" action="siteUpdate.php" method="post">
							<input type='text' name='site'/>
							<input type="submit" name="submit" value="enter" />
						</form>
						<br>

						<p>Current Sites</p>

						<?php 
							$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");

							if (!$link) 
							{
						    	echo "Oh no!";
							}
						  		
						  	$result = mysqli_query($link,"SELECT * FROM site WHERE u_id='" . $_SESSION['u_id'] . "';"); 

						  	echo "<form name='SiteForm' action='siteUpdate.php' method='post'>";
						  	echo "<table>";
						  	while($row = mysqli_fetch_array($result)) 
						  	{
						  		echo "<tr>";
						  		$url = $row['url'];
						  		echo '<td>'.$url.'</td>';
						  		$url = str_replace('/', '', $url);
								$url = str_replace('.', '', $url);
								$url = str_replace(':', '', $url);
								$url = str_replace('\\', '', $url);
						  		echo "<td>&nbsp<input type='checkbox' name='". $url ."'/></td>";
						  		//echo "<td>&nbsp<input type='checkbox' name='soylent'/></td>";
						  		echo "</tr>";
						  	}


						  	echo "</table>";
						  	echo "<br>";
						  	echo "<input type='submit' name='site_edit' value='Edit Selected' />";
						  	echo "<input type='submit' name='site_delete' value='Delete Selected' />";
						  	echo "</form>";
						  	

						  	
	
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