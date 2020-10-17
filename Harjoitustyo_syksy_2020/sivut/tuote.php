<?php
class tuote{
	//path = ~/public_html/entities/tuote.php
	// Connection instance
	private $connection;
	// table idtuote
	private $table_name = "tuote";
	// table columns
	public $idtuote;
	public $tuotenimi;
	public $valmistaja;
	public $hinta;
	
	public function __construct($connection){
		$this->connection = $connection;
	}
	//C
	public function create(){
		// query to insert record
		$query = "INSERT INTO
		" . $this->table_name . "
		SET
		idtuote=:idtuote, tuotenimi=:tuotenimi, valmistaja=:valmistaja,
		hinta=:hinta";
		// prepare query
		print $query;
		$stmt = $this->connection->prepare($query);
		// sanitize
		$this->idtuote=htmlspecialchars(strip_tags($this->idtuote));
		$this->tuotenimi=htmlspecialchars(strip_tags($this->tuotenimi));
		$this->valmistaja=htmlspecialchars(strip_tags($this->valmistaja));
		$this->hinta=htmlspecialchars(strip_tags($this->hinta));

		// bind values
		$stmt->bindParam(":idtuote", $this->idtuote);
		$stmt->bindParam(":tuotenimi", $this->tuotenimi);
		$stmt->bindParam(":valmistaja", $this->valmistaja);
		$stmt->bindParam(":hinta", $this->hinta);

		// execute query
		if($stmt->execute()){
			return true;
		}
		echo "Ei onnistunut";
		return false;
	}
	//R
	public function read(){
		$query = "SELECT * FROM " . $this->table_name . " p ORDER BY p.valmistaja";
		$stmt = $this->connection->prepare($query);
		$stmt->execute();
		return $stmt;
	}
	//U
	public function update(){}
	//D
	public function delete(){}
}
?>