<?php 
namespace TC\OBS;


use PDO;

class LichSuTiem{
    private PDO $db;
    private $id = -1;
    public $ttsautiem;
    
    public $tc_id;
    public $nd_id;
    
    
    
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
			'nd_id' => $this->nd_id,
            
			
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
			$this->nd_id = $data['idKH'];
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
            (lst_trangthaisautiem, tc_id, nd_id)
			values (:ttst, :tc_id, :nd_id )');
            $result = $sql->execute([
                'ttst' => $this->ttsautiem,
                'tc_id' => $this->tc_id,
                'nd_id' => $this->nd_id
                
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


	public function selectFromUser($khID){
        $arr = [];
        $sql = $this->db->prepare('select * from lich_su_tiem where nd_id = :id');
        $sql->execute(['id' => $khID]);
        while($row=$sql->fetch()){
            $e = new LichSuTiem($this->db);
            $e->fillFromDB($row);
            $arr[] = $e;
        }
        return $arr;
    }

    public function UpdateTTST($str){
        $sql = $this->db->prepare('update lich_su_tiem set lst_trangthaisautiem = :ttst where lst_id = :id');
        return $sql->execute(['ttst' => $str, 'id' => $this->id]);
    }
}
?>