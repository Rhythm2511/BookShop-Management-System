		function validateForm()
		{
			var name = document.forms['signupForm']['name'].value;
			if (name=="") 
			{
				alert("Please enter name.");
				return false;
			}

			var email = document.forms['signupForm']['email'].value;
			if (email=="") 
			{
				alert("Please enter email.");
				return false;
			}

			var phone = document.forms['signupForm']['phone'].value;
			if (phone=="") 
			{
				alert("Please enter phone number.");
				return false;
			}

			var gender = document.forms['signupForm']['gender'].value;
			if (gender=="") 
			{
				alert("Please enter your gender.");
				return false;
			}

			var dob = document.forms['signupForm']['dob'].value;
			if (dob=="") 
			{
				alert("Please enter Date of Birth.");
				return false;
			}

			var uname = document.forms['signupForm']['uname'].value;
			if (uname=="") 
			{
				alert("Please enter Username.");
				return false;
			}

			

			var pwd = document.forms['signupForm']['pwd'].value;
			if (pwd=="") 
			{
				alert("Please enter Password.");
				return false;
			}

			var conpwd = document.forms['signupForm']['conpwd'].value;
			if (conpwd=="") 
			{
				alert("Please confirm password.");
				return false;
			}

			

			if(pwd!= conpwd)
			{
				alert("Passwords don't match");
				return false;
			}
		}
		

