<?php

require_once 'model/BlooddonorModel.php';
class BlooddonorController{
    function index(){
        $bdModal = new BlooddonorModal();
        $bdonor = $bdModal->getAllBD();
        require_once 'view/Blooddonor/index.php';
    }
    function admin(){
        $bdModal = new BlooddonorModal();
        $bdonor = $bdModal->getAllBD();
        require_once 'view/Blooddonor/admin.php';
    }
    function add(){
        $error = '';
        if(isset($_POST['submit'])){
            $bd_name = $_POST['bd_name'];
            //$bd_sex = $_POST['bd_sex'];
            $bd_age = $_POST['bd_age'];
            $bd_bgroup = $_POST['bd_bgroup'];
            $bd_reg_date = $_POST['bd_reg_date'];
            $bd_phno = $_POST['bd_phno'];
            if(empty($bd_name) || empty($_POST['bd_sex'])|| empty($bd_age) || empty($bd_bgroup) || empty($bd_reg_date) || empty($bd_phno)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
                $bd_sex = $_POST['bd_sex'];
                $bdModal = new BlooddonorModal();
                $bdArr = [
                    'bd_name' => $bd_name,
                    'bd_sex' => $bd_sex,
                    'bd_age' => $bd_age,
                    'bd_bgroup' => $bd_bgroup,
                    'bd_reg_date' => $bd_reg_date,
                    'bd_phno' => $bd_phno,
                ];
                $isAdd = $bdModal->insert($bdArr);
                if ($isAdd) {
                    $TT=  "Thêm mới thành công";
                }
                else {
                    $TT= "Thêm mới thất bại";
                }
                header("Location: index.php?controller=blooddonor&action=admin&tt=$TT");
                exit();
            }

        }
        require_once 'view/Blooddonor/add.php';
    }
    function edit(){
        if (!isset($_GET['bdid'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=book&action=admin");
            return;
        }
        if (!is_numeric($_GET['bdid'])) {
            $_SESSION['error'] = "Id phải là số";
            header("Location: index.php?controller=book&action=admin");
            return;
        }
        $id = $_GET['bdid'];
        $bdModal = new BlooddonorModal();
        $BD = $bdModal->getBDById($id);
        $error = '';
        if (isset($_POST['submit'])) {
            $bd_name = $_POST['bd_name'];
            //$bd_sex = $_POST['bd_sex'];
            $bd_age = $_POST['bd_age'];
            $bd_bgroup = $_POST['bd_bgroup'];
            $bd_reg_date = $_POST['bd_reg_date'];
            $bd_phno = $_POST['bd_phno'];
            if(empty($bd_name) || empty($_POST['bd_sex'])|| empty($bd_age) || empty($bd_bgroup) || empty($bd_reg_date) || empty($bd_phno)){
                $error = 'Thông tin chưa đầy đủ!';
            }
            else {
                
                //xử lý update dữ liệu vào hệ thống
                $bd_sex = $_POST['bd_sex'];
                $bdArr = [
                    'bd_id' => $id,
                    'bd_name' => $bd_name,
                    'bd_sex' => $bd_sex,
                    'bd_age' => $bd_age,
                    'bd_bgroup' => $bd_bgroup,
                    'bd_reg_date' => $bd_reg_date,
                    'bd_phno' => $bd_phno,
                ];
                $isAdd = $bdModal->update($bdArr);

                if ($isAdd) {
                    $TT= "Sửa thành công";
                }
                else {
                    $TT = "Sửa thất bại";
                }
                header("Location: index.php?controller=blooddonor&action=admin&tt=$TT");
                exit();
            }
        }
        require_once 'view/Blooddonor/edit.php';
    }
    function delete(){
        $id = $_GET['bdid'];
        if (!is_numeric($id)) {
            header("Location: index.php?controller=book&action=index");
            exit();
        }
        $bdModal = new BlooddonorModal();
        $isDelete = $bdModal->delete($id);
        if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
            $TT=  "Xóa bản ghi thành công";
        }
        else {
            //báo lỗi
            $TT = "Xóa bản ghi thất bại";
        }
        header("Location: index.php?controller=blooddonor&action=admin&tt=$TT");
        exit();
    }
}

?>