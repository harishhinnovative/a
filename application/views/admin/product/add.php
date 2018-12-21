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
                                   <h3>Add Product</h3>
                                </div> 
                            </div>
                            <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                   <ul>
                                      <li><a href="<?php echo admin_url()?>">home</a></li>
                                      <li><a href="<?php echo admin_url(). "products";?>">Products</a></li>
                                      <li>Add New Product</li>
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
                        <h3>Product Info</h3>

<form method="post" action="" enctype="multipart/form-data" data-parsley-validate >
    <div class="row">
        <div class="col-md-3">
            <p>
                <label>Category</label>
                <select class="form-control" name="pro_ctg_id" required>
                    <option value="">--SELECT--</option>
                    <?php
                    if(count($categories)) {
                      foreach ($categories as $cat) {
                      ?>
                        <option value="<?php echo $cat->ctg_id; ?>"><?php echo $cat->ctg_name; ?></option>
                    <?php
                      }
                    } ?>
                </select>
            </p>
        </div>
        <div class="col-md-3">
            <p>
                <label>Product Name</label>
                <input type="text" name="pro_name" placeholder="Enter Product Name" required="" />
            </p>
        </div>
        <div class="col-md-3">
            <p>
                <label>Product Code</label>
                <input type="text" name="pro_code" placeholder="Enter Product Code" required="" />
            </p>
        </div>
        <div class="col-md-3">
            <p>
                <label>Product Modal</label>
                <input type="text" name="pro_modal_no" placeholder="Enter Product Modal" required="" />
            </p>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-2">
            <p>
                <label>Product Price</label>
                <input type="number" name="pro_price" placeholder="Enter Product Price" required="" />
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <label>After Discount Price</label>
                <input type="number" name="after_discount_price" placeholder="After Discount Price" required="" />
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <label>Product Tax</label>
                <input type="number" name="pro_tax" placeholder="Product Tax" required="" />
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <label>Product Color</label>
                <input type="text" name="pro_color" placeholder="Product Color" required="" />
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <label>Product Size</label>
                <input type="text" name="pro_size" placeholder="Product Size" required="" />
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <label>Featured Product</label>
                <select class="form-control" name="pro_feature_product" required>
                    <option value="">--SELECT--</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </p>
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-2">
            <p>
                <label>Best Selling</label>
                <select class="form-control" name="pro_best_selling" required>
                    <option value="">--SELECT--</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <label>Status</label>
                <select class="form-control" name="pro_status" required>
                    <option value=""> Select..</option>
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <label>Image</label>
                <input type="file" name="pro_image" required />
            </p>
        </div>
        <div class="col-md-6">
            <p>
                <label>Product Description</label>
                <textarea name="pro_description" placeholder="Write Product Description Here" required=""></textarea>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>
                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save Info</button>
                <a class="btn btn-danger" href="<?php echo admin_url(). "products";?>"> <i class="fa fa-times"></i> Cancel </a>
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

          
