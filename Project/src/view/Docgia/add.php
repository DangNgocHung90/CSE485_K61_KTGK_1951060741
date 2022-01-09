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
                <h4>Nhập thông tin của các độc giả</h4>
                <form class="row g-3 needs-validation" method="post" action="" novalidate>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Mã độc giả</label>
                        <input type="text" class="form-control" name="madg" id="validationCustom01" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="hovaten" id="validationCustom02" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Giới tính</label>
                        <input type="text" class="form-control" name="gioitinh" id="validationCustom02" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Năm sinh</label>
                        <input type="text" class="form-control" name="namsinh" id="validationCustom02" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Nghề nghiệp</label>
                        <input type="text" class="form-control" name="nghenghiep" id="validationCustom02" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">ngày cấp thẻ</label>
                        <input type="text" class="form-control" name="ngaycapthe" id="validationCustom02" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">ngày hết hạn</label>
                        <input type="text" class="form-control" name="ngayhethan" id="validationCustom02" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">địa chỉ</label>
                        <input type="text" class="form-control" name="diachi" id="validationCustom02" value="" required>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" name="submit" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>