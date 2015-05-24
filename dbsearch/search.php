<?php
	/**
	* This search and return the result as a JASON object
	* Coded by W.A. Anuradha Wickramarachchi
	*/
	class search
	{
		private $pg, $key, $count, $type;
		
		public function __construct($pg, $count, $key, $type = 1)
		{
			$this->pg = $pg;
			$this->count = $count;
			$this->key = $key;
			$this->type = $type;
		}

		function getResult(){
			require_once './condata.php';
			$dbc = mysqli_connect($host, $username, $password, $database) or die("CON ERROR");
			$query = "SELECT * FROM ".$database.".resource ". $this->getQuery($this->key);//." LIMIT ".$this->pg*$this->count.",".$this->count."";
			$result = mysqli_query($dbc, $query) or die("QUE ERROR");
			$resources = array();
			$i = 0;
			$total = mysqli_num_rows($result);
			while ($row = mysqli_fetch_array($result)) {
				$resource = array();
				$resource["topic"] = $row["name"];
				$resource["description"] = $row["description"];
				$resource["link"] = $row["link"];
				$resource["total"] = $total;
				$resources[$i] = $resource;
				$i ++;
			}
			mysqli_close($dbc);
			return json_encode($resources);
		}

		function getQuery($key){
			$key = str_replace("--", "", $key);
			$key = str_replace("#", "", $key);
			$key = str_replace("+", "", $key);
			$key = str_replace("-", " ", $key);
			$arr = explode(" ", $key);
			$finalarr = array();
			$i = 0;
			foreach ($arr as $wd) {
				$wd = trim($wd);
				if($wd != ""){
					$finalarr[$i] = $wd;
					$i ++;
					if($i>2) break;
				}
			}
			if (count($finalarr) == 0) {
				return "";
			}
			elseif(count($finalarr) == 1){
				return "WHERE description LIKE '%".$finalarr[0]."%'";
			}
			else{
				$output = "WHERE";
				for ($i=0; $i < count($finalarr) ; $i++) { 
					$wd = $finalarr[$i];
					if($i == 0){
						$output .= " description LIKE '%".$wd."%'";
					} else {
						$output .= " or description LIKE '%".$wd."%'";
					} 
				}
			}
			return $output;
		}
	}
?>