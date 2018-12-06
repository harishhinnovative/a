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
                                    <h3>All Cancelled Orders</h3>
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
                                       <!-- <th>Status</th> -->
                                       
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php


$status = 'cancelled';
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
