<?php
$this->load->view("admin/include/header");
?>
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
                            <div class="col-md-12 col-sm-12">
                                <div class="seipkon-breadcromb-left">
                                    <h3>All Products
                                        <div class="btn-group pull-right">
                                            <a href="<?php echo admin_url(); ?>products/add"> <button class="btn btn-info"> Add New <i class="fa fa-plus"></i></button></a>
                                        </div>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="seipkon-breadcromb-right"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcromb Row -->
            <!-- End Advance Table Row -->
            <!-- Advance Table Row Start -->
    <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Success!</strong>
    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } else if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-block alert-danger">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong>
    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php } ?>
<div class="row">
    <div class="col-md-12">
        <div class="page-box">
            <div class="table-responsive advance-table">
                <table id="button_datatables_example" class="table display table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Category </th>
                            <th> Product Name </th>
                            <th> Product Code</th>
                            <th> Price </th>
                            <th> Price<br/> After Disc.</th>
                            <th>Tax</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Featured</th>
                            <th>Best Selling</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
<?php
$i = 1;
foreach ($products as $pro) {
?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $pro->ctg_name; ?></td>
        <td><?php echo $pro->pro_name; ?></td>
        <td><?php echo $pro->pro_code; ?></td>
        <td><?php echo $pro->pro_price; ?></td>
        <td><?php echo $pro->after_discount_price; ?></td>
        <td><?php echo $pro->pro_tax; ?></td>
        <td><?php echo $pro->pro_color; ?></td>
        <td><?php echo $pro->pro_size; ?></td>
        <td><?php echo ($pro->pro_feature_product==1) ? "Yes" : "No"; ?></td>
        <td><?php echo ($pro->pro_best_selling==1) ? "Yes" : "No"; ?></td>
        <td><?php echo ($pro->pro_status == 1) ? 'Enable' : 'Disable'; ?></td>
        <td><img src="<?php echo $image_url . $pro->pro_image; ?>" alt="product image" width="16" onerror="this.src='<?php echo base_url("assets/images/noimage.jpg")?>'" /></td>
        <td>
        <a href="<?php echo admin_url() . 'products/edit/' . $pro->pro_id; ?>" class="product-table-info" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
<?php
if ($pro->pro_status == '0') {
?>
<a class="btn btn-sm btn-danger" title="Enable" href="<?php echo admin_url() . 'catalog/productenabledisable/' . $pro->pro_id . '/1'; ?>" >
    <i class="fa fa-eye-slash btn-danger"></i>
</a>
<?php
} else {
?>
<a class="btn btn-sm btn-success" title="Disable" href="<?php echo admin_url() . 'catalog/productenabledisable/' . $pro->pro_id . '/0'; ?>" ><i class="fa fa-eye"></i></a>
<?php } ?>
<a href="<?php echo admin_url() . 'products/delete/' . $pro->pro_id;?>" onclick="return confirm('Are you sure to perform this action?');" class="product-table-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
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
<?php
$this->load->view("admin/include/footer_fm");
?>
<script>
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
