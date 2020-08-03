<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center"> 
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
                    <?php endif;?>
                            <form class="form-horizontal"  action="<?php echo base_url('admin/update_category');?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Update Category</h4>
                                    <?php foreach ($category as $key): ?>
                                        <?php 
                                        if(!empty($key->cat_image))
                                        {
                                            echo "<center><img src='".base_url().$key->cat_image."' style='height:100px;width:100px;border:1px solid deeppink;border-radius:5px;margin:5px;'/></center>";
                                        }
                                        else
                                        {
                                            echo "<center><span class='text-center text-danger'>Category Image not found</span></center>";
                                        }

                                        ?>
                                        <div class="form-group row">
                                        <label for="cat_image" class="col-sm-3  control-label col-form-label">Category Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="cat_image"class="form-control" id="cat_image" >
                                            <?php if(isset($upload_error)){echo $upload_error;} ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cat_name" class="col-sm-3  control-label col-form-label">Category Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="cat_name"class="form-control" id="cat_name" value="<?php echo $key->cat_name;?>" placeholder="Category Name Here">
                                        </div>
                                    </div>
                                    <?php echo form_error('cat_name'); ?>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Category Status</label>
                                        <div class="col-sm-9">
                                            <select name="cat_status" id="" class="form-control">
                                                <option value="active" >Active</option>
                                                <option value="deactive"
                                                >Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="cat_id" value="<?php echo $key->cat_id;?>">
                                    <?php endforeach ?>

                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Update Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           