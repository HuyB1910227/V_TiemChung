<?php 
namespace TC\OBS;


use PDO;

class LichSuTiem{
    private PDO $db;
    private $id = -1;
    public $ttsautiem;
    
    public $tc_id;
    public $kh_id;
    
    
    
    public function getID(){
        return $this->id;
    }
    
    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }
    
    protected function fillFromDB(array $row){
		[
			'lst_id' => $this->id,
			'lst_trangthaisautiem' => $this->ttsautiem,
			
			'tc_id' => $this->tc_id,
			'kh_id' => $this->kh_id,
            
			
		] = $row;
	    return $this;
	}
    
    public function all(){
		$ArrayT = [];
		$stmt = $this->db->prepare('select * from lich_su_tiem');
		$stmt->execute();
		while ($row = $stmt->fetch()) {
            $tt = new LichSuTiem($this->db);
            $tt->fillFromDB($row);
            $ArrayT[] = $tt;
		}
		return $ArrayT;
	}
    
    public function fill(array $data, $idTC) {
		if (isset($data['idKH'])) {
			$this->kh_id = $data['idKH'];
		}
        if (isset($data['txtTrangThaiSauTiem'])) {
			$this->ttsautiem = $data['txtTrangThaiSauTiem'];
		}
        if (isset($idTC)) {
			$this->tc_id = $idTC;
		}
        
		return $this;
	}
  
    public function save() {
        $result = false;
            $sql = $this->db->prepare('insert into lich_su_tiem
            (lst_trangthaisautiem, tc_id, kh_id)
			values (:ttst, :tc_id, :kh_id )');
            $result = $sql->execute([
                'ttst' => $this->ttsautiem,
                'tc_id' => $this->tc_id,
                'kh_id' => $this->kh_id
                
            ]);
            if($result){
                $this->id = $this->db->lastInsertId();
            }
        
        return $result;
    }
    
    public function find($id) {
		$sql = $this->db->prepare('select * from lich_su_tiem where lst_id = :id');
		$sql->execute(['id' => $id]);
		if ($row = $sql->fetch()) {
			$this->fillFromDB($row);
			return $this;
		}
		return null;
	}

    public function delete() {
		$sql = $this->db->prepare('delete from lich_su_tiem where lst_id = :id');
		return $sql->execute(['id' => $this->id]);
	}

}
?>