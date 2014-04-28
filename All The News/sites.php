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
	<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() 
	{
		myMenu = new SDMenu("my_menu");
		myMenu.init();
		myMenu.speed = 5;
		myMenu.oneSmOnly = false;
	};

	function login(showhide)
	{
	  if(showhide == "show")
	  {
	      document.getElementById('popupbox').style.visibility="visible";
	  }
	  else if(showhide == "hide")
	  {
	      document.getElementById('popupbox').style.visibility="hidden"; 
	  }
	}

	function closeFunction()
	{
		login("hide");
	}

	function openFunction()
	{
		login("show");
	}

	function logout()
	{

	}
	// ]]>
	</script>

    <style type="text/css" media="screen">

    html
    {
    	

    }

	body
	{
		/*background-image:url('Religion.jpg');                               Picture instead of just colour              */
		background-repeat:no-repeat;
		background-attachment:absolute;                                       /* Whole Screen */
		background-size:100% 100%;
		background-position:center;
		background-color:#B2B2B2;
		
	}

	#popupbox
  	{
		margin: 0; 
		margin-left: 40%; 
		margin-right: 40%;
		margin-top: 50px; 
	    padding-top: 10px; 
		width: 20%; 
		height: 150px; 
		position: absolute; 
		background: #FBFBF0; 
		border: solid #000000 2px; 
		z-index: 9; 
		font-family: arial; 
		visibility: hidden; 
  	}

	.content
	{
	  /* margin-left: 200px;	 */
	                                                                   /* Center's it */
	   position: relative;

	   left: 175px;
	   width:90%;                                                        /* smaller content section*/
	   background-color:white;
	   height: 100%;
	   min-width: 500px;
	   padding-left: 10px;

	   z-index: -1;
    }

    .info
	{
	  /* margin-left: 200px;	 */
	                                                                   /* Center's it */
	   position: absolute;

	   left: 50px;
	   width:90%;                                                        /* smaller content section*/
	   height: 100%;
	   min-width: 500px;
	   padding-left: 10px;
	   background-color:white;

	   z-index: 10;
    }

     .barLeft
	{
		
		position: absolute;
		left: 0px;
		top: 0px;
		bottom: 0px;
		width: 150px;
		
		height: 100%;
		min-width: 150px;
		background-color: red; 

		z-index: 10;
	}

    .barRight
	{
		margin-left: 96%;
		float: right;
		position: absolute;
		width: 4%;
		height: 100%;
		min-width: 10px;
		/*background-color:red;*/
	}

/*******************************************************************************************************************************
Header
********************************************************************************************************************************/
.header
 {
	 margin: 0 auto;                         /* Centers header image*/
	 display:block;                           /* needed in order to modify maragins for image.*/
	 height:75px;
	 width:100%;
	 z-index:-1;                                  /* moves behind other things */
}
/************************************************************************************************************************************************************************************************
Paragraph
**************************************************************************************************************************************************************************************************/

    .paragraph
    {
    	margin: 0 auto;														/* Center's it */
	    width:400px;                                                        /* smaller content section*/
	    background-color:white;
	    position: relative;
	    height: 740px;
	    top: -200px;
	    left: 0px;
	    padding-right: 0px;
	   z-index: 1;
    }

	.p1
	{
		font-size: 25px;
		text-decoration: underline;
		text-align: center;
		padding-right: 60px;
	}
	 html, body
	 {
	 	margin: 0;
	 	padding 0;
     }

}
    </style>
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

				<div class="header">All The News</div>
				<div class="barRight"></div>
				
				
				<div style="float: left" id="my_menu" class="sdmenu">
				    <div>
				      	<?php if(isset($_SESSION['login'])) {?>
				      	<span><?php echo $_SESSION['user'] ?></span>
				        	<a href="javascript:logout();">Logout</a>
				        <?php } else { ?>
				        <span>Account</span> 
				        	<a href="javascript:login('show');">Login</a> 
				        <?php }?>
				        <a href="">Account Setting -Not Yet Implemented-</a>
				      </div>
				      <div>
				        <span>Sites</span>
				        <a href="sites.php">Add Site-</a>
				        <a href="">List of current sites here -Not Yet Implemented-</a>
				       
				      </div>
				      <div class="collapsed">
				        <span>Ranking</span>
				        <a href="">Enter New Key Word -Not Yet Implemented-</a>
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

						  	while($row = mysqli_fetch_array($result)) 
						  	{

						  		$url = $row['url'];
						  		echo '<p>'.$url.'</p>';
						  	}
	
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