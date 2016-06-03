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


// build DOM for each individual post
echo '<div class="entry-content container whiteCard">';
echo '<div class="row">';
echo '  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 postThumb">';
echo '    <figure>';
if (has_post_thumbnail()) {
    // getting full size featured image and adding responsive class
    the_post_thumbnail(
        'full',
        array(
            'class' => 'img-responsive'
        )
    );
} // end if
echo '    </figure><!--end col thumbnail-->';
echo '  </div><!--end col-->';
echo '  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 postContent">';
// getting the content of the post by category
echo '    <h2>' . get_the_title() . '</h2>';
//                echo '    <share-button>Share</share-button>';
the_content();
echo '    <div class="row">';
echo '        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
echo '            <div class="squareButtonPrimaryColor center-block website_button">';
echo '                <a href="http://' . $current_post_url . '" 
                                            title="' . $title . '" 
                                            class="' . $lower_modified_title . '"
                                            target="_blank">Website</a>';
echo '            </div><!--squareButtonPrimaryColor-->';
echo '        </div><!--end col-->';
echo '    </div><!--end row-->';
echo '  </div><!--end col-->';
echo '  </div><!--end row-->';
echo '</div><!--end row for text thumb and content whiteCard-->';

// hidden for to pass on to individual page for file system
//echo '<form action="http://localhost:3000/nomadmystic/individual/"
//                            method="post"
//                            id="' . $lower_modified_title .'">';
//echo '    <input type="hidden" value="' . $lower_modified_title . '" name="title_of_individual">';
//echo '    <input type="hidden" value="' . $sliced_location_pathname . '" name="title_of_folder">';
//echo '</form>';
//echo '</div><!--end entry-content-->';
