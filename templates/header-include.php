<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 7/8/2016
 * Time: 10:53 PM
 */


?>

<div class="jumbotron home-jumbotron"
     style="background-image: url('http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/dist/images/<?php echo $lower_header_background_image_path;?>')">
    <div class="container">
        <img src="http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/dist/images/<?php echo $lower_header_letter_image_path;?>"
             class='img-responsive'
             alt='Header logo for nomadmystic.com'
             id="<?php echo substr($lower_header_letter_image_path, 0, - 4);?>">
    </div><!--end container-->
</div><!--jumbotron-->
