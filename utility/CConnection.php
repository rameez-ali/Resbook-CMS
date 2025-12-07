<?php
	/*
	This class is for connecting to database[MySql] and execute operations.
	
	Author  : Ton Jo Immanuel
	*/
	@include_once(__DIR__ . "/CMessage.php");

	class CConnection {
		public $m_ConnectStat;
  public $m_ServerName 	= "";
		public $m_DatabaseName 	= "";
		public $m_UserName 	= "";
		public $m_Password 	= "";

		public $c_ConnectStat;
		public $c_Message;
		
		public $AutoIncrementId= 0;
		public $AffectedRows=0;

		function __construct() {
			$this->c_Message = new CMessage();
		}

		// Function to set the database server details
		function Configure($ServerName, $DatabaseName, $UserName, $Password) {
			$this->m_ServerName		= $ServerName;
			$this->m_DatabaseName 		= $DatabaseName;
			$this->m_UserName 		= $UserName;
			$this->m_Password 		= $Password;
		}

		// Function to connect to the database server
		// Returns TRUE if connected successfully
		// Otherwise returns FALSE
		function Connect() {
			try {
				$this->m_ConnectStat = mysqli_connect($this->m_ServerName, $this->m_UserName, $this->m_Password);
				
								
				if (!$this->m_ConnectStat) {
        // CONNECTION FAILURE
        $this->c_Message->SetMessage(1);
        return false;
    } elseif (!mysqli_select_db($this->m_ConnectStat, $this->m_DatabaseName)) {
        // DATABASE NOT FOUND
        $this->c_Message->SetMessage(2);
        return false;
    } else {
						$this->c_Message->SetMessage(3);
						// DATABASE CONNECTED
						return true;
					}
			}	catch (Exception) {
				return false;
			}
		}
		
		// Close existing connection
		function Close() {
			try {
				if($this->m_ConnectStat) {
					mysqli_close($this->m_ConnectStat);
				}
			}	catch(Exception) {}
		}
		
		// Excuting query
		function ExecuteQuery($query) {
			try {
				$result = mysqli_query($this->m_ConnectStat, $query);
				$this->AutoIncrementId = mysqli_insert_id($this->m_ConnectStat);
				$this->AffectedRows = mysqli_affected_rows($this->m_ConnectStat);
				$query  = "";
				
				// checking the result of the execution
				if( !$result ) {
					// DB QUERY ERROR
					$this->c_Message->SetMessage(4);
					return false;
				}	else {
					// DB QUERY EXECUTED
					$this->c_Message->SetMessage(5);
					return true;
				}
			}	catch (Exception) {
				return false;
			}
		}
		
		// Executing SELECT query and returns recordset if executed successfully else returns FALSE
		function GetRecordSet($query) {
			try {
				($ResultSet = mysqli_query($this->m_ConnectStat, $query)) || die(mysqli_error($this->m_ConnectStat));
				// checking the result of the execution
				if( mysqli_errno($this->m_ConnectStat) !== 0 ) {
					// DB QUERY ERROR
					$this->c_Message->SetMessage(4);
					return false;
				}	else {
					// DB QUERY EXECUTED
					$this->c_Message->SetMessage(5);
					return $ResultSet;
				}
			}	catch (Exception)  {
				return false;
			}
		}
		
		// Executing and returning first cell result
		function ExecuteScalar($query) {
			try {
				$result = $this->GetRecordSet($query);
										
				while($recordSetRow = mysqli_fetch_array($result)) {
					// DB QUERY EXECUTED
					$this->c_Message->SetMessage(5);
					return $recordSetRow[0];
				}
			}	catch (Exception)  {
				// DB QUERY ERROR
				$this->c_Message->SetMessage(4);
				return false;
			}
		}
		
		// Begin a new transaction on server
		function BeginTransaction() {
			mysqli_query($this->m_ConnectStat, "BEGIN");
			$this->c_Message->SetMessage(6);
		}
		
		// Commit a transaction
		function CommitTransaction() {
			mysqli_query($this->m_ConnectStat, "COMMIT");
			$this->c_Message->SetMessage(7);
		}
		
		// Roll back a trasaction
		function RollbackTransaction() {
			mysqli_query($this->m_ConnectStat, "ROLLBACK");
			$this->c_Message->SetMessage(7);
		}
		
		// This will execute a series of queries and will perform COMMIT and ROLLBACK automatically
		function ExecuteTransaction( $queryList ) {
			try {
				$queryListCount = is_countable($queryList) ? count($queryList) : 0;
    for($i=0; $i<=(is_countable($queryList) ? $queryListCount : 0); $i++) {
					if( $i == 0 ) {
						// DB TRANS BEGIN
						$this->BeginTransaction();
					}
					if(!ExecuteQuery($queryList[$i]) ) {
						// DB TRANS ROLLBACK
						$this->RollbackTransaction();
						return false;
					}
				}
				// DB TRANS COMMIT
				$this->CommitTransaction();
				return true;
			}	catch (Exception)  {
				// DB TRANS ROLLBACK
				$this->RollbackTransaction();
				return false;
			}
		}
		
		//Get the Identity ID(AUTO_INCREMENT ID)
		function GetAutoIncrementId(){
			// Returns the value generated for an AUTO_INCREMENT column by the previous INSERT
			return mysqli_insert_id();
		}
		
		// Return current message of the class
		function GetMessage() {
			return $this->c_Message;
		}
	}
?>