<?php
require 'view/template/header.php'
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mb-3">
                <h3>Danh Sách Chi Tiết Ngân Hàng Máu</h3>
            </div>
            <div class="col-md-12 mb-3">
                <a href="index.php?controller=blooddonor&action=admin"><button class="btn btn-primary">Xem chi tiết</button></a>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($bdonor as $bd) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $bd['bd_id'] ?></th>
                                <td><?php echo $bd['bd_name'] ?></td>
                                <td><?php echo $bd['bd_sex'] ?></td>
                                <td><?php echo $bd['bd_age'] ?></td>
                                <td><?php echo $bd['bd_bgroup'] ?></td>
                                <td><?php echo $bd['bd_reg_date'] ?></td>
                                <td><?php echo $bd['bd_phno'] ?></td>
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