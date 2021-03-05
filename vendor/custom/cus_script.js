  
 
 
 $(function () {
   // Summernote
    $('.textarea').summernote({
        height: 200
        
    });
    //select2 active class
     $('.select2').select2({
        theme: "bootstrap4",
        width: '100%'
    });
    
    //Enable popovers everywhere
    $('[data-toggle="popover"]').popover();
    
    
    //enable ekko-lightbox
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
   });
   
  });
