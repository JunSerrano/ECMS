<?php
	require_once 'conn.php';
	
	Class campaign
	{
		private $db;
		
		public function __construct()
		{
			$this->db = new connec();
		}
		
		public function __destruct()
		{
			//mysql_close($this->connec);
		}
		
		public function getCampaign(){
			$query = "SELECT nlc.id as id, nlc.title as title, nlc.templateid as templateid, nlt.title as templatename FROM nl_campaign nlc join nl_template nlt on nlc.templateid = nlt.id ";
			$query = $this->db->query($query);
			return ($this->db->fetchHtml($query));
		}
		
		public function insertCampaign($_title, $_templateid){
			$query = "INSERT INTO nl_campaign (id, title, templateid) VALUES (NULL, '".$this->db->escape($_title)."', ".$this->db->escape($_templateid).")";			
			$this->db->query($query);
		}
		
		public function deleteCampaign($_id){
			$query = "DELETE FROM nl_campaign WHERE id = ".$this->db->escape($_id);
			$this->db->query($query);
		}
		
		public function deleteContent($_id){			
			$query = "DELETE FROM nl_content WHERE campaign_id = ".$this->db->escape($_id);			
			$this->db->query($query);		
		}
		
		public function getTemplateLayout($_id){
			$query = "SELECT layout FROM nl_template WHERE id = ".$this->db->escape($_id);
			$query = $this->db->query($query);
			return ($this->db->fetchHtml($query));
		}
	}
?>