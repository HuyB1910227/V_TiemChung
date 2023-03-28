<?php 
namespace TC\OBS;


use PDO;

class ThongTinTiem{
    private PDO $db;
    private $id = -1;
    public $ngaytiem;
    public $lantiem;
    public $v_id;
    public $cs_id;
    
    public $trangthai;
    
    public function getID(){
        return $this->id;
    }
    
    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }
    
    protected function fillFromDB(array $row){
		[
			'tc_id' => $this->id,
			'tc_ngaytiem' => $this->ngaytiem,
			'tc_lantiem' => $this->lantiem,
			'v_id' => $this->v_id,
			'cs_id' => $this->cs_id,
            
			
		] = $row;
	    return $this;
	}
    
    public function all(){
		$ArrayT = [];
		$stmt = $this->db->prepare('select * from thong_tin_tiem_chung');
		$stmt->execute();
		while ($row = $stmt->fetch()) {
            $tt = new ThongTinTiem($this->db);
            $tt->fillFromDB($row);
            $ArrayT[] = $tt;
		}
		return $ArrayT;
	}
    
    public function fill(array $data) {
		if (isset($data['nbLanTiem'])) {
			$this->lantiem = $data['nbLanTiem'];
		}

        if (isset($data['slVaccineID'])) {
			$this->v_id = $data['slVaccineID'];
		}
        if (isset($data['slCoSoID'])) {
			$this->cs_id = $data['slCoSoID'];
		}
        
		return $this;
	}
  
    public function save() {
        $result = false;
            $sql = $this->db->prepare('insert into thong_tin_tiem_chung
            (tc_ngaytiem, tc_lantiem, v_id, cs_id)
			values (now(), :lantiem, :v_id, :cs_id)');
            $result = $sql->execute([
                'lantiem' => $this->lantiem,
                'v_id' => $this->v_id,
                'cs_id' => $this->cs_id,
                
                
            ]);
            if($result){
                $this->id = $this->db->lastInsertId();
            }
        
        return $result;
    }
    
    public function find($id) {
		$sql = $this->db->prepare('select * from thong_tin_tiem_chung where tc_id = :id');
		$sql->execute(['id' => $id]);
		if ($row = $sql->fetch()) {
			$this->fillFromDB($row);
			return $this;
		}
		return null;
	}

    public function delete() {
		$sql = $this->db->prepare('delete from thong_tin_tiem_chung where tc_id = :id');
		return $sql->execute(['id' => $this->id]);
	}

}
?>