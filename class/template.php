<?php
	require_once 'conn.php';
	Class template	{
		private $db;
		public function __construct(){
			$this->db = new connec();
		}		public function __destruct(){
			//mysql_close($this->connec);
		}
		public function getTemplate(){
			$query = "SELECT id, title, layout FROM nl_template";
			$query = $this->db->query($query);
			return ($this->db->fetchHtml($query));
		}
		public function updateTemplate($_id, $_title, $_layout){
			$query = "UPDATE nl_template SET title = '".$this->db->escape($_title)."', layout = '".$this->db->escape($_layout)."' WHERE id = ".$this->db->escape($_id);
			$this->db->query($query);
		}
		public function insertTemplate($_title, $_layout){
			$query = "INSERT INTO nl_template (id, title, layout) VALUES (NULL, '".$this->db->escape($_title)."', '".$this->db->escape($_layout)."')";
			$this->db->query($query);
		}
		public function deleteTemplate($_id){
			$query = "DELETE FROM nl_template WHERE id = ".$this->db->escape($_id);
			$this->db->query($query);
		}
	}
?>