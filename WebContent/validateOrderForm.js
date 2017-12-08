/**
 * 
 */

// The validation function________________________________________________________________-

function validate(orderForm)
{
	var verdict = true;
	var error = "";
	var msg = "";
	var doc = document.orderForm;
	var givenNames = doc.firstName.value;
	var lastName = doc.lastName.value;
	var mobileNumber = doc.phoneNumber.value;
	var email = doc.emailAddress.value;
	var cardHolder = doc.cardHolder.value;
	var cardNumber = doc.cardNumber.value;
	var CVCNumber = doc.CVC.value;
	var expiryDate = doc.expiryDate.value;
	var unitNumber = doc.unitNumber.value;
	var streetName = doc.street.value;
	var city = doc.city.value;
	var postelCode = doc.postalCode.value;
	
	
	//setMinExpiryDate();
	
// _______________Calling method that validate the given names field
	msg = checkGivenNames(givenNames); 
	if(msg != "")
		{
			error += msg;
			verdict = false;
		}

	
	
// ______________Calling method that validate the last name field
	msg = checkLastName(lastName); 
	if(msg != "")
		{
			error += msg;
			verdict = false;
		}
	
//________________Calling method that validate Mobile Phone field
	msg = checkMobileNumber(mobileNumber); 
	if(msg != "")
		{
			error += msg;
			verdict = false;
		}

	
//________________Calling method that validate Email address field
	msg = checkEmail(email); 
	if(msg != "")
		{
			error += msg;
			verdict = false;
		}
	

	
//________________Calling method that validate Card Holder field
	msg = checkCardHolder(cardHolder); 
	if(msg != "")
		{
			error += msg;
			verdict = false;
		}


//________________Calling method that validate Card number field
	msg = checkCardNumber(cardNumber); 
	if(msg != "")
		{
			error += msg;
			verdict = false;
		}
	
	
//________________Calling method that validate CVC number field
	msg = checkCVCNumber(CVCNumber); 
	if(msg != "")
		{
			error += msg;
			verdict = false;
		}

	
//________________Calling method that validate Expiry Date
	msg = checkExpiryDate(expiryDate); 
	if(msg != "")
		{
			error += msg;
			verdict = false;
		}
	

//________________Calling method that validate Unti Number field
	msg = checkUnitNumber(unitNumber); 
	if(msg != "")
		{
			error += msg;
			verdict = false;
		}

	
//________________Calling method that validate Street Name field
	msg = checkStreetName(streetName); 
	if(msg != "")
		{
			error += msg;
			verdict = false;
		}
	
	
	
//________________Calling method that validate City field
	msg = checkCity(city); 
	if(msg != "")
		{
			error += msg;
			verdict = false;
		}
	

//________________Calling method that validate Postel Code
	msg = checkPostelCode(postelCode); 
	if(msg != "")
		{
			error += msg;
			verdict = false;
		}
	
	
// post the error message if there is an error in validation. Verdict == false
	if(!verdict)
		{
		alert(error);
		return verdict;
		}
	else
		{
		return verdict //alert("Order is complete")
		}
	
	
	
}





//Functions to specific inputs_____________________________________________________________


//____________given names
function checkGivenNames(text)
{
	var message = "";
	
	if(!checkIfEmpty(text))
	{
	message += "Given names is empty \n"
	}
	
	
	else if(containOnlyLetters(text))
	{
		message +=  "Given names can only contain letters from [a/A - z/Z]. no symbols or numbers \n"
	}
	
	
	return message;
}


//____________last name
function checkLastName(text)
{
	var message = "";
	
	if(!checkIfEmpty(text))
	{
		message += "Sir name is empty \n"
	}
	
	else if(containOnlyLetters(text))
	{
		message +=  "Sir name can only contain letters from [a/A - z/Z]. no symbols or numbers\n"
	}	
	
	return message;
}


//____________Mobil Number
function checkMobileNumber(text) 
{
	var message = "";
	
	if(text.length != 10)
	{
		message += "Mobile Number must be 10 digits \n"
	}
		
	else if(!checkForNumbers(text))
	{
		message += "Mobile Number can only contain digits \n"
	}
		
	return message;	
}


