<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 5/16/2016
 * Time: 1:13 AM
 */

// creating url for link to freelance website
// get the current tag WP_term object
$current_tag = wp_get_post_tags($post->ID);
//var_dump($current_tag);

// get the current slug for this post
//print_r($current_tag[0]->{'slug'});
$current_tag_slug = $current_tag[0]->{'slug'};

// example of slug = specialeducationsupportcenter-org
$find_dash_in_slug_name = strrpos($current_tag_slug, "-");
// checking if there is a dash
if ($find_dash_in_slug_name === false) { // note: three equal signs
    // not found...
    echo '<br>Not Found';
} else {
    // get the position of the
    // var_dump(strrpos($current_tag_slug, '-', -3));
    $position_of_dash_in_current_tag_slug = strrpos($current_tag_slug, '-', -3);

    // slice of the name of the website
    $domain_name = substr($current_tag_slug, 0 , $position_of_dash_in_current_tag_slug);
    // var_dump($domain_name);

    // get domain Name System i.e. .org .com .net
    $domain_name_system = substr($current_tag_slug, $position_of_dash_in_current_tag_slug + 1);
    //    var_dump($domain_name_system);

    // Compile url
    $current_post_url = $domain_name . "." . $domain_name_system;
    // var_dump($current_post_url);
}
?>

<!--// build DOM for each individual post-->
<div class="entry-content container whiteCard">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 postThumb">
            <a href="<?php echo $production_link; ?>">
                <?php
                if (has_post_thumbnail()) {
                    // getting full size featured image and adding responsive class
                    the_post_thumbnail(
                        'full',
                        array(
                            'class' => 'img-responsive center-block'
                        )
                    );
                } // end if
                ?>
            </a>
            </figure><!--end col thumbnail-->
        </div><!--end col-->
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 postContent">
            <!--// getting the content of the post by category-->
            <h2><?php echo  get_the_title(); ?></h2>
            <!--// <share-button>Share</share-button>-->
            <?php echo the_content(); ?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="squareButtonPrimaryColor center-block website_button">
                        <a href="http://<?php echo  $current_post_url; ?>"
                                                    title="<?php echo  $title; ?>"
                                                    class="<?php echo  $lower_modified_title; ?>"
                                                    target="_blank">Website</a>
                    </div><!--squareButtonPrimaryColor-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end col-->
    </div><!--end row-->
</div><!--end row for text thumb and content whiteCard-->
