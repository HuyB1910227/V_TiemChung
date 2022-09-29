<?php 
namespace TC\OBS;

use LDAP\Result;
use PDO;

class KhachHang{
    private PDO $db;
    private $id = -1;
    public $hoten, $sdt, $ngaysinh, $gioitinh;
    public $cmnd;
    public $diachi;
    public $phuong;
    public $quan;
    public $tinh;
    public $trangthai;
    public $solantiem;
    public $baohiem, $baohiembd, $baohiemkt, $dantoc, $tongiao, $nghenghiep;
    
    public function layId(){
        return $this->id;
    }
    
    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }
    //fill data
    protected function fillFromDB(array $row){
		[
			'kh_id' => $this->id,
			'kh_hoten' => $this->hoten,
            'kh_cmnd' => $this->cmnd,
            //'kh_sodienthoai' => $this->sdt,
            'kh_ngaysinh' => $this->ngaysinh,
            'kh_gioitinh' => $this->gioitinh,
			'kh_diachi' => $this->diachi,
			'kh_phuong' => $this->phuong,
			'kh_quan' => $this->quan,
            'kh_tinh' => $this->tinh,
            'kh_cmnd' => $this->solantiem,
			//
            'kh_thebaohiem' => $this->baohiem,
            'kh_thebaohiembd' => $this->baohiembd,
            'kh_thebaohiemkt' => $this->baohiemkt,
            'kh_dantoc' => $this->dantoc,
            'kh_tongiao' => $this->tongiao,
            'kh_nghenghiep' => $this->nghenghiep
		] = $row;
	    return $this;
	}
    //get data
    public function all(){
		$ArrayKhachHang = [];
		$stmt = $this->db->prepare('select * from khach_hang');
		$stmt->execute();
		while ($row = $stmt->fetch()) {
            $khachhang = new KhachHang($this->db);
            $khachhang->fillFromDB($row);
            $ArrayKhachHang[] = $khachhang;
		}
		return $ArrayKhachHang;
	}
    //fill data
    // public function fill(array $data)

	// {
	// 	if (isset($data['txtTenCoSo'])) {
	// 		$this->ten = $data['txtTenCoSo'];
	// 	}

	// 	if (isset($data['txtTinh'])) {
	// 		$this->tinh = $data['txtTinh'];
	// 	}

    //     if (isset($data['txtQuan'])) {
	// 		$this->quan = $data['txtQuan'];
	// 	}
    //     if (isset($data['txtPhuong'])) {
	// 		$this->phuong = $data['txtPhuong'];
	// 	}
    //     if (isset($data['txtDiaChi'])) {
	// 		$this->diachi = $data['txtDiaChi'];
	// 	}
    //     if (isset($data['slTrangThai'])) {
	// 		$this->trangthai = preg_replace('/[^0-2]+/', '', $data['slTrangThai']);;
	// 	}
		
	// 	return $this;
	// }
    //create and edit record to table
    public function save(){
        $result = false;
        if ($this->id >=0){
            $sql = $this->db->prepare('update khach_hanh
            set kh_hoten = :ten,kh_cmnd = :cmnd, kh_sodienthoai = :sdt, kh_ngaysinh =:ngaysinh, kh_goitinh = :gioitinh, kh_tinh = :tinh, kh_quan = :quan, kh_phuong = :phuong, kh_diachi = :diachi, kh_solantiem = :solantiem
            where kh_id = :id');
            $result = $sql->execute([
                'ten' => $this->hoten,
                'cmnd' => $this->cmnd,
                //'sdt' => $this->sdt,
                'ngaysinh' => $this->ngaysinh,
                'gioitinh' => $this->gioitinh,
                'solantiem' => $this->solantiem,
                'tinh' => $this->tinh,
                'quan' => $this->quan,
                'phuong' => $this->phuong,
                'diachi' => $this->diachi,
                'id' => $this->id
                //
            ]);
        } else {
            $sql = $this->db->prepare('insert into khach_hang
            (kh_hoten, kh_cmnd, kh_sodienthoai, kh_ngaysinh, kh_goitinh, kh_tinh,kh_quan, kh_phuong, kh_diachi, kh_solantiem)
			values (:ten,:cmnd, :sdt, :ngaysinh,:gioitinh,:tinh,:quan, :phuong,:diachi, :solantiem)');
            $result = $sql->execute([
                'ten' => $this->hoten,
                'cmnd' => $this->cmnd,
                //'sdt' => $this->sdt,
                'ngaysinh' => $this->ngaysinh,
                'gioitinh' => $this->gioitinh,
                'solantiem' => $this->solantiem,
                'tinh' => $this->tinh,
                'quan' => $this->quan,
                'phuong' => $this->phuong,
                'diachi' => $this->diachi
                //
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
		$sql = $this->db->prepare('select * from khach_hang where kh_id = :id');
		$sql->execute(['id' => $id]);
		if ($row = $sql->fetch()) {
			$this->fillFromDB($row);
			return $this;
		}
		return null;
	}

    public function delete()
	{
		$sql = $this->db->prepare('delete from khach_hang where kh_id = :id');
		return $sql->execute(['id' => $this->id]);
	}

}
?>