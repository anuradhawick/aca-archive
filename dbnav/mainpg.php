<?php
	/**
	* This class communicate with the DB to render the main page
	* outputs JSON array of total and objects each of : name,semID,description
	*/
	class mainpage
	{
		private $pg,$count;
		public function __construct($pg,  $count)
		{		
			$this->pg = $pg;
			$this->count = $count;
		}

		function getPage(){
			require_once './condata.php';
			$dbc = mysqli_connect($host, $username, $password, $database) or die("CON ERROR");
			$query = "SELECT * FROM ".$database.".semester";
			$result = mysqli_query($dbc, $query) or die("QUE ERROR");
			$total = mysqli_num_rows($result);
			$query = "SELECT * FROM ".$database.".semester LIMIT ".$this->pg*$this->count.",".$this->count."";
			$result = mysqli_query($dbc, $query) or die("QUE ERROR");
			$semesters = array();
			$i = 0;
			while ($row = mysqli_fetch_array($result)) {
				$semester = array();
				$semester["name"] = $row["name"];
				$semester["semID"] = $row["idsemester"];
				$semester["description"] = $row["description"];
				$semester["total"] = $total;
				$semesters[$i] = $semester;
				$i ++;
			}
			mysqli_close($dbc);
			return json_encode($semesters);
		}
	}
?>