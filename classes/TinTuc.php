<?php 
namespace TC\OBS;

use LDAP\Result;
use PDO;

class TinTuc{
    private PDO $db;
    private $id = -1;
    public $hinhanh;
    public $noidung, $tieude;

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
			'cn_id' => $this->id,
			'cn_hinhanh' => $this->hinhanh,
			'cn_noidung' => $this->noidung,
			'cn_tieude' => $this->tieude,

			
		] = $row;
	    return $this;
	}

	public function fill(array $data){
		if(isset($data['txtTieuDe'])){
			$this->tieude = $data['txtTieuDe'];
		}
		if(isset($data['txtNoiDung'])){
			$this->noidung = $data['txtNoiDung'];
		}
		return $this;
	}
    public function all(){
		$ArrayCoSoTiem = [];
		$stmt = $this->db->prepare('select * from cam_nang_y_te');
		$stmt->execute();
		while ($row = $stmt->fetch()) {
            $CoSo = new TinTuc($this->db);
            $CoSo->fillFromDB($row);
            $ArrayCoSoTiem[] = $CoSo;
		}
		return $ArrayCoSoTiem;
	}

    public function find($id)
	{
		$sql = $this->db->prepare('select * from cam_nang_y_te where cn_id = :id');
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
            $sql = $this->db->prepare('update cam_nang_y_te 
            set cn_tieude = :td, cn_hinhanh = :ha, cn_noidung = :nd
            where cn_id = :id');
            $result = $sql->execute([
                'td' => $this->tieude,
                'ha' => $this->hinhanh,
                'nd' => $this->noidung,
                'id' => $this->id
            ]);
        } else {
            $sql = $this->db->prepare('insert into cam_nang_y_te
            (cn_tieude, cn_hinhanh, cn_noidung)
			values (:td, :ha, :nd)');
            $result = $sql->execute([
                'td' => $this->tieude,
                'ha' => $this->hinhanh,
                'nd' => $this->noidung
               
            ]);
            if($result){
                $this->id = $this->db->lastInsertId();
            }
        }
        return $result;
    }


    public function delete()
	{
		$sql = $this->db->prepare('delete from cam_nang_y_te where cn_id = :id');
		return $sql->execute(['id' => $this->id]);
	}


    public function fillImage($data){
		if (isset($data)) {
			$this->hinhanh = $data;
		}
		
		return $this;
	}
}
?>