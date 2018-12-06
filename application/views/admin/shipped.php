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
                                    <h3>All Shipped Orders</h3>
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
                                                            <!--  <a href="<?php echo admin_url(); ?>catalog/addcategories">  <button class="btn btn-info">
                                                                   Add New <i class="fa fa-plus"></i>
                                                               </button></a> -->
                                                           </div>
                           </div>
                           
                           <div class="table-responsive advance-table">
                               <table id="product-order" class="table table-hover">
                                 <thead>
                                    <tr>
                                       
                                       <th>Order ID</th>
                                       <th>Customer</th>
                                       <th>Title</th>
                                       <th>Quantity</th>
                                       <th>date</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php


$status = 'shipped';
$detail= $this->Admin_model->orderList($status);

foreach($detail as $order)
{


?>
                                    <tr>
                                      
                                       <td><?php echo $order->order_id; ?></td>
                                       <td><?php echo $order->o_cust_name; ?></td>
                                       <td><?php echo $order->order_item; ?></td>
                                       <td><?php  echo $order->order_quantity; ?></td>
                                       <td><?php echo $order->date_added; ?></td>
                                       <td>
                                      
                                       <?php if($order->o_payment_method==''){ ?>
                                          <span class="label label-success">paid</span>
                                       <?php } else { ?>
                                       
                                        <span class="label label-danger">Unpaid</span>
                                       
                                      <?php  } ?>
                                       </td>
                                       <td>
                                       <a class="btn btn-sm btn-info" title="Deliver"
                                                   href="<?php echo admin_url() . 'sales/orderStatus/' . $order->order_id.'/delivered/shipped'; ?>"><i
                                                            class="fa fa-eye-slash btn-warning"></i></a>
                                        <a class="btn btn-sm btn-warning" title="Cancel"
                                                   href="<?php echo admin_url() . 'sales/orderStatus/' . $order->order_id.'/cancelled/shipped'; ?>"><i
                                                            class="fa fa-eye-slash btn-danger"></i></a>
                                       </td>
                                    </tr>
                                    <?php } ?>
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