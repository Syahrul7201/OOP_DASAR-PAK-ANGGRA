  
<?php

// Class database (koneksi database)
class Database
{

	// Property
	var $host = "sql6.freesqldatabase.com";
	var $uname = "sql6437646";
	var $pass = "Y4IsVJ5Edg";
	var $db = "sql6437646";
	var $connection;

	// Method koneksi kedalam database
	function Connect()
	{
		$this->connection = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
		return $this->connection;
	}
}