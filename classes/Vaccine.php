<?php 
namespace TC\OBS;


use PDO;
use TC\OBS\LoaiVaccine;

class Vaccine{
    private PDO $db;
    private $id = -1;
    public $ten;
    public $hieuluc;
    public $lvc_id;
    public function layID(){
        return $this->id;
    }
    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }
    
    protected function fillFromDB(array $row){

		[
			'v_id' => $this->id,
			'v_ten' => $this->ten,
			'v_hieuluc' => $this->hieuluc,
			'lvc_id' => $this->lvc_id
		] = $row;
	    return $this;
	}
    public function all(){
		$arrayV = [];
		$stmt = $this->db->prepare('select * from vaccine');
		$stmt->execute();
		while ($row = $stmt->fetch()) {
            $v= new Vaccine($this->db);
            $v->fillFromDB($row);
            $arrayV[] = $v;
		}
		return $arrayV;
	}
    public function findVaccineType(){
        $lvc = new LoaiVaccine($this->db);
        $l = $lvc->find($this->lvc_id);
        return $l;
    }
    
    public function save(){
        $result = false;
        if ($this->id >=0){
            $sql = $this->db->prepare('update vaccine 
            set v_ten= :ten, v_hieuluc = :hieuluc, lvc_id =:lvcid
            where v_id = :id');
            $result = $sql->execute([
                'ten' => $this->ten,
                'hieuluc' => $this->hieuluc,
                'lvcid' => $this->lvc_id,
                'id' => $this->id
            ]);
        } else {
            $sql = $this->db->prepare('insert into vaccine
            (v_ten, v_hieuluc, lvc_id)
			values (:ten, :hieuluc, :lvcid)');
            $result = $sql->execute([
                'ten' => $this->ten,
                'hieuluc' => $this->hieuluc,
                'lvcid' => $this->lvc_id,
            ]);
            if($result){
                $this->id = $this->db->lastInsertId();
            }
        }
        return $result;
    }
    
    public function fill(array $data)

	{
		if (isset($data['txtTenVaccine'])) {
			$this->ten = $data['txtTenVaccine'];
		}

		if (isset($data['txtHieuLuc'])) {
			$this->hieuluc = $data['txtHieuLuc'];
		}

        if (isset($data['slLoaiVaccine'])) {
			$this->lvc_id = $data['slLoaiVaccine'];
		}
        
       
		return $this;
	}

    public function find($id)
	{
		$sql = $this->db->prepare('select * from vaccine where v_id = :id');
		$sql->execute(['id' => $id]);
		if ($row = $sql->fetch()) {
			$this->fillFromDB($row);
			return $this;
		}
		return null;
	}
    public function delete()
	{
		$sql = $this->db->prepare('delete from vaccine where v_id = :id');
		return $sql->execute(['id' => $this->id]);
	}
}
?>