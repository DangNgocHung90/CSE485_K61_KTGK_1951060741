<?php
require 'view/template/header.php';
//file hiển thị thông báo lỗi
require_once 'view/commons/message.php';
?>
<main>
    <div class="container">
        <div class="row">
            <div class="">
                <p><?php echo isset($_GET['tt']) ? $_GET['tt'] : ''?></p>
            </div>
            <a href="index.php?controller=blooddonor&action=index" class="text-decoration-none"><i class="bi bi-arrow-left"></i>  Quay Lại</a>
            <div class="col-md-12 d-flex justify-content-center mb-3">
                <h3>Danh Sách Chi Tiết Ngân Hàng Máu</h3>
            </div>
            <div class="col-md-12 mb-3">
                <a href="index.php?controller=blooddonor&action=add"><button class="btn btn-primary">Thêm người hiến máu</button></a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã người hiến máu</th>
                            <th scope="col">Tên người hiến máu</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Năm sinh</th>
                            <th scope="col">Nhóm máu</th>
                            <th scope="col">Ngày đăng ký hiến máu</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($bdonor as $bd) {
                            $urlEdit =
                            "index.php?controller=blooddonor&action=edit&bdid=" . $bd['bd_id'];
                            $urlDelete =
                            "index.php?controller=blooddonor&action=delete&bdid=" . $bd['bd_id'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $bd['bd_id'] ?></th>
                                <td><?php echo $bd['bd_name'] ?></td>
                                <td><?php echo $bd['bd_sex'] ?></td>
                                <td><?php echo $bd['bd_age'] ?></td>
                                <td><?php echo $bd['bd_bgroup'] ?></td>
                                <td><?php echo $bd['bd_reg_date'] ?></td>
                                <td><?php echo $bd['bd_phno'] ?></td>
                                <td><a href="<?php echo $urlEdit ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="<?php echo $urlDelete ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>