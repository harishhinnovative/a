<?php
$pagename = "";
?>
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
                <li class="">
                    <a href="<?php echo admin_url(). "dashboard"; ?>">
                        <i class="fa fa-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li class="active expander">
                    <a href="#ecommerce" data-toggle="collapse"
                       <?php if(($pagename=="products") || ($pagename=="category")) {?>
                       aria-expanded="true"
                       class=""
                       <?php } ?>
                       ><i class="fa fa-shopping-cart"></i>Catalog</a>

                    <ul
                       <?php if(($pagename=="products") || ($pagename=="category")) {?>
                        class="collapse list-unstyled"
                       <?php } else { ?>
                        class="list-unstyled collapse in"
                       <?php } ?>
                        id="ecommerce">
                        <li class="nav-item active">
                            <a href="<?php echo admin_url(); ?>category" class="nav-link active">
                                <span class="title">Categories</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo admin_url(); ?>products" class="nav-link ">
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
                <?php if ($this->session->userdata['role'] == 'admin') { ?>
                    <li>
                        <a href="<?php echo admin_url(); ?>Admin_profile/users" class="nav-link ">
                            <i class="fa fa-users"></i> Users
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo admin_url(); ?>cms" class="nav-link">
                            <i class="fa fa-file"></i> Cms Pages
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
