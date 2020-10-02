<?php include_once("mvc/views/include/header.php") ?>

    <!-- Logo Header -->
<?php include_once("mvc/views/include/logo.php") ?>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
<?php include_once("mvc/views/include/nav.php") ?>
    <!-- End Navbar -->


    <!-- Sidebar -->
<?php include_once("mvc/views/include/sidebar.php") ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Danh sách users</h4>
                                    <button class="btn btn-primary btn-round ml-auto newUser" data-toggle="modal"
                                            data-target="#create">
                                        <i class="fa fa-plus"></i>
                                        &nbsp&nbsp&nbspThêm user
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Modal -->
                                <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header no-bd">
                                                <h5 class="modal-title">
														<span class="fw-mediumbold">
														Thêm mới</span>
                                                    <span class="fw-light">
															người dùng
														</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="small">Thông tin người dùng</p>
                                                <form role="form" id="createFrom" method="post"
                                                      enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Name</label>
                                                                <input id="addName" type="text" name="fullname"
                                                                       class="form-control aname"
                                                                       placeholder="Nhập họ & tên">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pr-0">
                                                            <div class="form-group form-group-default">
                                                                <label>Email</label>
                                                                <input id="addEmail" type="text" name="email"
                                                                       class="form-control aemail"
                                                                       placeholder="Nhập email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Phone</label>
                                                                <input id="addPhone" type="text" name="phone"
                                                                       class="form-control aphone"
                                                                       placeholder="Nhập số điện thoại">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Image</label>
                                                                <input id="addImage" type="file" name="image"
                                                                       class="form-control aimage">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer no-bd">
                                                        <input type="submit" class="btn btn-primary btncreate"
                                                               value="Xác nhận">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Image</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php

                                        foreach ($data as $user => $key): ?>
                                            <tr>
                                                <td><?php echo $user + 1 ?></td>
                                                <td><?php echo $key['fullname'] ?></td>
                                                <td><?php echo $key['email'] ?></td>
                                                <td><?php echo $key['phone'] ?></td>
                                                <td>

                                                    <?php
                                                    if ($key['image']) { ?>
                                                        <img class="img-fluid img-thumbnail" src="public/library/upload/<?php echo $key['image']; ?>"
                                                             width="100px" height="100px">
                                                    <?php } else { ?>
                                                        <img class="img-fluid img-thumbnail" src="public/library/img/default.png"
                                                             width="100px" height="100px">
                                                    <?php }

                                                    ?>
                                                </td>

                                                <td>
                                                    <div class="form-button-action">
                                                        <button type="button" name="edit"
                                                                title=" Sửa <?php echo $key['fullname'] ?> "
                                                                class="btn btn-link btn-primary btn-lg showUser"
                                                                data-id="<?php echo $key['ID'] ?>"
                                                                data-toggle="modal" data-target="#editU"
                                                                data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" name="delete"
                                                                title="Xoá <?php echo $key['fullname'] ?>"
                                                                class="btn btn-link btn-danger delUser"
                                                                data-id="<?php echo $key['ID'] ?>"
                                                                data-toggle="modal" data-target="#delete"
                                                                data-original-title="Remove">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal fade" id="editU" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">Chỉnh</span>
                                                <span class="fw-light">sửa</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small"></p>
                                            <form method="post" id="updateUser"
                                                  enctype="multipart/form-data">
                                                <div class="row">
                                                    <input type="hidden" name="ID" class="ID">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Name</label>
                                                            <input id="" type="text" name="fullname"
                                                                   class="form-control sname" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Email</label>
                                                            <input id="" type="text" name="email"
                                                                   class="form-control semail">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Phone</label>
                                                            <input id="" type="text" name="phone"
                                                                   class="form-control sphone">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <img src="" style=" height: 150px" class="img-thumbnail imageThu">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>image</label>
                                                            <input id="" type="file" name="image"
                                                                   class="form-control simage">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <input type="submit" class="btn btn-success"
                                                           value="Xác nhận">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        Đóng
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">Xoá người dùng</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Bạn muốn xoá người dùng này ?</p>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="button" class="btn btn-success delete">Có</button>
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Không
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once("mvc/views/include/footer.php") ?>