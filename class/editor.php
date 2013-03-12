<?php 
	require_once 'conn.php';
	
	Class editor
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
		
		public function getTemplateLayout($_templateid){
			$query = "SELECT layout \n"
				. "FROM nl_template\n"
				. "WHERE id = ".$this->db->escape($_templateid)." ";
			$query = $this->db->query($query);
			return ($this->db->fetchHtml($query));
		}
		
		public function getEditorContent($_campaignid){
			$query = "SELECT content, position_name \n"
				. "FROM nl_content\n"
				. "WHERE campaign_id = ".$this->db->escape($_campaignid)." ";
			$query = $this->db->query($query);
			return ($this->db->fetchHtml($query));
		}
		
		public function updateEditorContent($_content, $_campaignid, $_position){
			$query = "UPDATE nl_content SET content = '".$this->db->escape($_content)."' \n"
				. "WHERE campaign_id = ".$this->db->escape($_campaignid)." AND position_name = '".$this->db->escape($_position)."'";
			$this->db->query($query);
		}
		
		public function insertEditorContent($_content, $_campaignid, $_position){
			$query = "INSERT INTO nl_content (id, content, campaign_id, position_name) \n"
				. "VALUES (NULL, '".$this->db->escape($_content)."', '".$this->db->escape($_campaignid)."', '".$this->db->escape($_position)."')";			
			$this->db->query($query);		
		}

	}
	
	
	//DISABLE
	//database position id 
		// public function getEditorContent($_template_id){
			// $query = "SELECT nlp.title as title, nlc.content as content\n"
				// . "FROM nl_content nlc join nl_position nlp\n"
				// . "ON nlc.position_id = nlp.id\n"
				// . "WHERE nlc.template_id = ".$this->db->escape($_template_id)." LIMIT 0, 30 ";
			// $query = $this->db->query($query);
			// return ($this->db->fetchHtml($query));
		// }
		
		// GENERATE Campaign id when creating new campaign 
		// public function getEditorContent($_template_id, $_campaign_id){
			// $query = "SELECT content, position_name \n"
				// . "FROM nl_content\n"
				// . "WHERE nlc.template_id = ".$this->db->escape($_template_id)." LIMIT 0, 30 ";
			// $query = $this->db->query($query);
			// return ($this->db->fetchHtml($query));
		// }
	
	
	
?>
	