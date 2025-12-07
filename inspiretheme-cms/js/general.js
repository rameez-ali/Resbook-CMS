/***************************************************************************************/
// General functions
/***************************************************************************************/

/////////////////////////////////////////////////////////////////////////////////////////
// Checks whether a date entered is a valid date or not.
/////////////////////////////////////////////////////////////////////////////////////////
function CheckDate(ddVal, mmVal, yyVal) {
	 if(ddVal <= 0 || ddVal > 31 || mmVal <= 0 || mmVal > 12 || yyVal <= 0 || yyVal.length != 4) {
		  alert("Please enter a valid date");
		  return false;
	 }
	 monthArray = new Array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	 if(mmVal == 2) {
		  if(yyVal % 4 == 0) {
			   if(ddVal > 29) {
					alert("February " + yyVal + " has only 29 days");
					return false;
			   }
		  }
		  else {
			   if(ddVal > 28) {
					alert("February " + yyVal + " has only 28 days");
					return false;
			   }
		  }
	 }
	 else {
		  if(mmVal == 4 || mmVal == 6 || mmVal == 9 || mmVal == 11) {
			   if(ddVal > 30) {
					alert(monthArray[mmVal-1] + " has only 30 days");
					return false;
			   }
		  }
	 }
	 return true;
}

/////////////////////////////////////////////////////////////////////////////////////////
// Checks whether a string is a valid email address.
/////////////////////////////////////////////////////////////////////////////////////////
function CheckEmail(emailString) {
	 splitVal = emailString.split('@');
	
	 if(splitVal.length <= 1) {
		  //alert("Please enter a valid email address");
		  return false;
	 }
	 if(splitVal[0].length <= 0 || splitVal[1].length <= 0) {
		  //alert("Please enter a valid email address");
		  return false;
	 }
	
	 splitDomain = splitVal[1].split('.');
	 if(splitDomain.length <= 1) {
		  //alert("Please enter a valid email address");
		  return false;
	 }
	 if(splitDomain[0].length <= 0 || splitDomain[1].length <= 1) {
		  //alert("Please enter a valid email address");
		  return false;
	 }
	 return true;
}

/////////////////////////////////////////////////////////////////////////////////////////
// Removes the leading and trailing spaces in a strings and returns the trimmed string
/////////////////////////////////////////////////////////////////////////////////////////
function TrimSpaces(stringValue) {
	 // Checks the first occurance of spaces and removes them
	 for(i = 0; i < stringValue.length; i++) {
		  if(stringValue.charAt(i) != " ") {
			   break;
		  }
	 }
	 if(i > 0) {
		  stringValue = stringValue.substring(i);
	 }
	
	 // Checks the last occurance of spaces and removes them
	 strLength = stringValue.length - 1;
	 for(i = strLength; i >= 0; i--) {
		  if(stringValue.charAt(i) != " ") {
			   break;
		  }
	 }
	 if(i < strLength) {
		  stringValue = stringValue.substring(0, i + 1);
	 }
	
	 // Returns the string after removing leading and trailing spaces.
	 return stringValue;
}

/////////////////////////////////////////////////////////////////////////////////////////
// Check whether a string contain permitted characters only
/////////////////////////////////////////////////////////////////////////////////////////
function CheckAllowedChars(strToCheck, allowedChars)
{
	 var acLen     = allowedChars.length;
	 var stcLen     = strToCheck.length;
	 strToCheck     = strToCheck.toLowerCase();
	 var i;
	 var j;
	 var rightCount = 0;
	 for(i = 0; i < acLen; i++)
	 {
		  switch(allowedChars.charAt(i))
		  {
			   case 'A':
					for(j = 0; j< stcLen; j++)
					{
						 rightCount += strToCheck.charAt(j) >= 'a' && strToCheck.charAt(j) <= 'z';
					}
					break;
			   case 'N':
					for(j = 0; j< stcLen; j++)
					{
						 rightCount += strToCheck.charAt(j) >= '0' && strToCheck.charAt(j) <= '9';
					}
					break;
			   default:
					for(j = -1; -1 != (j = strToCheck.indexOf(allowedChars.charAt(i), j + 1)); rightCount++);
					break;
		  }
	 }
	 if(rightCount == stcLen)
	 {
		  return true;
	 }
	 return false;
}

/////////////////////////////////////////////////////////////////////////////////////////
// Checks whether the first date argument is less than the second date argument
// Date arguments should be in the format - dd/mm/yyyy
/////////////////////////////////////////////////////////////////////////////////////////
function CheckDateDifference(lowDate, highDate, comparison) {
	 lowDateSplit = lowDate.split('/');
	 highDateSplit = highDate.split('/');

	 date1 = new Date();
	 date2 = new Date();

	 date1.setDate(lowDateSplit[0]);
	 date1.setMonth(lowDateSplit[1] - 1);
	 date1.setYear(lowDateSplit[2]);

	 date2.setDate(highDateSplit[0]);
	 date2.setMonth(highDateSplit[1] - 1);
	 date2.setYear(highDateSplit[2]);

	 if(comparison == "eq") {
		  if(date1.getTime() == date2.getTime()) {
			   return true;
		  }
		  else {
			   return false;
		  }
	 }
	 else if(comparison == "lt") {
		  if(date1.getTime() < date2.getTime()) {
			   return true;
		  }
		  else {
			   return false;
		  }
	 }
	 else if(comparison == "gt") {
		  if(date1.getTime() > date2.getTime()) {
			   return true;
		  }
		  else {
			   return false;
		  }
	 }
	 else if(comparison == "le") {
		  if(date1.getTime() <= date2.getTime()) {
			   return true;
		  }
		  else {
			   return false;
		  }
	 }
	 else if(comparison == "ge") {
		  if(date1.getTime() >= date2.getTime()) {
			   return true;
		  }
		  else {
			   return false;
		  }
	 }
}

