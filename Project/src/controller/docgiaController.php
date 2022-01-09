<?php

require_once 'model/docgiaModel.php';
class DrugsController{
    function index(){
        $dgModal = new DrugsModal();
        $dgonor = $bdModal->getAllBD();
        require_once 'view/docgia/index.php';
    }
    function admin(){
        $dgModal = new docgiaModal();
        $bdonor = $bdModal->getAllBD();
        require_once 'view/docgia/admin.php';
    }
    function add(){
        $error = '';
        if(isset($_POST['submit'])){
            $name = $_POST['madg'];
            $hovaten= $_POST['hovaten'];
            $gioitinh= $_POST['gioitinh'];
            $namsinh = $_POST['namsinh'];
            $nghenghiep = $_POST['nghenghiep'];
            $ngaycapthe = $_POST['ngaycapthe'];
            $ngayhethan = $_POST['ngayhethan'];
            $diachi = $_POST['diachi'];

            if(empty($madg) ||  empty($hovaten) || empty($hovaten) || empty($gioitinh)) || empty($namsinh) ||  empty($nghenghiep) || empty($ngaycapthe) || empty($ngayhethan)|| empty($diachi)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
                $dgModal = new docgiaModal();
                $bdArr = [
                    'madg' => $madg,
                    'hovaten' => $hovaten,
                    'gioitinh' => $gioitinh,
                    'namsinh' => $namsinh,
                    'nghenghiep' => $nghenghiep,
                    'ngaycapthe' => $ngaycapthe,
                    'ngayhethan' => $ngayhethan,
                    'diachi' => $diachi,

                ];
                $isAdd = $dgModal->insert($dgArr);
                if ($isAdd) {
                    $TT=  "Thêm mới thành công";
                }
                else {
                    $TT= "Thêm mới thất bại";
                }
                header("Location: index.php?controller=drugs&action=admin&tt=$TT");
                exit();
            }

        }
        require_once 'view/Drugs/add.php';
    }
    function edit(){
        if (!isset($_GET['madg'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=docgia&action=admin");
            return;
        }
        if (!is_numeric($_GET['madg'])) {
            $_SESSION['error'] = "madg phải là số";
            header("Location: index.php?controller=docgia&action=admin");
            return;
        }
        $madg= $_GET['madg'];
        $bdModal = new docgiaModal();
        $DG = $dgModal->getDGById($madg);
        $error = '';
        if (isset($_POST['submit'])) {
            $name = $_POST['madg'];
            $hovaten= $_POST['hovaten'];
            $gioitinh= $_POST['gioitinh'];
            $namsinh = $_POST['namsinh'];
            $nghenghiep = $_POST['nghenghiep'];
            $ngaycapthe = $_POST['ngaycapthe'];
            $ngayhethan = $_POST['ngayhethan'];
            $diachi = $_POST['diachi'];
            if(empty($madg) ||  empty($hovaten) || empty($hovaten) || empty($gioitinh)) || empty($namsinh) ||  empty($nghenghiep) || empty($ngaycapthe) || empty($ngayhethan)|| empty($diachi)){
                $error = 'Thông tin chưa đầy đủ!';
            }
            else {
                $dgArr = [
                    'madg' => $madg,
                    'hovaten' => $hovaten,
                    'gioitinh' => $gioitinh,
                    'namsinh' => $namsinh,
                    'nghenghiep' => $nghenghiep,
                    'ngaycapthe' => $ngaycapthe,
                    'ngayhethan' => $ngayhethan,
                    'diachi' => $diachi,
              ];
                $isAdd = $dgModal->update($dgArr);
                if ($isAdd) {
                    $TT=  "Sửa thành công";
                }
                else {
                    $TT= "Sửa thất bại";
                }
                header("Location: index.php?controller=docgia&action=admin&tt=$TT");
                exit();
            }
        }
        require_once 'view/docgia/edit.php';
    }
    function delete(){
        $madg = $_GET['madg'];
        if (!is_numeric($madg)) {
            header("Location: index.php?controller=drugs&action=index");
            exit();
        }
        $dgModal = new docgiaModal();
        $isDelete = $dgModal->delete($madg);
        if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
            $TT=  "Xóa bản ghi thành công";
        }
        else {
            //báo lỗi
            $TT = "Xóa bản ghi thất bại";
        }
        header("Location: index.php?controller=docgia&action=admin&tt=$TT");
        exit();
    }
}