//____________Email Address
function checkEmail(text)
{
	var message = "";
	temp = text.indexOf("@")
	
	if(!checkIfEmpty(text))
	{
		message += "Email address is empty \n"
	}
	
	else{

	//if didn't find @
		if (temp == -1)
		{
			message += "E-mail is missing @ \n"
		}
	
		//if @ is the first character
		if (temp == 0)
		{
			message += "E-mail not valid. @ must not appear as the first character \n"
		}
	
		//if @ is the last character
		if (temp == (text.length -1))
		{
			message += "E-mail not valid. @ must not appear as the last character \n"
		}	
		}
		
		return message;
}


//____________Card Holder
function checkCardHolder(text) 
{
	var message = "";
	
	if(!checkIfEmpty(text))
	{
		message += "Card Holder field is empty \n"
	}
	
	else if(containOnlyLetters(text))
	{
		message +=  "Card Holder can only contain letters from [a/A - z/Z]. no symbols or numbers\n"
	}	

	return message;	
}


//____________Card Number
function checkCardNumber(text) 
{
	var message = "";
	
	if(text.length != 16)
	{
		message += "Card Number must be 16 digits \n"
	}
		
	if(!checkForNumbers(text))
	{
		message += "Card Number can only contain digits \n"
	}
		
	return message;	
}


//____________CVC Number
function checkCVCNumber(text) 
{
	var message = "";
	
	if(text.length != 3)
	{
		message += "CVC Number must be 3 digits \n"
	}
		
	if(!checkForNumbers(text))
	{
		message += "CVC Number can only contain digits \n"
	}
		
	return message;	
}


//____________Expiry Date 
function checkExpiryDate(text)
{
	var message = "";
	
	if(!checkIfEmpty(text))
	{
		message += "Expiry Date not choosen \n"
	}	
	
	return message;
}



//____________Unit Number 
function checkUnitNumber(text)
{
	var message = "";	
	
	if(!checkIfEmpty(text))
	{
		message += "Unit Number field is empty \n";
	}	
	
	else if(!checkForNumberTrue(text))
	{
		message += "Unit Number must contain at least one digit \n";
	}
	return message;
}


//____________Street Name 
function checkStreetName(text)
{
	var message = "";	
	
	if(!checkIfEmpty(text))
	{
		message += "Street Name field is empty \n";
	}	
	
	else if(containOnlyLetters(text))
	{
		message += "Street Name can only contain letters from [a/A - z/Z]. No symbols or numbers \n";
	}
	return message;
}


//____________City 
function checkCity(text)
{
	var message = "";	
	
	if(!checkIfEmpty(text))
	{
		message += "City Name field is empty \n";
	}	
	
	else if(containOnlyLetters(text))
	{
		message += "City Name can only contain letters from [a/A - z/Z]. No symbols or numbers \n";
	}
	return message;
}



//____________Postel Code
function checkPostelCode(text)
{
	var message = "";	
	
	if(text.length != 4)
	{
		message += "Postel Code must be 4 digits \n";
	}	
	
	if(!checkForNumbers(text))
	{
		message += "Postel Code can only contain digits \n";
	}
	return message;
}






// Helper functions_______________________________________________________________________________________________________


//______________ check if the field is empty
function checkIfEmpty(text)
{
	if(text == "")
		{
				return false;
		}
	else
		{
				return true;
		}
}


//_________________ looks for numbers in the field value.
function checkForNumbers(text)
{
		var digits="0123456789"
		var temp

		for (var i=0;i<text.length;i++){

			temp=text.substring(i,i+1)
		
			if (digits.indexOf(temp)==-1) 

			{
				//if a non-number is found.

				return false;
		
			}
		}
		
		return true;
}


//____________Looks for numbers and symbols. 
function containOnlyLetters(text)
{

    var notAllowedCharacters = /[0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/g;
	return notAllowedCharacters.test(text)
    
}


//____________Look for @ in email address
// Code used from examples given in ressources in week 7
function validateEmail(text)
{
	temp = text.indexOf("@")

	//if didn't find @
	if (temp == -1)
	{
		alert("E-mail is missing @ \n")
		return false
	}

	//if @ is the first character
	if (temp == 0)
	{
		alert("E-mail not valid. @ must not appear as the first character \n")
		return false
	}

	//if @ is the last character
	if (temp == (text.length -1))
	{
		alert("E-mail not valid. @ must not appear as the last character \n")
		return false
	}
   
	return true;
    
}	


//__________________make sure there is numbers
function checkForNumberTrue(text)
{
    return /\d/.test(text);
}









