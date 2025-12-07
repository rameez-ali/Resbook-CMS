<?php

class CMessage {

	public $msgIndex 	= -1;

	public $msgText = [
     "SUCCESS",
     "CONNECTION FAILURE",
     //(1)	Database connection failure
     "DATABASE NOT FOUND",
     //(2)	Database name not found
     "DATABASE CONNECTED",
     //(3)	Database connected successfully
     "DB QUERY ERROR",
     //(4)	Query execution error
     "DB QUERY EXECUTED",
     //(5)	Query executed successfully
     "DB TRANS BEGIN",
     //(6)	Begin a database transaction
     "DB TRANS ROLLBACK",
     //(7)	Rollback a database transaction
     "DB TRANS COMMIT",
     //(8)	Commit a database transaction
     "INVALID UID PWD",
     //(9)	Invalid user id or password/ Security failure
     "ALREADY LOGGED IN",
     //(10)	A user is already logged into the system
     "NULL ENTRY",
     //(11)	Variable or Field is not set.
     "PERMISSION DENIED",
     //(12)	Permission denied for Authorised operations.
     "UNKNOWN ERROR",
     //(13)	UnKnown error occuring on CATCH block
     "FILE OPEN FAILED",
     //(14)	Can not open file stream
     "FILE CLOSE FAILED",
     //(15)	Can not close opened file stream
     "FILE READ FAILED",
     //(16)	Can not read the file
     "FILE WRITE FAILED",
     //(17)	Can not write the file
     "MAIL SEND FAILED",
     //(18)	Can not send the mail
     "DUPLICATE ENTRY",
 ];

		

	/** Returns message description according to message num. */

	function GetMessage($num) 
	{
		try {
			// returning error

			return $this->msgText[$num];

		}	catch(Exception) {

			return "NOT FOUND";

		}
	}

	/**  Set current message index. */

	function SetMessage($num) 
	{
		try {

			// setting index

			$this->msgIndex = $num;

		}	catch(Exception) {

			$this->msgIndex = -1;

		}
	}	

	/** Returns current message description. */

	function GetCurrentMessage()
	{
		try {

			// returning error

			return $this->msgText[$this->msgIndex];

		}	catch(Exception) {

			return "NOT FOUND";

		}

	}	
}



?>