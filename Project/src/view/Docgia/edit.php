<?php
require 'view/template/header.php'
?>
<main>
    <div class="container">
        <div class="row">
            <div style="color: red">
                <?php echo $error; ?>
            </div>
            <div class="col-md-8 ms-auto me-auto">
                <h4>Sửa docgia</h4>
                <form class="row g-3 needs-validation" method="post" action="" novalidate>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Mã độc giả</label>
                        <input type="text" class="form-control" name="madg" id="validationCustom01" value="<?php echo isset($_GET['madg']) ? $_GET['madg'] : $dg['madg']?>" readonly required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="hovaten" id="validationCustom01" value="<?php echo isset($_POST['hovaten']) ? $_POST['hovaten'] : $dg['hovaten']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Giới tính</label>
                        <input type="text" class="form-control" name="gioitinh" id="validationCustom02" value="<?php echo isset($_POST['gioitinh']) ? $_POST['gioitinh'] : $dg['gioitinh']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Năm sinh</label>
                        <input type="text" class="form-control" name="namsinh" id="validationCustom02" value="<?php echo isset($_POST['namsinh']) ? $_POST['namsinh'] : $dg['namsinh']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Nghề nghiệp</label>
                        <input type="text" class="form-control" name="nghenghiep" id="validationCustom02" value="<?php echo isset($_POST['nghenghiep']) ? $_POST['nghenghiep'] : $dg['nghenghiep']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Ngày cấp thẻ</label>
                        <input type="text" class="form-control" name="ngaycapthe" id="validationCustom01" value="<?php echo isset($_GET['ngaycapthe']) ? $_GET['ngaycapthe'] : $dg['ngaycapthe']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Ngày hết hạn</label>
                        <input type="text" class="form-control" name="ngayhethan" id="validationCustom01" value="<?php echo isset($_GET['ngayhethan']) ? $_GET['ngayhethan'] : $dg['ngayhethan']?>" required>
                    </div>   
                     <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="diachi" id="validationCustom01" value="<?php echo isset($_GET['diachi']) ? $_GET['diachi'] : $dg['diachi']?>" required>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" name="submit" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>