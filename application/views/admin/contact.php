<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Customer List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?></div>
                    <?php endif;?>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile Number</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach ($contact as $key): ?>
                                              <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $key->name; ?></td>
                                                <td><?php echo $key->email; ?></td>
                                                <td><?php echo $key->mobno; ?></td>
                                                <td><?php echo $key->subject; ?></td>
                                                <td><?php echo $key->message; ?></td>
                                                <td><?php echo $key->date; ?></td>
                                                <td><a onclick="return confirm('Are you sure want to delete?');"href="<?php echo base_url('admin/deleteContact/'.$key->id);?>" class="btn btn-warning btn-sm">Delete </a></td>
                                            <?php $i++;endforeach ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        