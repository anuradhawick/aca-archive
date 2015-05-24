<?php
	/**
	* This class communicate with the DB to render the subjects page
	* ouput JSON array of total and objects each of : subname,subID,description
	*/
	class subjectpage
	{
		private $pg,$count,$semID;
		public function __construct($pg,  $count, $semID)
		{		
			$this->pg = $pg;
			$this->count = $count;
			$this->semID = $semID;
		}

		function getPage(){
			require_once './condata.php';
			$dbc = mysqli_connect($host, $username, $password, $database) or die("CON ERROR");
			$query = "SELECT * FROM ".$database.".subject WHERE semester_idsemester = ".$this->semID;
			$result = mysqli_query($dbc, $query) or die("QUE ERROR");
			$total = mysqli_num_rows($result);
			$query = "SELECT * FROM ".$database.".subject WHERE semester_idsemester = ".$this->semID." LIMIT ".$this->pg*$this->count.",".$this->count."";
			$result = mysqli_query($dbc, $query) or die("QUE ERROR");
			$subjects = array();
			$i = 0;
			while ($row = mysqli_fetch_array($result)) {
				$subject = array();
				$subject["subname"] = $row["subname"];
				$subject["subID"] = $row["idsubject"];
				$subject["description"] = $row["description"];
				$subject["total"] = $total;
				$subjects[$i] = $subject;
				$i ++;
			}
			mysqli_close($dbc);
			return json_encode($subjects);
		}
	}
?>