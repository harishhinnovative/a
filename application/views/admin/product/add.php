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
                                     <h3><?php echo (!empty($product->sid)) ? "Edit" : "Add"?> Product</h3>
                                </div> 
                            </div>
                            <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                   <ul>
                                      <li><a href="<?php echo admin_url()?>">home</a></li>
                                      <li><a href="<?php echo admin_url(). "products";?>">Products</a></li>
                                      <li><?php echo (!empty($product->sid)) ? "Edit" : "Add"?> Product</li>
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
                <select class="form-control" name="cat_id" required>
                    <option value="">--SELECT--</option>
                    <?php
                    if(count($categories)) {
                      foreach ($categories as $cat) {
                          $selected = (isset($product->cat_id) && ($product->cat_id==$cat->sid)) ? 'selected=""' :'';
                      ?>
                        <option value="<?php echo $cat->sid; ?>" <?php echo $selected; ?>><?php echo $cat->title; ?></option>
                    <?php
                      }
                    } ?>
                </select>
            </p>
        </div>
        <div class="col-md-3">
            <p>
                <label>Product Title</label>
                <input type="text" name="title" placeholder="Enter Product Name" required="" value="<?php echo isset($product->title) ? $product->title :"";?>" />
            </p>
        </div>
        <div class="col-md-3">
            <p>
                <label>SKU</label>
                <input type="text" name="sku" placeholder="Enter SKU" required="" value="<?php echo isset($product->sku) ? $product->sku :"";?>" />
            </p>
        </div>
        <div class="col-md-3">
            <p>
                <label>Inventory</label>
                <input type="text" name="inv" placeholder="Enter INV" required="" value="<?php echo isset($product->inv) ? $product->inv :"";?>"  />
            </p>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-2">
            <p>
                <label>Product Cost</label>
                <input type="number" name="cost" placeholder="Enter Product Cost" required="" value="<?php echo isset($product->cost) ? $product->cost :"";?>" />
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <label>Product Price</label>
                <input type="number" name="price" placeholder="Enter Product Price" required="" value="<?php echo isset($product->price) ? $product->price :"";?>" />
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <label>Discount Perc. (%)</label>
                <input type="text" name="discount_per" placeholder="Discount Percent" required="" value="<?php echo isset($product->discount_per) ? $product->discount_per :"";?>" />
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <label>Product Weight (KG)</label>
                <input type="text" name="weight" placeholder="Product Weight" required="" value="<?php echo isset($product->weight) ? $product->weight :"";?>"  />
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <label>Product Tax</label>
                <input type="number" name="tax" placeholder="Product Tax" required="" value="<?php echo isset($product->tax) ? $product->tax :"";?>" />
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <label>Featured Product</label>
                <select class="form-control" name="feature_product" required>
                    <option value="">--SELECT--</option>
                    <option value="1" <?php echo (isset($product->feature_product) && ($product->feature_product==1)) ? 'selected=""' :'';?> >Yes</option>
                    <option value="0" <?php echo (isset($product->feature_product) && ($product->feature_product==0)) ? 'selected=""' :'';?> >No</option>
                </select>
            </p>
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-2">
            <p>
                <label>Best Selling</label>
                <select class="form-control" name="best_selling" required>
                    <option value="">--SELECT--</option>
                    <option value="1" <?php echo (isset($product->best_selling) && ($product->best_selling==1)) ? 'selected=""' :'';?> >Yes</option>
                    <option value="0" <?php echo (isset($product->best_selling) && ($product->best_selling==0)) ? 'selected=""' :'';?> >No</option>
                </select>
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <label>Status</label>
                <select class="form-control" name="status" required>
                    <option value=""> Select..</option>
                    <option value="1" <?php echo (isset($product->status) && ($product->status==1)) ? 'selected=""' :'';?> >Enable</option>
                    <option value="0" <?php echo (isset($product->status) && ($product->status==0)) ? 'selected=""' :'';?> >Disable</option>
                </select>
            </p>
        </div>
        <div class="col-md-2">
            <p>
                <label>Image</label>
                <input type="file" name="imagefile[]" <?php echo !empty($product->sid) ? "" :'required=""';?> multiple="" />
            </p>
        </div>
        <div class="col-md-6">
            <p>
                <label>Product Description</label>
                <textarea name="description" placeholder="Write Product Description Here" required=""><?php echo isset($product->description) ? $product->description :"";?></textarea>
            </p>
        </div>
    </div>
    <div class="row">
        <?php
        if(!empty($product->sid)) {
            if(count($pro_images)) {
                foreach ($pro_images as $key => $value) {
        ?>
        <div class="col-md-1" style="padding: 5px; <?php if($value->isdefault) {?>border: dashed #ccc;<?php }?>">
            <input type="radio" name="defaultimg" value="<?php echo $value->sid?>" <?php if($value->isdefault) {?> checked="" <?php }?> />
            <img src="<?php echo base_url("uploads/product/{$product->sid}/{$value->title}");?>" width="64" />
        </div>
        <?php
                }
            }
        }
        ?>
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

          
