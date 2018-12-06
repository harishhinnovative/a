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
                                   <h3>All users</h3>
                                </div> 
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <!-- <div class="seipkon-breadcromb-right">
                                   <ul>
                                      <li><a href="index-2.html">home</a></li>
                                      <li>forms</li>
                                      <li>form validation</li>
                                   </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcromb Row -->

            <!-- Validation Form Row Start -->

            <div class="row">
                <div class="col-md-12">
                    <div class="page-box">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="add-product-form-group">
                                    <?php

                                    if ($this->session->flashdata('success')) { ?>
                                        <div class="alert alert-block alert-success">
                                            <button type="button" class="close" data-dismiss="alert"><i
                                                        class="icon-remove"></i></button>
                                            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                                        </div>
                                    <?php } else if ($this->session->flashdata('error')) { ?>
                                        <div class="alert alert-block alert-danger">
                                            <button type="button" class="close" data-dismiss="alert"><i
                                                        class="icon-remove"></i></button>
                                            <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                                        </div>
                                    <?php } ?>
                                    <h3>Sub User Profile</h3>
                                    <form method="post" action="<?php echo admin_url(); ?>Admin_profile/subUserProfile"
                                          enctype="multipart/form-data">
                                       

                                            <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    <label>User Name</label>
                                                    <input type="text" name="sub_name"
                                                           placeholder="Enter User Name">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    <label>User Password</label>
                                                    <input type="password" name="sub_password"  placeholder="Enter User Password">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    <label>Confirm User Password</label>
                                                    <input type="text" name="sub_conPassword" 
                                                     placeholder="Confirm User Password">
                                                           <span id='message'></span>
                                                </p>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    <label>User Mobile No.</label>
                                                    <input type="text" name="sub_mobile"
                                                          placeholder="Enter User Mobile">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    <label>Role Type</label>
                                                    <select class="form-control" name="sub_role" required>
                                                    <option  value="subAdmin">Sub Admin</option>
                                                        <option  value="admin">Admin</option>
                                                        

                                                    </select>
                                                </p>
                                            </div>

                                        </div>
                                
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    <label>Status</label>
                                                    <select class="form-control" name="sub_status" required>

                                                        <option  value="1">Enable</option>
                                                        <option  value="0">Disable</option>

                                                    </select>
                                                </p>
                                            </div>

                                        </div>

                                      
                                        <div class="row">
                                            <input type="hidden"  name="sub_id">
                                            <input type="hidden" name="sub_image1" value="user.png">
                                            <div class="col-md-12">
                                                <p>
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-check"></i>
                                                        Save Info
                                                    </button>
                                                    <button type="button" class="btn btn-danger">
                                                        <i class="fa fa-times"></i>
                                                        Cancel
                                                    </button>
                                                </p>
                                            </div>
                                        </div>

                                
                            </div></div>
                            <div class="col-md-6 col-sm-6">
                                <div class="add-product-image-upload">
                                    <h3>User Image</h3>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="product-upload-image">
                                                <img id="catImg"
                                                     src="<?php echo admin_asset_url(); ?>assets/img/profile/user.png"
                                                     alt="image" style="height:  280px;"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="product-upload-action">
                                                <div class="product-upload btn btn-info">
                                                    <p>
                                                        <i class="fa fa-upload"></i>
                                                        Upload Another Image
                                                    </p>
                                                    <input type='file' name="sub_image" onchange="readURL(this);"/>

                                                </div>
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                    Delete Image
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Validation Form Row -->

        </div>
    </div>

    <!-- Footer Area Start -->
    <?php include('include/footer_fm.php'); ?>
    <script>
var check = function() {
    if (document.getElementById('sub_password').value ==
    document.getElementById('sub_conPassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password Matched';
    document.getElementById('submit').disabled = false;
    }
   else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = "Password didn't Match";
    document.getElementById('submit').disabled = true;
  }
}
        $(document).ready(function () {

            setTimeout(function () {
                $(".alert").hide();
            }, 5000);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#catImg')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

          
