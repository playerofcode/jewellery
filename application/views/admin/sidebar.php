  <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/dashboard');?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/location');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Location</span></a></li> 
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Category </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/category');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Category </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/all_category');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All Category </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/product');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Product</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/all_product');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All Products</span></a></li>
                            </ul>
                        </li>
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Collection </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                               <li class="sidebar-item"><a href="<?php echo base_url('admin/collection');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Category </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/all_collection');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All Category </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/collections');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Product</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/all_collections');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All Products</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Gift </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                               <li class="sidebar-item"><a href="<?php echo base_url('admin/gift');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Category </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/all_gift');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All Category </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/gifts');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Product</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/all_gifts');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All Products</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Silver </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                               <li class="sidebar-item"><a href="<?php echo base_url('admin/silver');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Category </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/all_silver');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All Category </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/silvers');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Product</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/all_silvers');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All Products</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Coin </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                               <li class="sidebar-item"><a href="<?php echo base_url('admin/coins');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Coin</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/all_coins');?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All Coins </span></a></li>
                            </ul>
                        </li>
                       <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Customers</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/customer_list');?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> My Customer</span></a></li>
                            </ul>
                        </li>
                       <!--  <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/distributor_list');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Distributor</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/delivery_list');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Delivery Partner</span></a></li> -->
                        <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Manage Order </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/new_order');?>" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> New Order </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('admin/confirm_order');?>" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Confirm Order </span></a></li>
                                 <li class="sidebar-item"><a href="<?php echo base_url('admin/complete_order');?>" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Complete Order </span></a></li>
                            </ul>
                        </li>
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('admin/enquiry');?>" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Enquiry</span></a></li> -->
                    </ul>
                </nav>
            </div>
        </aside>