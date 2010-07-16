<?php


class Database extends mysqli{
	private static $instance;	
	private	static $res;
	private static $res_count; 
	private	static $history;
	
	private function __construct(){
		global $_websites;
						
		parent::mysqli(_DB_HOST, _DB_USER, _DB_PASS, _DB_NAME);
		self::$history		= array();
		self::$res			= array(); //we create an array of resources
		self::$res_count	= 0;				
	}

	/*		
	public function __destruct(){
		foreach (self::$res as $resource){
			$resource[$res]->free_result();
		}
	}
	*/	
	
	public static function getInstance(){
		if (empty(self::$instance)){			
			self::$instance = new Database();
		}
		
		return self::$instance;
	}	
	
	private static function push_resource($res){		
		$res_num = self::$res_count++;		
		
		self::$res[$res_num]	= array("res" => $res, "num_rows" => $res->num_rows);								
						
		return $res_num;
	}
	
	public function query($query){
		array_push(self::$history, $query);
																		
		$res_num = self::push_resource(parent::query($query));
							
		if ($this->errno != 0){		
			throw new Exception("Mysql Error: $this->error<br />Query: $query");
		}
		
		if (strpos($query, " SQL_CALC_FOUND_ROWS ")){
			
			$res_tmp	= $this->query("select FOUND_ROWS() as found_rows");
			$row_tmp	= $this->nextRow($res_tmp); 
			
			self::$res[$res_num]["found_rows"]	= $row_tmp["found_rows"];
						
		}
				
		return $res_num;
	}

	public function real_query($query){
		array_push(self::$history, $query);
									
		parent::real_query($query);
				
		if ($this->errno != 0){
			throw new Exception("Mysql Error: $this->error<br />Real Query: $query");
		}
		
	}
	
	public function store_result(){
		return $this->push_resource(parent::store_result());
	}
	
	public function nextRow($res_num){		
														
		$res	= self::$res[$res_num]["res"];				
				
		$row = $res->fetch_assoc();
		
		if ($row == null){			
			$res->free_result();
			unset(self::$res[$res_num]);			
		}		
		
		return $row;
	}
	
	public function foundRows($res_num){		
		return self::$res[$res_num]["found_rows"];
	}
	
	public function numRows($res_num){
		return self::$res[$res_num]["num_rows"];
	}
	
	public function insert($table, $a_values){
		/*
		 * $a_values is an array looking like this:
		 * 
		 * array(	"firstname"	=> "John",
		 * 			"lastname" 	=> "Doe");
		 * 
		 * So the insert query will be "insert into $table (firstname, lastname) values ('John', 'Doe')" 
		 */
		 
		$fields	= "";
		$values	= "";
		
		foreach($a_values as $field => $value){		
			$fields .= "$field, ";
			$values .= "'" . addslashes($value) . "', "; 		
		} 
	
		$fields = substr($fields, 0, strlen($fields) - 2);
		$values = substr($values, 0, strlen($values) - 2);
	
		$query	= "insert into $table ($fields) values ($values)";
		
		$this->query($query);
											
		return $this->insert_id;
				
	}
	
	public function update($table, $a_values, $where){
		/*
		 * $a_values is an array. Check the "insert" function above for more details.
		 */
		
		$fields	= "";
		
		foreach($a_values as $field => $value){		
			$fields .= "$field='" . addslashes($value) . "', "; 		
		} 
		
		$fields = substr($fields, 0, strlen($fields) - 2);
		
				
		$query	= "update $table set $fields $where";
	
		$this->query($query);	
			
	}
	
	
	public function call($sp, $params){
				
		return $this->$sp($params);
	}
	
	
}

?>