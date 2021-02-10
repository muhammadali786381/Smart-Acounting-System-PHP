</div>
<!-- ./wrapper -->
<script type="text/javascript">
    //print div
     function PrintNow(elem)
    {
        Popup($(elem).html());
    }
    
    function Popup(data)
    {
        var mywindow = window.open('', '<?php $view->app_config("APP_SHORT_NAME");?>', 'height=3508,width=2480');
        mywindow.document.write('<html><head><title><?php $view->app_config("APP_SHORT_NAME");?></title>');
        /*optional stylesheet*/ 
        mywindow.document.write('<link rel="stylesheet" href="<?php echo BASE_URL;?>vendor/dist/css/adminlte.min.css" type="text/css" />');
        mywindow.document.write('</head><body>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.print();
        mywindow.close();
        return true;
    }
 </script>
<!-- REQUIRED SCRIPTS -->
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL;?>vendor/dist/js/adminlte.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo BASE_URL?>vendor/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables -->
<script src="<?php echo BASE_URL;?>vendor/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE_URL;?>vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo BASE_URL;?>vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo BASE_URL;?>vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- PAGE PLUGINS -->
<script src="<?php echo BASE_URL;?>vendor/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<!-- jQuery Mapael -->
<script src="<?php echo BASE_URL;?>vendor/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo BASE_URL;?>vendor/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo BASE_URL;?>vendor/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo BASE_URL;?>vendor/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="<?php echo BASE_URL;?>vendor/plugins/summernote/summernote-bs4.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo BASE_URL;?>vendor/plugins/chart.js/Chart.min.js"></script>
<!-- Custom SCRIPTS -->
<script src="<?php echo BASE_URL;?>vendor/custom/cus_script.js"></script>
</body>
</html>