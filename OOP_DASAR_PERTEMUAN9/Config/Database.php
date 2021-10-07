  
<?php

// Class database (koneksi database)
class Database
{

	// Property
	var $host = "mysql5031.site4now.net";
	var $uname = "a7a94c_learn";
	var $pass = "4rUl94n1";
	var $db = "db_a7a94c_learn";
	var $connection;

	// Method koneksi kedalam database
	function Connect()
	{
		$this->connection = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
		return $this->connection;
	}
}