<?php 
namespace TC\OBS;


use PDO;
use TC\OBS\CoSoTiem;

class LichHenTiem{
    private PDO $db;
    public CoSoTiem $cosotiem;
    private $id = -1;
    public $ngaytiem;
    public $cs_id;
    public function getId(){
        return $this->id;
    }
    
    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }

    protected function fillFromDB(array $row){
		[
			'lht_id' => $this->id,
			'lht_ngaytiem' => $this->ngaytiem,
            'cs_id' => $this->cs_id
		] = $row;
	    return $this;
	}

    public function all(){
		$are = [];
		$sql = $this->db->prepare('select * from lich_hen_tiem');
		$sql->execute();
		while ($row = $sql->fetch()) {
            $e = new LichHenTiem($this->db);
            $e->fillFromDB($row);
            $are[] = $e;
		}
		return $are;
	}

    public function fill(array $data)

	{
		if (isset($data['dtNgayHenTiem'])) {
			$this->ngaytiem = date($data['dtNgayHenTiem']);
		}

		if (isset($data['slCoSo'])) {
			$this->cs_id = $data['slCoSo'];
		}
		return $this;
	}
 
    public function save(){
        $result = false;
        if ($this->id >=0){
            $sql = $this->db->prepare('update lich_hen_tiem
            set lht_ngaytiem = :ngaytiem, cs_id = :cs_id
            where lht_id = :id');
            $result = $sql->execute([
                'ngaytiem' => $this->ngaytiem,
                'cs_id' => $this->cs_id,
                'id' => $this->id
            ]);
        } else {
            $sql = $this->db->prepare('insert into lich_hen_tiem
            (lht_ngaytiem, cs_id)
			values (:ngaytiem, :cs_id)');
            $result = $sql->execute([
                'ngaytiem' => $this->ngaytiem,
                'cs_id' => $this->cs_id,
            ]);
            if($result){
                $this->id = $this->db->lastInsertId();
            }
        }
        return $result;
    }

    public function find($id){
		$sql = $this->db->prepare('select * from lich_hen_tiem where lht_id = :id');
		$sql->execute(['id' => $id]);
		if ($row = $sql->fetch()) {
			$this->fillFromDB($row);
			return $this;
		}
		return null;
	}
    public function findLocation(){
        $coso = new CoSoTiem($this->db);
        return $coso->find($this->cs_id);
    }

    public function delete(){
		$sql = $this->db->prepare('delete from lich_hen_tiem where lht_id = :id');
		return $sql->execute(['id' => $this->id]);
	}
}
?>