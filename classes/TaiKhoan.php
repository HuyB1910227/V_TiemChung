<?php 
namespace TC\OBS;

use Exception;
use PDO;

class TaiKhoan{
    private PDO $db;
    private $id = -1;
    public $ten;
    public $hoten;
    public $sdt;
    private $matkhau;
    public $vaitro;
    public $nd_id;
    private $errors = [];
    public $avatar;
   
    
    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }
    public function getID(){
        return $this->id;
    }
    public function getPassword(){
        return $this->matkhau;
    }
    protected function fillFromDB(array $row){
		[
			'tk_id' => $this->id,
            'tk_ten' => $this->ten,
            'tk_hoten' => $this->hoten,
            'tk_sodienthoai' => $this->sdt,
            'tk_matkhau' => $this->matkhau,
            'tk_vaitro' => $this->vaitro,
            'tk_avatar' => $this->avatar,
            'nd_id' => $this->nd_id
		] = $row;
	    return $this;
	}
    public function all(){
		$are = [];
		$sql = $this->db->prepare('select * from tai_khoan');
		$sql->execute();
		while ($row = $sql->fetch()) {
            $e = new TaiKhoan($this->db);
            $e->fillFromDB($row);
            $are[] = $e;
		}
		return $are;
	}

    public function login($sodienthoai, $matkhau){
        // $result = false;
        try {
            $check = $this->db->prepare('select * from tai_khoan 
            where tk_sodienthoai = :sdt and tk_matkhau = :mk');
            $check->execute([
                'sdt' => $sodienthoai,
                'mk' => $matkhau
            ]);
            $e = new TaiKhoan($this->db);
            $e->fillFromDB($check->fetch());
            return $e;
        } catch(Exception $error){
            return $error;
        }
       
        // if($result){
        //     // $check->execute([
        //     //     'sdt' => $sodienthoai,
        //     //     'mk' => $matkhau
        //     // ]);
        //     // $e = new User($this->db);
        //     // $e->fillFromDB($check->fetch());
        //     return $result;
        // }
        // return $result;
        
    }

    public function login2($sodienthoai, $matkhau){
        // $result = false;
        
            $check = $this->db->query("select * from tai_khoan 
            where tk_sodienthoai = $sodienthoai and tk_matkhau = $matkhau");

            $e = new TaiKhoan($this->db);
            $e->fillFromDB($check->fetch());
            return $e;
        
       
        // if($result){
        //     // $check->execute([
        //     //     'sdt' => $sodienthoai,
        //     //     'mk' => $matkhau
        //     // ]);
        //     // $e = new User($this->db);
        //     // $e->fillFromDB($check->fetch());
        //     return $result;
        // }
        // return $result;
        
    }

    public function login3($sodienthoai, $matkhau)
	{
        $mk = md5($matkhau);
		$sql = $this->db->prepare('select * from tai_khoan 
        where tk_sodienthoai = :sdt and tk_matkhau = :mk and tk_vaitro = 2');
		$sql->execute([
            'sdt' => $sodienthoai,
            'mk' => $mk
        ]);
		if ($row = $sql->fetch()) {
			$this->fillFromDB($row);
			return $this;
		}
		return null;
	}

    public function loginByName($ten, $matkhau)
	{
        $mk = md5($matkhau);
		$sql = $this->db->prepare('select * from tai_khoan 
        where tk_ten = :sdt and tk_matkhau = :mk and tk_vaitro = 2');
		$sql->execute([
            'sdt' => $ten,
            'mk' => $mk
        ]);
		if ($row = $sql->fetch()) {
			$this->fillFromDB($row);
			return $this;
		}
		return null;
	}

    public function loginAdmin($ten, $matkhau)
	{
		$sql = $this->db->prepare('select * from tai_khoan 
        where tk_ten = :ten and tk_matkhau = :mk and tk_vaitro = 1');
		$sql->execute([
            'ten' => $ten,
            'mk' => md5($matkhau),
        ]);
		if ($row = $sql->fetch()) {
			$this->fillFromDB($row);
			return $this;
		}
		return null;
	}

    // public function session() {
    //     if (isset($_SESSION['btnDangNhap'])){
    //         return $_SESSION['btnDangNhap'] == 1;
    //     }
    // }

    // public function logout() {  
    //     $_SESSION['login'] = false;  
    //     session_destroy();  
    // }
    public function find($id)
	{
		$sql = $this->db->prepare('select * from tai_khoan where tk_id = :id');
		$sql->execute(['id' => $id]);
		if ($row = $sql->fetch()) {
			$this->fillFromDB($row);
			return $this;
		}
		return null;
	}


    public function fill(array $data, $idKhachHang){
		if (isset($data['txtTen'])) {
			$this->ten = $data['txtTen'];
		}
		if (isset($data['txtHoTen'])) {
			$this->hoten = $data['txtHoTen'];
		}
        if (isset($data['txtSoDienThoai'])){
            $this->sdt = preg_replace('/\D+/', '', $data['txtSoDienThoai']);;
        }
        if (isset($data['pwd'])){
            $this->matkhau= md5($data['pwd']);
        }
        if (isset($data['doimatkhau'])){
            if(isset($data['npwd'])){
                $this->matkhau= md5($data['npwd']);
            }
        }
        $this->nd_id = $idKhachHang;
		return $this;
	}

    public function fillAvatar($data){
		if (isset($data)) {
			$this->avatar = $data;
		}
		
		return $this;
	}

    
    public function getValidationErrors() {
		return $this->errors;
	}

	public function validate() {
        
		if (!$this->ten) {
			$this->errors['txtTen'] = 'Bạn chưa nhập tên đăng nhập!';
		} else if(strlen($this->ten) <= 8){
            $this->errors['txtTen'] = 'Tên đăng nhập phải lớn hơn 8 kí tự';
        } 

        if (!$this->hoten){
            $this->errors['txtHoTen'] = 'Bạn chưa nhập vào họ tên!';
        } else if(strlen($this->hoten) <= 10){
            $this->errors['txtHoTen'] = 'Họ tên chưa đúng định dạng!';
        } 

        
        if(!$this->sdt){
            $this->errors['txtSoDienThoai'] = 'Bạn chưa nhập số điện thoại';
        } elseif (strlen($this->sdt) != 10){
            $this->errors['txtSoDienThoai'] = 'Số điện thoại phải đủ 10 chữ số';
        }


		
		return empty($this->errors);
	}

    public function save(){
        $result = false;
        if ($this->id >= 0) {
            $sql = $this->db->prepare('update tai_khoan
                        set tk_ten = :ten, tk_sodienthoai = :sdt, tk_matkhau = :pwd
                        where tk_id = :id');
            $result = $sql->execute([
                'ten' => $this->ten,
                'sdt' => $this->sdt,
                'pwd' => $this->matkhau,
              
                'id' => $this->id
            ]);
        } else {

            $sql = $this->db->prepare('insert into tai_khoan
            (tk_ten, tk_hoten, tk_sodienthoai, tk_matkhau, nd_id)
			values (:ten, :hoten, :sdt, :pwd, :id_kh)');
            $result = $sql->execute([
                'ten' => $this->ten,
                'hoten' => $this->hoten,
                'sdt' => $this->sdt,
                'pwd' => $this->matkhau,
                'id_kh' => $this->nd_id,
            ]);
            if($result){
                $this->id = $this->db->lastInsertId();
            }
        }

        
        return $result;
    }

    public function changeFullName($fullname){
        $sql = $this->db->prepare('update tai_khoan
                    set tk_hoten = :hoten
                    where tk_id = :id');
        $result = $sql->execute([
            'hoten' => $fullname,
            'id' => $this->id
        ]);
        return $result;
    }

    public function changeAvatarName(){
        $sql = $this->db->prepare('update tai_khoan
                    set tk_avatar = :a
                    where tk_id = :id');
        $result = $sql->execute([
            'a' => $this->avatar,
            'id' => $this->id
        ]);
        return $result;
    }
    // public function save(){
    //     $result = false;
    //     if ($this->id >=0){
    //         $sql = $this->db->prepare('update co_so_tiem_chung 
    //         set cs_ten = :ten, cs_tinh = :tinh, cs_quan = :quan, cs_phuong = :phuong, cs_diachi = :diachi, cs_trangthai = :trangthai
    //         where cs_id = :id');
    //         $result = $sql->execute([
    //             'ten' => $this->ten,
    //             'tinh' => $this->tinh,
    //             'quan' => $this->quan,
    //             'phuong' => $this->phuong,
    //             'diachi' => $this->diachi,
    //             'trangthai' => $this->trangthai,
    //             'id' => $this->id
    //         ]);
    //     } else {
    //         $sql = $this->db->prepare('insert into tai_khoan
    //                 (tk_ten, tk_hoten, tk_sodienthoai, tk_matkhau, nd_id)
    //         		values (:ten, :hoten, :sdt, :pwd, :id_kh)');
    //         $result = $sql->execute([
    //                     'ten' => $this->ten,
    //                     'hoten' => $this->hoten,
    //                     'sdt' => $this->sdt,
    //                     'pwd' => $this->matkhau,
    //                     'id_kh' => $this->nd_id,
    //                 ]);
    //         if($result){
    //             $this->id = $this->db->lastInsertId();
    //         }
    //     }
    //     return $result;
    // }


    

}
?>