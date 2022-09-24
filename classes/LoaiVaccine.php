<?php 
namespace TC\OBS;

use LDAP\Result;
use PDO;

class LoaiVaccine{
    private PDO $db;
    private $id = -1;
    public $ten;
    public $mota;

    public function layID(){
        return $this->id;
    }
    public function setID($id){
        return $this->id = $id;
    }
    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }
    //fill data
    protected function fillFromDB(array $row){
		[
			'lvc_id' => $this->id,
			'lvc_ten' => $this->ten,
			'lvc_mota' => $this->mota,
			
		] = $row;
	    return $this;
	}
    public function all(){
		$ArrayCoSoTiem = [];
		$stmt = $this->db->prepare('select * from loai_vaccine');
		$stmt->execute();
		while ($row = $stmt->fetch()) {
            $CoSo = new LoaiVaccine($this->db);
            $CoSo->fillFromDB($row);
            $ArrayCoSoTiem[] = $CoSo;
		}
		return $ArrayCoSoTiem;
	}

    public function find($id)
	{
		$sql = $this->db->prepare('select * from loai_vaccine where lvc_id = :id');
		$sql->execute(['id' => $id]);
		if ($row = $sql->fetch()) {
			$this->fillFromDB($row);
			return $this;
		}
		return null;
	}
}
?>