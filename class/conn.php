<?php 

	Class connec{
		private $host = "localhost";
		private $login = "libellec_jun";
		private $password = "L1belle!";
		private $database = "libellec_newsletter";
		private $connec; 
	
		public function __construct()
		{
			$this->connec = mysql_connect($this->host, $this->login, $this->password) or die("error connec host");
			mysql_select_db($this->database) or die ("error select database");
			mysql_query("SET NAMES 'utf8'");
		}
		
		public function __destruct()
		{
			//mysql_close($this->connec);
		}
		
		public function query($query)
		{
			if ($query = mysql_query($query))
				return $query;
			return false;
		}
		
		public function fetch($query)
		{
			$i = 0;
			$tmp = array();
			while ($row = mysql_fetch_array($query))
				$tmp[$i++] = $this->htmlentities_array($row);
			return ($tmp);
		}
		
		public function fetchHtml($query){
			$i = 0;
			$tmp = array();
			while ($row = mysql_fetch_array($query))
				$tmp[$i++] = $row;
			return ($tmp);
		}
		
		public function htmlentities_array($array,$options=ENT_QUOTES, $encode = 'UTF-8') {
			foreach($array as $key => $val){
				if (!is_array($array[$key]))
					$array[$key] = htmlentities($val,$options, $encode);
				else
					$array[$key] = htmlentities_array($array[$key],$options, $encode);
			}
			return $array;
		}
		
		public function escape($string){
			return (mysql_real_escape_string($string));
		}
		
		public function queryExist($query){
			if (mysql_fetch_array($query))
				return true;
			return false;
		}
		
		public function close(){
			mysql_close($this->connec);
		}	
	};
	
?>