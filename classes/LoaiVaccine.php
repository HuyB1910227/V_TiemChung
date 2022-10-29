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

	public function fill(array $data){
		if(isset($data['txtTenLoaiVaccine'])){
			$this->ten = $data['txtTenLoaiVaccine'];
		}
		if(isset($data['txtMoTa'])){
			$this->mota = $data['txtMoTa'];
		}
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

	public function save(){
        $result = false;
        if ($this->id >=0){
            $sql = $this->db->prepare('update loai_vaccine 
            set lvc_ten = :ten, lvc_mota = :mota
            where lvc_id = :id');
            $result = $sql->execute([
                'ten' => $this->ten,
                'mota' => $this->mota,
                'id' => $this->id
            ]);
        } else {
            $sql = $this->db->prepare('insert into loai_vaccine
            (lvc_ten, lvc_mota)
			values (:ten, :mota)');
            $result = $sql->execute([
                'ten' => $this->ten,
                'mota' => $this->mota,
               
            ]);
            if($result){
                $this->id = $this->db->lastInsertId();
            }
        }
        return $result;
    }


    public function delete()
	{
		$sql = $this->db->prepare('delete from loai_vaccine where lvc_id = :id');
		return $sql->execute(['id' => $this->id]);
	}
}
?>