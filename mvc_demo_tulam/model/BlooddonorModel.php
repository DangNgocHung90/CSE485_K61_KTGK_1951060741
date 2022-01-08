<?php
require_once 'config/db.php';
class BlooddonorModal{
    private $bd_id;
    private $bd_name;
    private $bd_sex;
    private $bd_age;
    private $bd_group;
    private $bd_reg_date;
    private $bd_phno;
    public function getAllBD(){
        $conn = $this->connectDb();
        $sql = "SELECT * FROM blood_donor";
        $result = mysqli_query($conn, $sql);
        $arr_bd = [];
        if(mysqli_num_rows($result)>0){
            $arr_bd = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $arr_bd;
    }
    public function insert($param = []) {
        $connection = $this->connectDb();
        //tạo và thực thi truy vấn
        $queryInsert = "INSERT INTO blood_donor (bd_name, bd_sex, bd_age, bd_bgroup, bd_reg_date, bd_phno)
        VALUES ('{$param['bd_name']}', '{$param['bd_sex']}', '{$param['bd_age']}', '{$param['bd_bgroup']}', '{$param['bd_reg_date']}', '{$param['bd_phno']}')";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeDb($connection);

        return $isInsert;
    }
    public function connectDb() {
        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }

        return $connection;
    }
    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
    public function getBDById($bd_id = null) {
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM blood_donor WHERE bd_id={$bd_id}";
        $results = mysqli_query($connection, $querySelect);
        $bdArr = [];
        if (mysqli_num_rows($results) > 0) {
            $bds = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $bdArr = $bds[0];
        }
        $this->closeDb($connection);

        return $bdArr;
    }
    public function update($bd = []) {
        $connection = $this->connectDb();
        $queryUpdate = "UPDATE blood_donor 
        SET bd_name = '{$bd['bd_name']}', bd_sex = '{$bd['bd_sex']}', bd_age = '{$bd['bd_age']}', bd_bgroup = '{$bd['bd_bgroup']}', bd_reg_date = '{$bd['bd_reg_date']}', bd_phno = '{$bd['bd_phno']}'  WHERE bd_id = {$bd['bd_id']}";
        $isUpdate = mysqli_query($connection, $queryUpdate);
        $this->closeDb($connection);

        return $isUpdate;
    }
    public function delete($id = null) {
        $connection = $this->connectDb();

        $queryDelete = "DELETE FROM blood_donor WHERE bd_id = {$id}";
        $isDelete = mysqli_query($connection, $queryDelete);

        $this->closeDb($connection);

        return $isDelete;
    }
}

?>