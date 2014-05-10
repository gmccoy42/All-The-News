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
	      document.getElementById('regbox').style.visibility="hidden"; 
	  }
	}

	function closeFunction()
	{
		document.getElementById('problem').style.visibility="hidden";
		login("hide");
	}

	function openFunction()
	{
		login("show");
	}

	function logout()
	{
		delete_cookie("login");
		delete_cookie("user");
		delete_cookie("u_id");
		delete_cookie("pass");
		location.reload(); 
	}

	function regShow()
	{
		document.getElementById('regbox').style.visibility="visible";
	}

	function passCheck()
    {
    	var pass1 = document.getElementById('p1').value;
    	var pass2 = document.getElementById('p2').value;

    	if(pass1.localeCompare(pass2) == 0)
    	{
    		document.getElementById('problem').style.visibility="hidden";
    		var form = document.getElementById('reg');

    		form.submit();
    	}
    	else
    	{
    		document.getElementById('problem').style.visibility="visible";
    	}
    	
    }

    function delete_cookie(name) 
    {
    	//Doesn't seem to work
    	document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	}
	// ]]>