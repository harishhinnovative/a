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
                                    <h3>Pages Listing
                                        <div class="btn-group pull-right">
                                            <a href="<?php echo admin_url(); ?>cms/add"> <button class="btn btn-info"> Add New <i class="fa fa-plus"></i></button></a>
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
                            <th>Page title</th>
                            <th>Page Content</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
<?php
$i = 1;
if(count($results)) {
  foreach ($results as $row) {
?>
    <tr>
        <td><?php echo $rowSerialNumber+$i; ?></td>
        <td><?php echo $row->title; ?></td>
        <td><?php echo $row->description; ?></td>
        <td><?php echo ($row->status == 1) ? 'Enable' : 'Disable'; ?></td>
        <td><img src="<?php echo $image_url ."/{$row->sid}/thumb/". $row->imagename; ?>" alt="cms image" width="16" onerror="this.src='<?php echo base_url("assets/images/noimage.jpg")?>'" /></td>
        <td>
        <a href="<?php echo admin_url() . 'cms/edit/' . $row->sid; ?>" class="product-table-info" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
<?php
if ($row->status == 0) {
?>
<a class="btn btn-sm btn-danger" title="Enable" href="<?php echo admin_url() . 'cms/enabledisable/' . $row->sid . '/1'; ?>"
   onclick="return confirm('Are you sure to perform this action?');" ><i class="fa fa-eye-slash btn-danger"></i></a>
<?php
} else {
?>
<a class="btn btn-sm btn-success" title="Disable" href="<?php echo admin_url() . 'cms/enabledisable/' . $row->sid . '/0'; ?>"
  onclick="return confirm('Are you sure to perform this action?');"  ><i class="fa fa-eye"></i></a>
<?php } ?>
<a href="<?php echo admin_url() . 'cms/delete/' . $row->sid;?>" onclick="return confirm('Are you sure to perform this action?');" class="product-table-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
    <?php
    $i++;
    }
} else {
    ?>
    <tr><td colspan="15">No records found.</td></tr>
    <?php
}
    ?>
</tbody>
</table>
<div class="bottom_pagination">
    <?php echo $links;?>
</div>
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
