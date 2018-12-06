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
                                    <h3>All Customers</h3>
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
                        <div class="table-responsive advance-table">
                            <table id="button_datatables_example" class="table display table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th> Customer Name</th>
                                    <th> Customer Email</th>
                                    <th> Customer Mobile</th>
                                    <th> Customer Address</th>
                                    <th> Customer Status</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $i = 1;
                                $detail = $this->Admin_model->customersList();

                                foreach ($detail as $cust) {
                                    

                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $cust->cust_full_name; ?></td>
                                        <td><?php echo $cust->cust_email;; ?></td>
                                        <td><?php echo $cust->cust_contact;; ?></td>
                                        <td><?php echo $cust->cust_address;; ?></td>
                                        <td><?php echo $cust->cust_status == 1 ? 'Enable' : 'Disable'; ?></td>

                                        <td>
                                           
                                            <?php
                                            if ($cust->cust_status == '0') {
                                                ?>
                                                <a class="btn btn-sm btn-danger" title="Enable"
                                                   href="<?php echo admin_url() . 'customers/customersenabledisable/' . $cust->cust_id . '/1'; ?>"><i
                                                            class="fa fa-eye-slash btn-danger"></i></a>
                                                <?php
                                            } else {
                                                ?>
                                                <a class="btn btn-sm btn-success" title="Disable"
                                                   href="<?php echo admin_url() . 'customers/customersenabledisable/' . $cust->cust_id . '/0'; ?>"><i
                                                            class="fa fa-eye"></i></a>
                                                <?php
                                            } ?>


                                          

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
    </script>
