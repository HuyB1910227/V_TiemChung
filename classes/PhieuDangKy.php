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
    public $diembatthuong;
    public $tiensu;

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
            'lht_id' => $this->lht_id,
            'pdk_dbt' => $this->diembatthuong,
            'pdk_tiensu' => $this->tiensu
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
    //
    public function detectUnusual(){
        $strU = $this->tiensu;
        $arrayU = explode(',',$strU);
        $this->diembatthuong = "0";
        foreach($arrayU as $i => $e){
            if($e%10 != 0){
                return $this->diembatthuong = "1";
            }
        }
        return $this->diembatthuong;
    }
    //
    public function listUnusualYes(){
        if($this->diembatthuong == 1){
            $list = [];
            $strU = $this->tiensu;
            $arrayU = explode(',',$strU);
            foreach($arrayU as $i => $e){
                if($e%10 != 0){
                    if($e==11){
                        $list[] = "Phản vệ từ độ 2 trở lên";
                    }
                    elseif($e==21){
                        $list[] = "Bị COVID-19 trong vòng 6 tháng";
                    }
                    elseif($e==31){
                        $list[] = "Tiêm vắc xin trong vòng 14 ngày qua";
                    }
                    elseif($e==41){
                        $list[] = "Suy giảm miễn dịch, ung thư giai đoạn cuối, cắt lách, xơ gan,...";
                    }
                    elseif($e==51){
                        $list[] = "Đang dùng thuốc ức chế miễn dịch, corticoid liều cao";
                    }
                    elseif($e==61){
                        $list[] = "Bệnh cấp tính";
                    }
                    elseif($e==71){
                        $list[] = "Bệnh mãn tính, đang tiến triễn";
                    }
                    elseif($e==81){
                        $list[] = "Bệnh mạn tính đã điều trị ổn";
                    }
                    elseif($e==91){
                        $list[] = "Rối loạn đông máu hoặc đang dùng thuốc chống đông máu";
                    }
                    elseif($e==101){
                        $list[] = "Dị dứng với các dị nguyên khác";
                    }
                }
            }
        }
        if($list != null){
            return $list;
        }
    }
    public function listUnusualUnclear(){
        if($this->diembatthuong == 1){
            $list = [];
            $strU = $this->tiensu;
            $arrayU = explode(',',$strU);
            foreach($arrayU as $i => $e){
                if($e%10 != 0){
                    if($e==13){
                        $list[] = "Phản vệ từ độ 2 trở lên";
                    }
                    elseif($e==23){
                        $list[] = "Bị COVID-19 trong vòng 6 tháng";
                    }
                    elseif($e==33){
                        $list[] = "Tiêm vắc xin trong vòng 14 ngày qua";
                    }
                    elseif($e==43){
                        $list[] = "Suy giảm miễn dịch, ung thư giai đoạn cuối, cắt lách, xơ gan,...";
                    }
                    elseif($e==53){
                        $list[] = "Đang dùng thuốc ức chế miễn dịch, corticoid liều cao";
                    }
                    elseif($e==63){
                        $list[] = "Bệnh cấp tính";
                    }
                    elseif($e==73){
                        $list[] = "Bệnh mãn tính, đang tiến triễn";
                    }
                    elseif($e==83){
                        $list[] = "Bệnh mạn tính đã điều trị ổn";
                    }
                    elseif($e==93){
                        $list[] = "Rối loạn đông máu hoặc đang dùng thuốc chống đông máu";
                    }
                    elseif($e==103){
                        $list[] = "Dị dứng với các dị nguyên khác";
                    }
                }
            }
        }
        if($list != null){
            return $list;
        }
        
    }
    //
    public function fill(array $data){
		if (isset($data['khachHangID'])) {
			$this->kh_id = $data['khachHangID'];
		}
		if (isset($data['lichHenTiemID'])) {
			$this->lht_id = $data['lichHenTiemID'];
		}
        if (isset($data['rdTienSuBenh1'])&&isset($data['rdTienSuBenh10'])){
            $strTienSu = "1".$data['rdTienSuBenh1'].",2".$data['rdTienSuBenh2'].",3".$data['rdTienSuBenh3'].",4".$data['rdTienSuBenh4'].",5".$data['rdTienSuBenh5'].",6".$data['rdTienSuBenh6'].",7".$data['rdTienSuBenh7'].",8".$data['rdTienSuBenh8'].",9".$data['rdTienSuBenh9'].",10".$data['rdTienSuBenh10'];
            $this->tiensu = $strTienSu;
            
        }
        $this->detectUnusual();
        
		return $this;
	}
    //create and edit record to table
    public function save(){
        $result = false;
        $sql = $this->db->prepare('insert into phieu_dang_ky_tiem
            (kh_id, lht_id,pdk_dbt, pdk_tiensu)
			values (:kh_id, :lht_id, :dbt, :tiensu)');
            $result = $sql->execute([
                'kh_id' => $this->kh_id,
                'lht_id' => $this->lht_id,
                'dbt' => $this->diembatthuong,
                'tiensu' => $this->tiensu
            ]);
            if($result){
                $this->id = $this->db->lastInsertId();
            }
        
        return $result;
    }
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

    public function confirm(){
        $sql = $this->db->prepare('update phieu_dang_ky_tiem set pdk_trangthai = 1 where pdk_id = :id');
        return $sql->execute(['id' => $this->id]); 
    }
    public function refuse(){
        $sql = $this->db->prepare('update phieu_dang_ky_tiem set pdk_trangthai = 2 where pdk_id = :id');
        return $sql->execute(['id' => $this->id]); 
    }

    public function selectFromUser($khID){
        $arr = [];
        $sql = $this->db->prepare('select * from phieu_dang_ky_tiem where kh_id = :id');
        $sql->execute(['id' => $khID]);
        while($row=$sql->fetch()){
            $e = new PhieuDangKy($this->db);
            $e->fillFromDB($row);
            $arr[] = $e;
        }
        return $arr;
    }

    // public function selectall($khID){
	// 	$are = [];
	// 	$sql = $this->db->prepare('select * from phieu_dang_ky_tiem where kh_id = 1');
	// 	$sql->execute();
	// 	while ($row = $sql->fetch()) {
    //         $e = new PhieuDangKy($this->db);
    //         $e->fillFromDB($row);
    //         $are[] = $e;
	// 	}
	// 	return $are;
	// }

    public function regCompleted(){
        $sql = $this->db->prepare('update phieu_dang_ky_tiem set pdk_trangthai = 4 where pdk_id = :id');
        return $sql->execute(['id' => $this->id]);
    }

    public function regCancel(){
        $sql = $this->db->prepare('update phieu_dang_ky_tiem set pdk_trangthai = 3 where pdk_id = :id');
        return $sql->execute(['id' => $this->id]);
    }

    public function checkToCancel($ngayhieuluc){
        $ngayhieuluc = strtotime($ngayhieuluc);
        $ngayhentiem = strtotime($this->findVaccinationSchedule()->ngaytiem);
        if(($this->trangthai == 1) || ($this->trangthai == 0)){
            if($ngayhentiem < $ngayhieuluc){
                return $this->regCancel();
            }
        }
        return false;
    }

}
?>