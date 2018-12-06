<!DOCTYPE html>
<html lang="en">
 
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
 
      <meta name="author" content="Themescare">
      <!-- Title -->
      <title> Admin </title>
      <!-- Favicon -->
      <link rel="icon" type="image/png" sizes="32x32" href="<?php echo admin_asset_url(); ?>assets/img/favicon/favicon-32x32.png">
      <!-- Animate CSS -->
      <link rel="stylesheet" href="<?php echo admin_asset_url(); ?>assets/css/animate.min.css">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?php echo admin_asset_url(); ?>assets/plugins/bootstrap/bootstrap.min.css">
      <!-- Font awesome CSS -->
      <link rel="stylesheet" href="<?php echo admin_asset_url(); ?>assets/plugins/font-awesome/font-awesome.min.css">
      <!-- Themify Icon CSS -->
      <link rel="stylesheet" href="<?php echo admin_asset_url(); ?>assets/plugins/themify-icons/themify-icons.css">
      <!-- Perfect Scrollbar CSS -->
      <link rel="stylesheet" href="<?php echo admin_asset_url(); ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.css">
      <!-- Jvector CSS -->
      <link rel="stylesheet" href="<?php echo admin_asset_url(); ?>assets/plugins/jvector/css/jquery-jvectormap.css">
      <!-- Daterange CSS -->
      <link rel="stylesheet" href="<?php echo admin_asset_url(); ?>assets/plugins/daterangepicker/css/daterangepicker.css">
      <!-- Bootstrap-select CSS -->
      <link rel="stylesheet" href="<?php echo admin_asset_url(); ?>assets/plugins/bootstrap-select/css/bootstrap-select.min.css">
      <!-- Summernote CSS -->
      <link rel="stylesheet" href="<?php echo admin_asset_url(); ?>assets/plugins/summernote/css/summernote.css">
      <!-- Main CSS -->
      <link rel="stylesheet" href="<?php echo admin_asset_url(); ?>assets/css/seipkon.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="<?php echo admin_asset_url(); ?>assets/css/responsive.css">
   </head>
   <body>
       
      <!-- Start Page Loading -->
      <div id="loader-wrapper">
         <div id="loader"></div>
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
      <!-- End Page Loading -->
       
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Main Header Start -->
         <header class="main-header">
             
            <!-- Logo Start -->
            <div class="seipkon-logo">
               <a href="index-2.html">
               <img src="<?php echo logo_url(); ?>" alt="logo">
               </a>
            </div>
            <!-- Logo End -->
             
            <!-- Header Top Start -->
            <nav class="navbar navbar-default">
               <div class="container-fluid">
                  <div class="header-top-section">
                     <div class="pull-left">
                         
                        <!-- Collapse Menu Btn Start -->
                        <button type="button" id="sidebarCollapse" class=" navbar-btn">
                        <i class="fa fa-bars"></i>
                        </button>
                        <!-- Collapse Menu Btn End -->
                         
                        <!-- Header Top Search Start -->
                        <div class="header-top-search">
                           <form>
                              <input type="search" placeholder="Search..." >
                              <button type="submit" ><i class="fa fa-search"></i></button>
                           </form>
                        </div>
                        <!-- Header Top Search End -->
                         
                     </div>
                     <div class="header-top-right-section pull-right">
                        <ul class="nav nav-pills nav-top navbar-right">
                            
                           <!-- Full Screen Btn Start -->
                           <li>
                              <a href="#"  id="fullscreen-button">
                              <i class="fa fa-arrows-alt"></i>
                              </a>
                           </li>
                          
                            
                            
                           <!-- Profile Toggle Start -->
                           <li class="dropdown">
                              <a class="dropdown-toggle profile-toggle" href="#" data-toggle="dropdown">
                                 <img src="<?php echo admin_asset_url(); ?>assets/img/profile/<?php print_r($this->session->userdata['img']); ?>" class="profile-avator" alt="admin profile" />
                                 <div class="profile-avatar-txt">
                                    <p><?php print_r($this->session->userdata['username']); ?></p>
                                    <i class="fa fa-angle-down"></i>
                                 </div>
                              </a>
                              <div class="profile-box dropdown-menu animated bounceIn">
                                 <ul>
                                    <li><a href="<?php echo admin_url(); ?>Admin_profile/adminProfile"><i class="fa fa-user"></i> view profile</a></li>
                                    <li><a href="<?php echo admin_url(); ?>Admin_profile/changePassword"><i class="fa fa-flash"></i> Change Password</a></li>
                                    <li><a href="#"><i class="fa fa-wrench"></i> Setting</a></li>
                                    <li><a href="<?php echo admin_url(); ?>logout"><i class="fa fa-power-off"></i> sign out</a></li>
                                 </ul>
                              </div>
                           </li>
                           <!-- Profile Toggle End -->
                            
                        </ul>
                     </div>
                  </div>
               </div>
            </nav>
            <!-- Header Top End -->
             
         </header>

         <!-- Sidebar Start -->
         <aside class="seipkon-main-sidebar">
            <nav id="sidebar">
               <!-- Sidebar Profile Start -->
               <div class="sidebar-profile clearfix">
                  <div class="profile-avatar">
                     <img src="<?php echo admin_asset_url(); ?>assets/img/profile/<?php print_r($this->session->userdata['img']); ?>" alt="profile" />
                  </div>
                  <div class="profile-info">
                     <h3><?php print_r($this->session->userdata['username']); ?></h3>
                     <p>Welcome Admin !</p>
                  </div>
               </div>
               <!-- Sidebar Profile End -->
                
               <!-- Menu Section Start -->
               <div class="menu-section">
                  <h3>General</h3>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="<?php echo admin_url(); ?>">
                        <i class="fa fa-dashboard"></i>
                        Dashboard
                        </a>
                     </li>
                     <li>
                        <a href="#ecommerce" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-shopping-cart"></i>
                       Catalog
                        </a>
                       <ul class="collapse list-unstyled" id="ecommerce">
                                   <li class="nav-item  ">
                                       <a href="<?php echo admin_url(); ?>catalog/categories" class="nav-link ">
                                           <span class="title">Categories</span>
                                       </a>
                                   </li>
                                   <li class="nav-item  ">
                                       <a href="<?php echo admin_url(); ?>catalog/products" class="nav-link ">
                                           <span class="title">Products</span>
                                       </a>
                                   </li>
                                   
                               </ul>
                     </li>
                 
                    
                  </ul>
               </div>
               <!-- Menu Section End -->
                
               <!-- Menu Section Start -->
               <div class="menu-section">
                 
                  <ul class="list-unstyled components">
                    
                     <li>
                        <a href="#forms" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-edit"></i>
                        Sales
                        </a>
                        <ul class="collapse list-unstyled" id="forms">
                            <li class="nav-item  ">
                                       <a href="<?php echo admin_url(); ?>sales/viewSalesPages/orders" class="nav-link ">
                                           <span class="title">Orders</span>
                                       </a>
                                   </li>
                                   <li class="nav-item  ">
                                       <a href="<?php echo admin_url(); ?>sales/viewSalesPages/shipped" class="nav-link ">
                                           <span class="title">Shipped</span>
                                       </a>
                                   </li>
                            <li class="nav-item  ">
                                       <a href="<?php echo admin_url(); ?>sales/viewSalesPages/delivered" class="nav-link ">
                                           <span class="title">Delivered</span>
                                       </a>
                                   </li>
                             <li class="nav-item  ">
                                       <a href="<?php echo admin_url(); ?>sales/viewSalesPages/cancelled" class="nav-link ">
                                           <span class="title">Cancelled</span>
                                       </a>
                                   </li>
                        </ul>
                     </li>
                
                   <li>
                   <a href="<?php echo admin_url(); ?>customers/customers" class="nav-link ">
                   <i class="fa fa-users"></i> Customers
                                       </a>
                           
                     </li>
                     <?php if($this->session->userdata['role']=='admin'){ ?>
                     <li>
                           
                           <a href="<?php echo admin_url(); ?>Admin_profile/users" class="nav-link ">
                             <i class="fa fa-users"></i> Users
                           </a>
                     </li>
                     <?php } ?>
                      <li>
                           <a href="<?php echo admin_url(); ?>logout"><i class="fa fa-sign-out"></i> Logout</a>
                     </li>
                     
                  </ul>
               </div>
               <!-- Menu Section End -->
                
            
               <!-- Menu Section End -->
                
            </nav>
         </aside>
         <!-- End Sidebar -->
       