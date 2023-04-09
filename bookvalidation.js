function validateForm()
		{
			var name = document.forms['bookForm']['bname'].value;
			if (bname=="") 
			{
				alert("Please enter Book name.");
				return false;
			}

			var category = document.forms['bookForm']['category'].value;
			if (category=="") 
			{
				alert("Please enter category.");
				return false;
			}

			var phone = document.forms['bookForm']['price'].value;
			if (price=="") 
			{
				alert("Please enter price.");
				return false;
			}

			var bookdetails = document.forms['bookForm']['bookdetails'].value;
			if (bookdetails=="") 
			{
				alert("Please enter your book details.");
				return false;
			}

			
		}