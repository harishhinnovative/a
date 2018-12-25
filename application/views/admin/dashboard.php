<?php
$this->load->view("admin/include/header");
?>
          
         <!-- Right Side Content Start -->
         <section id="content" class="seipkon-content-wrapper">
            <div class="page-content">
               <div class="container-fluid">
                   
                  <!-- Breadcromb Row Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="breadcromb-area">
                           <div class="row">
                              <div class="col-md-6  col-sm-6">
                                 <div class="seipkon-breadcromb-left">
                                    <h3>Dashboard</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                      <li><a href="<?php echo admin_url()?>">home</a></li>
                                       <li>dashboard</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   
                  <!-- Widget Row Start -->
                  <div class="row">
                     <div class="col-md-3">
                        <div id="clock" class="widget_card alert">
                           <div class="widget_card_header">
                             
                           </div>
                           <div class="widget_card_body">
                              <p class="date">{{ date }}</p>
                              <h3 class="time">{{ time }}</h3>
                           </div>
                        </div>
                     </div>
                     <!-- End Col -->
                     <div class="col-md-3">
                        <div id="widget_visitor" class="widget_card alert">
                           <div class="widget_card_header">
                            
                           </div>
                           <div class="widget_card_body">
                              <div class="widget_icon">
                                 <i class="fa fa-eye"></i>
                              </div>
                              <div class="widget_text">
                                 <h3 class="count"><?php echo count($this->Admin_model->orderList('')); ?></h3>
                                 <p>Total Orders</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Col -->
                     <div class="col-md-3">
                        <div id="widget_user" class="widget_card alert">
                           <div class="widget_card_header">
                            
                           </div>
                           <div class="widget_card_body">
                              <div class="widget_icon">
                                 <i class="fa fa-users"></i>
                              </div>
                              <div class="widget_text">
                                 <h3 class="count"><?php echo count($this->Admin_model->customersList()); ?></h3>
                                 <p>Registred Customer</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Col -->
                     <div class="col-md-3">
                        <div id="widget_profits" class="widget_card alert">
                           <div class="widget_card_header">
                             
                           </div>
                           <div class="widget_card_body">
                              <div class="widget_icon">
                                 <i class="fa fa-flask"></i>
                              </div>
                              <div class="widget_text">
                                 <h3>Rs. <span><?php  print_r($this->Admin_model->orderTotal()[0]->total); ?></span></h3>
                                 <p>Total Sale</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Col -->
                  </div>
               </div>
            </div>
             
            <!-- Footer Area Start -->
<?php
$this->load->view("admin/include/footer");
?>
