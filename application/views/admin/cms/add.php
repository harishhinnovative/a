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
                            <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-left">
                                     <h3><?php echo (!empty($cms->sid)) ? "Edit" : "Add"?> Cms Page</h3>
                                </div> 
                            </div>
                            <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                   <ul>
                                      <li><a href="<?php echo admin_url()?>">home</a></li>
                                      <li><a href="<?php echo admin_url(). "cms";?>">Cms Pages</a></li>
                                      <li><?php echo (!empty($cms->sid)) ? "Edit" : "Add"?> New Page</li>
                                   </ul>
                                </div> 
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
                <div class="col-md-12 col-sm-12">
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
                        <h3>Page Info</h3>

<form method="post" action="" enctype="multipart/form-data" data-parsley-validate >
    <div class="row">
        <div class="col-md-4">
            <p>
                <label>Page Title</label>
                <input type="text" name="title" placeholder="Enter Category Name" required="" value="<?php echo isset($cms->title) ? $cms->title :"";?>" />
            </p>
        </div>
        <div class="col-md-4">
            <p>
                <label>Image</label>
                <input type="file" name="imagefile" <?php echo !empty($cms->sid) ? "" :'required=""';?> />
                <?php
                if(!empty($cms->sid)) {
                ?>
                <div class="col-md-3" style="padding: 5px;">
                    <img src="<?php echo base_url("uploads/cms/{$cms->sid}/{$cms->imagename}");?>" width="128" />
                </div>
                <?php } ?>
            </p>
        </div>
        <div class="col-md-4">
            <p>
                <label>Status</label>
                <select class="form-control" name="status" required>
                    <option value=""> Select..</option>
                    <option value="1" <?php echo (isset($cms->status) && ($cms->status==1)) ? 'selected=""' :'';?> >Enable</option>
                    <option value="0" <?php echo (isset($cms->status) && ($cms->status==0)) ? 'selected=""' :'';?> >Disable</option>
                </select>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>
                <label>Category Description</label>
                <textarea name="description" placeholder="Write Category Description Here" required=""><?php echo isset($cms->description) ? $cms->description :"";?></textarea>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>
                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save Info</button>
                <a class="btn btn-danger" href="<?php echo admin_url(). "cms";?>"> <i class="fa fa-times"></i> Cancel </a>
            </p>
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

          
