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
    public $kh_id;
   
    
    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }
    public function getID(){
        return $this->id;
    }
    protected function fillFromDB(array $row){
		[
			'tk_id' => $this->id,
            'tk_ten' => $this->ten,
            'tk_hoten' => $this->hoten,
            'tk_sodienthoai' => $this-> sdt,
            'tk_matkhau' => $this->matkhau,
            'tk_vaitro' => $this->vaitro,
            'kh_id' => $this->kh_id
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
		$sql = $this->db->prepare('select * from tai_khoan 
        where tk_sodienthoai = :sdt and tk_matkhau = :mk');
		$sql->execute([
            'sdt' => $sodienthoai,
            'mk' => $matkhau,
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

}
?>