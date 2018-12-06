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
                                 <!-- <div class="seipkon-breadcromb-left">
                                    <h3>form validation</h3>
                                 </div> -->
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

if($this->session->flashdata('success')){ ?>
<div class="alert alert-block alert-success">
    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
    <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
</div>
<?php }else if($this->session->flashdata('error')){  ?>
<div class="alert alert-block alert-danger">
    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
    <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
</div>
<?php } ?>
                                    <h3>Category Info</h3>
                                    <form method="post" action="<?php echo admin_url(); ?>Admin_profile/updatePassword" enctype="multipart/form-data" data-parsley-validate >
                                       <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <label>Current Password</label>
                                                <input type="text" name="curr_pass" placeholder="Enter Current Password" required>
                                             </p>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <label>New Password</label>
                                                <input type="password" name="new_pass" placeholder="Enter New Password" required>
                                             </p>
                                          </div>
                                       </div>

                                       <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <label>Confirm New Password</label>
                                                <input type="password" name="con_pass" placeholder="Enter Confirm New Password" required>
                                             </p>
                                          </div>
                                       </div>



                                      
                                 
                                       <div class="row">
                                          <div class="col-md-12">
                                             <p>
                                                <button type="submit" class="btn btn-success" >
                                                <i class="fa fa-check"></i>
                                                Save Info
                                                </button>
                                                <button type="button" class="btn btn-danger" >
                                                <i class="fa fa-times"></i>
                                                Cancel
                                                </button>
                                             </p>
                                          </div>
                                       </div>
                                   
                                 </div>
                              </div>
                             </form>
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
            
     $(document).ready(function(){

setTimeout(function(){ $(".alert").hide(); }, 5000);
});
            </script>

          
