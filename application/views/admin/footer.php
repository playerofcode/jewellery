            <footer class="footer text-center bg-warning text-white">
                All Rights Reserved by Badri Prasad Onkar Nath Sarraf and Sons. Designed and Developed by <a href="http://confoundingsolutions.in/">Confounding Solutions</a>
            </footer>
        </div>
        
    </div>
    
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.view_data').click(function(){
                var order_id=$(this).attr("id");
                $.ajax({
                    url:"<?php echo base_url('admin/order_item_info/');?>",
                    method:"POST",
                    data:{order_id:order_id},
                    success:function(data){
                        $('#order_item_details').html(data);
                        $('#myModal').modal("show");
                    }

                });
                
            });
        });
    </script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('assets/admin/'); ?>dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url('assets/admin/'); ?>dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('assets/admin/'); ?>dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/flot/excanvas.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>dist/js/pages/chart/chart-page-init.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>dist/js/pages/mask/mask.init.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/quill/dist/quill.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/extra-libs/DataTables/datatables.min.js"></script>
    
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
    
    <script>
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

    </script>

</body>

</html>