<?php
	/**
	* This class communicate with the DB to render the resource page
	* ouput JSON array of total and objects each of : topic,description,link,id
	*/
	class resourcepage
	{
		private $pg,$count,$subID;
		public function __construct($pg,  $count, $subID)
		{		
			$this->pg = $pg;
			$this->count = $count;
			$this->subID = $subID;
		}

		function getPage(){
			require_once './condata.php';
			$dbc = mysqli_connect($host, $username, $password, $database) or die("CON ERROR");
			$query = "SELECT * FROM ".$database.".resource WHERE subject_idsubject = ".$this->subID;
			$result = mysqli_query($dbc, $query) or die("QUE ERROR");
			$total = mysqli_num_rows($result);
			$query = "SELECT * FROM ".$database.".resource WHERE subject_idsubject = ".$this->subID;//." LIMIT ".$this->pg*$this->count.",".$this->count."";
			$result = mysqli_query($dbc, $query) or die("QUE ERROR");
			$resources = array();
			$i = 0;
			while ($row = mysqli_fetch_array($result)) {
				$resource = array();
				$resource["topic"] = $row["name"];
				$resource["description"] = $row["description"];
				$resource["link"] = $row["link"];
				$resource["total"] = $total;
				$resource["id"] = $row["idresource"];
				$resources[$i] = $resource;
				$i ++;
			}
			mysqli_close($dbc);
			return json_encode($resources);
		}
	}
?>