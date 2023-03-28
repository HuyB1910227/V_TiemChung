<?php 
namespace TC\OBS;


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
    
    public $solantiem, $ngaytiemgannhat, $vaccinedatiem;
    public $baohiem, $baohiembd, $baohiemkt, $dantoc, $tongiao, $nghenghiep;
  
    public $nt_id;
    public function layId(){
        return $this->id;
    }
    
    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }
    
    protected function fillFromDB(array $row){
		[
			'nd_id' => $this->id,
			'nd_hoten' => $this->hoten,
            'nd_cmnd' => $this->cmnd,
           
            'nd_ngaysinh' => $this->ngaysinh,
            'nd_gioitinh' => $this->gioitinh,
			'nd_diachi' => $this->diachi,
			'nd_phuong' => $this->phuong,
			'nd_quan' => $this->quan,
            'nd_tinh' => $this->tinh,
            'nd_solantiem' => $this->solantiem,
            'nd_thebaohiem' => $this->baohiem,
            'nd_thebaohiembd' => $this->baohiembd,
            'nd_thebaohiemkt' => $this->baohiemkt,
            'nd_dantoc' => $this->dantoc,
            'nd_tongiao' => $this->tongiao,
            'nd_nghenghiep' => $this->nghenghiep,
            'nd_ngaytiemgannhat' => $this->ngaytiemgannhat,
            'nd_vacxintiemgannhat' => $this->vaccinedatiem,
            'nt_id' => $this->nt_id
		] = $row;
	    return $this;
	}
  
    public function all(){
		$ArrayKhachHang = [];
		$stmt = $this->db->prepare('select * from nguoi_dan');
		$stmt->execute();
		while ($row = $stmt->fetch()) {
            $khachhang = new KhachHang($this->db);
            $khachhang->fillFromDB($row);
            $ArrayKhachHang[] = $khachhang;
		}
		return $ArrayKhachHang;
	}

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
        if (isset($data['nbSoLanTiem'])){
            $this->solantiem = $data['nbSoLanTiem'];
        }
        if (isset($data['dtNgayTiemGanNhat'])){
            $this->ngaytiemgannhat = $data['dtNgayTiemGanNhat'];
        }
        if(isset($data['nguoiThanID'])){
            $this->nt_id = $data['nguoiThanID'];
        }
        if(isset($data['slvaccineTiemGanNhat'])){
            $this->vaccinedatiem = $data['slvaccineTiemGanNhat'];
        }
		return $this;
	}
 
    public function save(){
        $result = false;
        if ($this->id >=0){
            $sql = $this->db->prepare('update nguoi_dan
            set nd_hoten = :ten,nd_cmnd = :cmnd, nd_ngaysinh =:ngaysinh, nd_gioitinh = :gioitinh,
            nd_tinh = :tinh, nd_quan = :quan, nd_phuong = :phuong, nd_diachi = :diachi, nd_solantiem = :solantiem,
            nd_thebaohiem = :tbhid, nd_thebaohiembd = :tbhbd, nd_thebaohiemkt =:tbhkt, nd_dantoc =:dt, nd_tongiao =:tg, nd_nghenghiep =:nn
            where nd_id = :id');
            $result = $sql->execute([
                'ten' => $this->hoten,
                'cmnd' => $this->cmnd,
               
                'ngaysinh' => $this->ngaysinh,
                'gioitinh' => $this->gioitinh,
                'solantiem' => $this->solantiem,
                'tinh' => $this->tinh,
                'quan' => $this->quan,
                'phuong' => $this->phuong,
                'diachi' => $this->diachi,
               
                'tbhid' => $this->baohiem,
                'tbhbd' => $this->baohiembd,
                'tbhkt' => $this->baohiemkt,
                'dt' => $this->dantoc,
                'tg' => $this->tongiao,
                'nn' => $this->nghenghiep,
               
                'id' => $this->id
                
           
            ]);
        } else {
            $sql = $this->db->prepare('insert into nguoi_dan
            (nd_hoten, nd_cmnd, nd_ngaysinh, nd_gioitinh, nd_tinh,nd_quan, nd_phuong, nd_diachi, nd_solantiem, nd_thebaohiem, nd_thebaohiembd, nd_thebaohiemkt, nd_dantoc, nd_tongiao, nd_nghenghiep, nd_ngaytiemgannhat, nd_vacxintiemgannhat, nt_id)
			values (:ten,:cmnd, :ngaysinh,:gioitinh,:tinh,:quan, :phuong,:diachi, :solantiem, :tbhid, :tbhbd, :tbhkt, :dt,:tg,:nn, :ntgn, :vtgn, :ntid)');
            $result = $sql->execute([
                'ten' => $this->hoten,
                'cmnd' => $this->cmnd,
                
                'ngaysinh' => $this->ngaysinh,
                'gioitinh' => $this->gioitinh,
                'solantiem' => $this->solantiem,
                'tinh' => $this->tinh,
                'quan' => $this->quan,
                'phuong' => $this->phuong,
                'diachi' => $this->diachi,
               
                'tbhid' => $this->baohiem,
                'tbhbd' => $this->baohiembd,
                'tbhkt' => $this->baohiemkt,
                'dt' => $this->dantoc,
                'tg' => $this->tongiao,
                'nn' => $this->nghenghiep,
                'ntgn' => $this->ngaytiemgannhat,
                'vtgn' => $this->vaccinedatiem,
                'ntid' => $this->nt_id
            ]);
            if($result){
                $this->id = $this->db->lastInsertId();
            }
        }
        return $result;
    }
  
    public function find($id)
	{
		$sql = $this->db->prepare('select * from nguoi_dan where nd_id = :id');
		$sql->execute(['id' => $id]);
		if ($row = $sql->fetch()) {
			$this->fillFromDB($row);
			return $this;
		}
		return null;
	}

    public function delete()
	{
		$sql = $this->db->prepare('delete from nguoi_dan where nd_id = :id');
		return $sql->execute(['id' => $this->id]);
	}
    public function updateNOV($lantiem){
        $sql = $this->db->prepare('update nguoi_dan set nd_solantiem = :slt where nd_id = :id');
        return $sql->execute(['id' => $this->id, 'slt' => $lantiem]);
    }

    public function updateLastNameOfVaccinated($tenvaccine){
        $sql = $this->db->prepare('update nguoi_dan set nd_vacxintiemgannhat = :slt where nd_id = :id');
        return $sql->execute(['id' => $this->id, 'slt' => $tenvaccine]);
    }
    
     public function updateLastVaccinated(){
       
        $sql = $this->db->prepare('update nguoi_dan set nd_ngaytiemgannhat = now() where nd_id = :id');
        return $sql->execute(['id' => $this->id]);
    }

    public function findDateLastVaccinated() {
        $lichtiem = $this->db->prepare("select max(tc_ngaytiem) from lich_su_tiem lst join thong_tin_tiem_chung tt on lst.tc_id = tt.tc_id where nd_id = :id");
        $lichtiem->execute(["id" => $this->id]);
        $kq = $lichtiem->fetch();
        if($kq[0] != null){
            $date = strtotime($kq[0]);
            $dat = date('Y-m-d', $date);
            return $dat;
        }
        return $kq[0];
    }

    public function dateEXP(){
        if($this->solantiem == 0){
            $date = null;
        }else{
            $date = $this->ngaytiemgannhat;
        }
        
        
        

        $hl = $this->findVaccineLastVaccinated();
        if($date != null){
            $date = date_create($date);
            $str = strval($hl)." days";
            date_add($date, date_interval_create_from_date_string($str));
            return date_format($date, "Y-m-d");
        }
        return $date;
    }

    public function compareDateEXP($strDate){
        $result = true;
        $date = strtotime($strDate);
        $dateEXP = $this->dateEXP();
        if($dateEXP != null){
            $dateEXP = strtotime($dateEXP);
            if($date < $dateEXP){
                return $result = false;
            }
        }
        return $result;
    }

    public function findVaccineLastVaccinated() {
       
        if($this->solantiem == 0 || $this->vaccinedatiem == null) {
            $hl = 0;
            return $hl;
        }
        $hl = 100;
        if($this->vaccinedatiem == 0){
            return $hl;
        }
        $lichtiem = $this->db->prepare("SELECT v_hieuluc FROM vaccine where v_id = :ten");
        
        $lichtiem->execute(["ten" => $this->vaccinedatiem]);
        $kq = $lichtiem->fetch();
        
        if($kq["v_hieuluc"] != null && $this->solantiem <= 3){
            $hl = $kq["v_hieuluc"];
            return $hl;
        } 
        
        else if ($this->solantiem > 3){
            $hl = 120;
            return $hl;
        }
        return $hl;
    }
    
    public function findFamily()
	{
		$ArrayKhachHang = [];
		$stmt = $this->db->prepare('select * from nguoi_dan where nt_id = :id');
		$stmt->execute(["id" => $this->id]);
		while ($row = $stmt->fetch()) {
            $khachhang = new KhachHang($this->db);
            $khachhang->fillFromDB($row);
            $ArrayKhachHang[] = $khachhang;
		}
		return $ArrayKhachHang;
	}

   
}
?>