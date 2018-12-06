<?php include('include/header.php'); ?>

<!-- End Sidebar -->

<!-- Right Side Content Start -->
<section id="content" class="seipkon-content-wrapper">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Breadcromb Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb-area">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="seipkon-breadcromb-left">
                                    <h3>All Categories</h3>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="seipkon-breadcromb-right">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcromb Row -->

            <!-- End Advance Table Row -->

            <!-- Advance Table Row Start -->
            <?php

            if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                    <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } else if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-block alert-danger">
                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="page-box">
                        <div class="datatables-example-heading">
                            <div class="btn-group">
                                <a href="<?php echo admin_url(); ?>catalog/addcategories">
                                    <button class="btn btn-info">
                                        Add New <i class="fa fa-plus"></i>
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive advance-table">
                            <table id="button_datatables_example" class="table display table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th> Category Name</th>
                                    <th> Category Products Count</th>
                                    <th> Category Status</th>
                                    <th> Category Image</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $i = 1;
                                $detail = $this->Admin_model->categorylist();

                                foreach ($detail as $cat) {
                                    $pro_count = $this->Admin_model->productcountbycatid($cat->ctg_id);

                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $cat->ctg_name; ?></td>
                                        <td><?php echo $pro_count; ?></td>
                                        <td><?php echo $cat->ctg_status == 1 ? 'Enable' : 'Disable'; ?></td>
                                        <td><img src="<?php echo base_url("uploads/category/{$cat->ctg_image}"); ?>" width="60" /></td>

                                        <td>
                                            <a href="<?php echo admin_url() . 'catalog/categoryedit/' . $cat->ctg_id; ?>"
                                               class="product-table-info" data-toggle="tooltip" title="Edit"><i
                                                        class="fa fa-pencil"></i></a>
                                            <?php
                                            if ($cat->ctg_status == '0') {
                                                ?>
                                                <a class="btn btn-sm btn-danger" title="Enable"
                                                   href="<?php echo admin_url() . 'catalog/categoryenabledisable/' . $cat->ctg_id . '/1'; ?>"><i
                                                            class="fa fa-eye-slash btn-danger"></i></a>
                                                <?php
                                            } else {
                                                ?>
                                                <a class="btn btn-sm btn-success" title="Disable"
                                                   href="<?php echo admin_url() . 'catalog/categoryenabledisable/' . $cat->ctg_id . '/0'; ?>"><i
                                                            class="fa fa-eye"></i></a>
                                                <?php
                                            } ?>


                                            <a href="javascript:;" onclick="del_cat(<?php echo $cat->ctg_id; ?>)"
                                               class="product-table-danger" data-toggle="tooltip" title="Delete"><i
                                                        class="fa fa-trash"></i></a>

                                        </td>

                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Advance Table Row -->


        </div>
    </div>

    <!-- Footer Area Start -->

    <?php include('include/footer_dt.php'); ?>

    <script type="text/javascript">

        $(document).ready(function () {

            setTimeout(function () {
                $(".alert").hide();
            }, 5000);
        });


        function del_cat(cat_id) {


            var result = confirm('Do you really want to delete ?');

            if (result == true) {


                $.ajax({

                    type: "GET",
                    url: "<?php echo admin_url(); ?>catalog/categorydelete/" + cat_id,

                    success: function (result) {
                        console.log(result);

                        location.reload();

                    },
                    error: function (err) {
                        console.log(err);
                    }
                });

            }


        }

    </script>
