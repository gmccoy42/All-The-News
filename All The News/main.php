<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>All The News</title>
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
					<form name="Login" action="" method="post">
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

				<div class="header">All The News 2</div>
				<div class="barRight"></div>
				
				
				<div style="float: left" id="my_menu" class="sdmenu">
				    <div>
				      <span>Account</span>
				        <a href="javascript:login('show');">Login</a>
				        <a href="http://tools.dynamicdrive.com/favicon/">FavIcon Generator</a>
				        <a href="http://www.dynamicdrive.com/emailriddler/">Email Riddler</a>
				        <a href="http://tools.dynamicdrive.com/password/">htaccess Password</a>
				        <a href="http://tools.dynamicdrive.com/gradient/">Gradient Image</a>
				        <a href="http://tools.dynamicdrive.com/button/">Button Maker</a>
				      </div>
				      <div>
				        <span>Sites</span>
				        <a href="http://www.dynamicdrive.com/recommendit/">Recommend Us</a>
				        <a href="http://www.dynamicdrive.com/link.htm">Link to Us</a>
				        <a href="http://www.dynamicdrive.com/resources/">Web Resources</a>
				      </div>
				      <div class="collapsed">
				        <span>Ranking</span>
				        <a href="http://www.javascriptkit.com">JavaScript Kit</a>
				        <a href="http://www.cssdrive.com">CSS Drive</a>
				        <a href="http://www.codingforums.com">CodingForums</a>
				        <a href="http://www.dynamicdrive.com/style/">CSS Examples</a>
				      </div>
				    <div>
				        <span>About</span>
				        <a href="?foo=bar">Current or not</a>
				        <a href="./">Current or not</a>
				        <a href="index.html">Current or not</a>
				        <a href="index.html?query">Current or not</a>
				    </div>
				</div>

				
				<div class="content">
					<div class="info">
						<?php
							include 'rss.php';
					 		loadRSS();
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