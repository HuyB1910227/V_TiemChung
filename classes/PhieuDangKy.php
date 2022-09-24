<?php 
namespace TC\OBS;


use PDO;
use TC\OBS\CoSoTiem;
use TC\OBS\LichHenTiem;
use TC\OBS\KhachHang;

class PhieuDangKy{
    private PDO $db;
    
    private $id = -1;
    public $ngaydangky, $trangthai;
    public $kh_id;
    public $lht_id;

    public function getId(){
        return $this->id;
    }
    
    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }
    //fill data
    protected function fillFromDB(array $row){
		[
			'pdk_id' => $this->id,
			'pdk_ngaydangky' => $this->ngaydangky,
            'pdk_trangthai' => $this->trangthai,
            'kh_id' => $this->kh_id,
            'lht_id' => $this->lht_id
		] = $row;
	    return $this;
	}
    //get data
    public function all(){
		$are = [];
		$sql = $this->db->prepare('select * from phieu_dang_ky_tiem');
		$sql->execute();
		while ($row = $sql->fetch()) {
            $e = new PhieuDangKy($this->db);
            $e->fillFromDB($row);
            $are[] = $e;
		}
		return $are;
	}
    //fill data
    // public function fill(array $data)

	// {
	// 	if (isset($data['dtNgayDangKy'])) {
	// 		$this->ngaytiem = $data['dtNgayTiem'];
	// 	}

	// 	if (isset($data['slCoSo'])) {
	// 		$this->tinh = $data['slCoSo'];
	// 	}
	// 	return $this;
	// }
    //create and edit record to table
    // public function save(){
    //     $result = false;
    //     if ($this->id >=0){
    //         $sql = $this->db->prepare('update phieu_dang_ky_tiem 
    //         set lht_ngaytiem =: ngaytiem, cs_id = cs_id
    //         where lht_id = :id');
    //         $result = $sql->execute([
    //             'ngaytiem' => $this->ngaytiem,
    //             'cs_id' => $this->cs_id,
    //             'id' => $this->id
    //         ]);
    //     } else {
    //         $sql = $this->db->prepare('insert into phieu_dang_ky_tiem
    //         (lht_ngaytiem, cs_id)
	// 		values (:ngaytiem, :cs_id)');
    //         $result = $sql->execute([
    //             'ngaytiem' => $this->ngaytiem,
    //             'cs_id' => $this->cs_id,
    //         ]);
    //         if($result){
    //             $this->id = $this->db->lastInsertId();
    //         }
    //     }
    //     return $result;
    // }
    //find object
    public function find($id){
		$sql = $this->db->prepare('select * from phieu_dang_ky_tiem where pdk_id = :id');
		$sql->execute(['id' => $id]);
		if ($row = $sql->fetch()) {
			$this->fillFromDB($row);
			return $this;
		}
		return null;
	}
    public function findVaccinationSchedule(){
        $lichhen = new LichHenTiem($this->db);
        return $lichhen->find($this->lht_id);
    }

    public function findUser(){
        $khachhang = new KhachHang($this->db);
        return $khachhang->find($this->kh_id);
    }

    public function delete(){
		$sql = $this->db->prepare('delete from phieu_dang_ky_tiem where cs_id = :id');
		return $sql->execute(['id' => $this->id]);
	}
}
?>