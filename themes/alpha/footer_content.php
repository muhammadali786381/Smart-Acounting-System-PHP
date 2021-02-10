<footer class="main-footer">
    <strong>Copyright &copy; 2020-<?php echo date('Y');?>  <a href="#"><?php echo $view->app_config("APP_SHORT_NAME"); ?></a></strong>
    All rights reserved.
    
 <!--WhatsAPP button load-->
    <div id="WAButton"></div>
</footer>
<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  
  <script type="text/javascript">  
   $(function (){
           // whatsApp Button load js
           $('#WAButton').floatingWhatsApp({
               phone: '<?php echo $view->app_config("APP_WP_SUPPORT_NO"); ?>', //WhatsApp Business phone number
               headerTitle: '<?php echo $view->app_config("APP_WP_POPUP_HEADER"); ?>', //Popup Title
               popupMessage: '<?php echo $view->app_config("APP_WP_POPUP_MESSAGE"); ?>', //Popup Message
               showPopup: true, //Enables popup display
               buttonImage: '<img src="<?php echo BASE_URL;?>uploads/site/whatsapp.webp" />', //Button Image
               //headerColor: 'crimson', //Custom header color
               //backgroundColor: 'crimson', //Custom background button color
               position: "right" //Position: left | right

           });
       });
</script>

