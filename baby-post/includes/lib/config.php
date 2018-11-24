<?php
if(!defined('debug'))
	die("Direct calling of any script is strictly prohabited.");
class config{
	/**
	 *	@author:	Farhan Islam <farhan@orvisoft.com>
	 *	@script:	Magento1 interconnection for inventory update.
	 **/
	protected $dbData;
	function __construct(){
		return; 
	}
	
	function getMageRoot(){
		return MAGENTO_DIR;
	}
	
	function setDb($key = 'custom', $data = array()){
		$this->dbData[$key] = $data;
		return $this;
	}

	function getDatabaseConfiguration($req = false, $name='magento'){
		if(!count($this->dbData)):
			$filePath = $this->getMageRoot().'/app/etc/local.xml';
			if (!file_exists($filePath)) {
				return false;
			}
			$xml = simplexml_load_file($filePath, 'SimpleXMLElement', LIBXML_NOCDATA);
			$data[$name] = array(
						'user' 	=> 	(string)$xml->global->resources->default_setup->connection->username,
						'pass' 	=> 	(string)$xml->global->resources->default_setup->connection->password,
						'host'	=> 	(string)$xml->global->resources->default_setup->connection->host,
						'db'	=>	(string)$xml->global->resources->default_setup->connection->dbname,
						'prefix' => (string)$xml->global->resources->db->table_prefix
						);
			$this->dbData = $data;
		else:
			$data = $this->dbData;
		endif;
		if($req === false){
			$this->dbData = $data;
			return $this->dbData[$name];
		}
		return $data[$name][$req];
	}
	
	
}