function FormatCheck(dateStr) {
	 dateSplit = dateStr.split("/");
	 if(dateSplit.length != 3) {
		  return false;
	 }
	 if(trimSpaces(dateSplit[0]).length <= 0 || trimSpaces(dateSplit[1]).length <= 0 || trimSpaces(dateSplit[2]).length <= 0) {
		  return false;
	 }
	 return true;
}
function CloseWindow() {
	 parent.window.opener.window.focus();
	 parent.window.close();
}
/////////////////////////////////////////////////////////////////////////////////////////
// Checks whether the file name have specified extensions
/////////////////////////////////////////////////////////////////////////////////////////
function CheckFileExtension(fileName, allowedExtensions) {
	 extensionArray = allowedExtensions.split(",");
	 fileNameArray = fileName.split(".");
	 if(fileNameArray.length != 2) {
		  return false;
	 }
	 extCheck = false;
	 for(extCount = 0; extCount < extensionArray.length; extCount ++) {
		  if(extensionArray[extCount] == fileNameArray[1]) {
			   extCheck = true;
			   break;
		  }
	 }
	 return extCheck;
}



/////////////////////////////////////////////////////////////////////////////////////////
function GetCurrencyVal(value)
{
	 var CurrLength  = value.length;
	 var FilterVal	= '';
	
	 var rightCount = 0;
	 for(i = 0; i < CurrLength; i++)
	 {
		  if(isNaN(value.charAt(i))) {
			   if(value.charAt(i) == '.') FilterVal += value.charAt(i);
		  }	else {
			   FilterVal += value.charAt(i);
		  }
	 }
	 return FilterVal;
}
/////////////////////////////////////////////////////////////////////////////////////////
function GetFineString(value)
{
	 var FilterVal = TrimSpaces(value);
	 FilterVal = value.replace("'", "''");
	
	 return FilterVal;
}

function GetSessionValue(service, params, OnSuccess)
{
	 $.ajaxSetup(
	 {
		  timeout:100000,
		  dataType:"json",
		  error:function(xhr)
		  {
			   if(xhr.status==404)	return null;
		  }
	 }
	 )

	 $.post("services/"+service+".php",params, OnSuccess);
}

/*
	functionality 	= 0 : Just login, no functionality after login into the system.
					= 1 : Send Enquiry
					= 2 : View Contact Details
					= 3 : Make an Offer
					= 4 : Add to Watch List
					= 5 : View OpenHome
                    = 6 : View Watchlist Notes
					= 7 : Save Search (getAlert)
*/
function DoLoginAndProcess(fnty, loginType, param)
{	
	 GetSessionValue('GetSessionValue',
		  'session=LoginId,LoginIP,LoginType',
		  function(Session) {
			   params = param;
			   functionality = fnty;
			   MemberType = loginType;

			   NeedLogin = false;
			   //if(null == Session) Needlogin = true;
			   if( (Session.LoginId==null) || (Session.LoginId=='undefined') || (Session.LoginId=='') ) NeedLogin = true;
			   //if((Session.LoginId==null) == true) NeedLogin = true;

			   if(NeedLogin) {
					tb_show("Login", "pop_login.php?height=200&width=400&fun="+fnty+'&type='+loginType, null);
			   }	else {
					DoProcess(1);
			   }
		  }
		  );
}

function DoProcess(loginStatus)
{
	 if(isNaN(loginStatus))
	 {
		  $("#msgLogin").html("<div>"+loginStatus+"</div>");
		  return;
	 }

	 switch(functionality)
	 {
		  case 0: if(MemberType==1) location.replace('profile-in.php'); else location.replace('profile-agn.php'); break;
		  case 1: tb_show("Send Enquiry", "pop_sendEnquiry.php?height=200&width=400&"+params, null); break;
		  case 2: window.location.reload(); break;
		  case 3: tb_show("Make an Offer", "pop_makeAnOffer.php?height=200&width=400&"+params, null); break;
		  case 4: AddToWatchList(params); break;
		  case 5: tb_show("Open Home", "pop_openhome.php?height=200&width=400&"+params, null); break;
		  case 6: tb_show("Add Notes", "pop_watchlistNote.php?height=200&width=400&"+params, null); break;
		  case 7: tb_show("Save Search", "pop_getAlert.php?height=100&width=400&"+params, null); break;
		  default: break;
	 }
	 return false;
}

function LoadImage(imgLink, frameId)
{	
	 imgLink.replace('&amp;', '&');
	 $("#frameImage_"+frameId).attr('src', imgLink);
}


function WebPageFormat(val)
{
	if( val.indexOf('http://www.') == 0 ) return val;

	// Checking  values without  http://
	if( val.indexOf('http://') == -1 ) val = 'http://' + val;

	// Checking  values without  www. 
	if( val.indexOf('www.') == -1 ) val = val.replace('http://', 'http://www.');

	 return val.toLowerCase();			
}

