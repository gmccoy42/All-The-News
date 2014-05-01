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
    	var pass1 = document.getElementById('password').value;
    	var pass2 = document.getElementById('passwordC').value;

    	alert(pass1);
    }

    function delete_cookie(name) 
    {
    	document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	}
	// ]]>