<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="row">
            <?php
             if(!empty($data['data']['file_link'])):
            ?>
            <a href="<?php echo BASE_URL."uploads/property_imges/".$data['data']['file_link']."?image=".$data['data']['file_link'];?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                <img src="<?php echo BASE_URL."uploads/property_imges/".$data['data']['file_link']."?image=".$data['data']['file_link'];?>" class="img-fluid">
            </a>
             <?php
            else:
              echo "<h4>The member did not add any images.</h4>";
            endif;
            ?>
        </div>
        
    </div>
</div>