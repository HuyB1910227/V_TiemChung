<?php 
namespace TC\OBS;

use LDAP\Result;
use PDO;

class KhachHang{
    private PDO $db;
    private $id = -1;
    public $hoten, $ngaysinh, $gioitinh;
    public $cmnd;
    public $diachi;
    public $phuong;
    public $quan;
    public $tinh;
    
    public $solantiem;
    public $baohiem, $baohiembd, $baohiemkt, $dantoc, $tongiao, $nghenghiep;
    // public $sdt, $trangthai;
    
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
            'kh_solantiem' => $this->solantiem,
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
    public function fill(array $data){
		if (isset($data['txtHoTen'])) {
			$this->hoten = $data['txtHoTen'];
		}
		if (isset($data['dtNgaySinh'])) {
			$this->ngaysinh = $data['dtNgaySinh'];
		}
        if (isset($data['rdGioiTinh'])) {
			$this->gioitinh = $data['rdGioiTinh'];
		}
        if (isset($data['txtCCCD'])) {
			$this->cmnd = $data['txtCCCD'];
		}
        if (isset($data['txtTP'])) {
			$this->tinh = $data['txtTP'];
		}
        if (isset($data['txtQH'])) {
			$this->quan = $data['txtQH'];
		}
        if (isset($data['txtPX'])) {
			$this->phuong = $data['txtPX'];
		}
        if (isset($data['txtDiaChi'])) {
			$this->diachi = $data['txtDiaChi'];
		}
        if (isset($data['txtBHYT'])) {
			$this->baohiem = $data['txtBHYT'];
		}
        if (isset($data['dtSDBD'])) {
			$this->baohiembd = $data['dtSDBD'];
		}
        if (isset($data['dtSDKT'])) {
			$this->baohiemkt = $data['dtSDKT'];
		}
        if (isset($data['txtDanToc'])) {
			$this->dantoc = $data['txtDanToc'];
		}
        
        if (isset($data['txtTonGiao'])) {
			$this->tongiao = $data['txtTonGiao'];
		}
        if (isset($data['txtNgheNghiep'])) {
			$this->nghenghiep = $data['txtNgheNghiep'];
		}
		return $this;
	}
    //create and edit record to table
    public function save(){
        $result = false;
        if ($this->id >=0){
            $sql = $this->db->prepare('update khach_hang
            set kh_hoten = :ten,kh_cmnd = :cmnd, kh_ngaysinh =:ngaysinh, kh_gioitinh = :gioitinh,
            kh_tinh = :tinh, kh_quan = :quan, kh_phuong = :phuong, kh_diachi = :diachi, kh_solantiem = :solantiem,
            kh_thebaohiem = :tbhid, kh_thebaohiembd = :tbhbd, kh_thebaohiemkt =:tbhkt, kh_dantoc =:dt, kh_tongiao =:tg, kh_nghenghiep =:nn
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
                //
                'tbhid' => $this->baohiem,
                'tbhbd' => $this->baohiembd,
                'tbhkt' => $this->baohiemkt,
                'dt' => $this->dantoc,
                'tg' => $this->tongiao,
                'nn' => $this->nghenghiep,
                'id' => $this->id
                //
            ]);
        } else {
            $sql = $this->db->prepare('insert into khach_hang
            (kh_hoten, kh_cmnd, kh_ngaysinh, kh_gioitinh, kh_tinh,kh_quan, kh_phuong, kh_diachi, kh_solantiem, kh_thebaohiem, kh_thebaohiembd, kh_thebaohiemkt, kh_dantoc, kh_tongiao, kh_nghenghiep)
			values (:ten,:cmnd, :ngaysinh,:gioitinh,:tinh,:quan, :phuong,:diachi, :solantiem, :tbhid, :tbhbd, :tbhkt, :dt,:tg,:nn)');
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
                //
                'tbhid' => $this->baohiem,
                'tbhbd' => $this->baohiembd,
                'tbhkt' => $this->baohiemkt,
                'dt' => $this->dantoc,
                'tg' => $this->tongiao,
                'nn' => $this->nghenghiep,
                
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