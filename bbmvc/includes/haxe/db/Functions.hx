class Test {
	static function main() {
		trace("Haxe is great!");
	}
}

class Database{}
typedef Query = String;
typedef ConstructibleType = String;

class Functions {
  private var db : Database;
	public function new(db : Database) {
		this.db = db;
  }

  public function row(query : Query) {

  }
  
  public function result(query : Query) {

  }
  
  public function column(query : Query, field : String) {

  }
  
  public function value(query : Query, field : String) {

  }
  
  public function rowObject(query : Query, type : ConstructibleType) {

  }
  
  public function resultCallback(query : Query, callback : Array<Dynamic> -> Void) {

  }
  
  public function resultObjects(query : Query, type : ConstructibleType) {

  }

  public function resultAssoc(query : Query, field : String) {

  }
  
  public function columnAssoc(query : Query, keyField : String, selectField : String) {

  }
}
