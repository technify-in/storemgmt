<?php

class Sales {
	
	private $dbh;
	
	public function __construct($host,$user,$pass,$db)	{		
		$this->dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);		
	}

	public function getSales(){				
		$sth = $this->dbh->prepare("SELECT * FROM endtable");
		$sth->execute();
		return json_encode($sth->fetchAll());
	}


}
?>