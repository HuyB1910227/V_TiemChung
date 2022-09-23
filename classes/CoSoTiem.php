<?php 
namespace CT275\Labs;

use LDAP\Result;
use PDO;

class CoSoTiem{
    private PDO $db;
    private $id = -1;
    public $ten;
    public $diachi;
    public $phuong;
    public $quan;
    public $tinh;
    public $trangthai;
    
    public function layId(){
        return $this->id;
    }
    
    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }
    //fill data
    protected function fillFromDB(array $row){
		[
			'cs_id' => $this->id,
			'cs_ten' => $this->ten,
			'cs_diachi' => $this->diachi,
			'cs_phuong' => $this->phuong,
			'cs_quan' => $this->quan,
            'cs_tinh' => $this->tinh,
			'cs_trangthai' => $this->trangthai
		] = $row;
	    return $this;
	}
    //get data
    public function all(){
		$ArrayCoSoTiem = [];
		$stmt = $this->db->prepare('select * from co_so_tiem_chung');
		$stmt->execute();
		while ($row = $stmt->fetch()) {
            $CoSo = new CoSoTiem($this->db);
            $CoSo->fillFromDB($row);
            $ArrayCoSoTiem[] = $CoSo;
		}
		return $ArrayCoSoTiem;
	}
    //fill data
    public function fill(array $data)

	{
		if (isset($data['txtTenCoSo'])) {
			$this->ten = $data['txtTenCoSo'];
		}

		if (isset($data['txtTinh'])) {
			$this->tinh = $data['txtTinh'];
		}

        if (isset($data['txtQuan'])) {
			$this->quan = $data['txtQuan'];
		}
        if (isset($data['txtPhuong'])) {
			$this->phuong = $data['txtPhuong'];
		}
        if (isset($data['txtDiaChi'])) {
			$this->diachi = $data['txtDiaChi'];
		}
        if (isset($data['slTrangThai'])) {
			$this->trangthai = preg_replace('/[^0-2]+/', '', $data['slTrangThai']);;
		}
		
		return $this;
	}
    //create and edit record to table
    public function save(){
        $result = false;
        if ($this->id >=0){
            $sql = $this->db->prepare('update co_so_tiem_chung 
            set cs_ten = :ten, cs_tinh = :tinh, cs_quan = :quan, cs_phuong = :phuong, cs_diachi = :diachi, cs_trangthai = :trangthai
            where cs_id = :id');
            $result = $sql->execute([
                'ten' => $this->ten,
                'tinh' => $this->tinh,
                'quan' => $this->quan,
                'phuong' => $this->phuong,
                'diachi' => $this->diachi,
                'trangthai' => $this->trangthai,
                'id' => $this->id
            ]);
        } else {
            $sql = $this->db->prepare('insert into co_so_tiem_chung
            (cs_ten, cs_tinh, cs_quan, cs_phuong, cs_diachi, cs_trangthai)
			values (:ten, :tinh, :quan, :phuong, :diachi, :trangthai)');
            $result = $sql->execute([
                'ten' => $this->ten,
                'tinh' => $this->tinh,
                'quan' => $this->quan,
                'phuong' => $this->phuong,
                'diachi' => $this->diachi,
                'trangthai' => $this->trangthai
            ]);
            if($result){
                $this->id = $this->db->lastInsertId();
            }
        }
        return $result;
    }
    //find object
    public function find($id)
	{
		$sql = $this->db->prepare('select * from co_so_tiem_chung where cs_id = :id');
		$sql->execute(['id' => $id]);
		if ($row = $sql->fetch()) {
			$this->fillFromDB($row);
			return $this;
		}
		return null;
	}

    public function delete()
	{
		$sql = $this->db->prepare('delete from co_so_tiem_chung where cs_id = :id');
		return $sql->execute(['id' => $this->id]);
	}

}
?>