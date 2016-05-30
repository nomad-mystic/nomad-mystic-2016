<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 5/16/2016
 * Time: 1:13 AM
 */
// build DOM for each individual post
echo '<div class="entry-content container">';
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
echo '    </figure>';
echo '  </div><!--end col-->';
echo '  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 postContent">';
// getting the content of the post by category
echo '    <h2>' . get_the_title() . '</h2>';
//                echo '    <share-button>Share</share-button>';
the_content();
echo '    <div class="row">';
echo '        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 codeButtonDiv">';
echo '            <div class="squareButtonPrimaryColor center-block code_button">';
echo '                <a href="http://localhost:3000/nomadmystic/individual/" 
                                            title="' . $title . '" 
                                            class="' . $lower_modified_title . '">Code</a>';
echo '            </div><!--squareButtonPrimaryColor-->';
echo '        </div><!--end col-->';
echo '        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 productionButtonDiv">';
echo '            <div class="squareButtonPrimaryColor center-block">';
echo '                <a href="' . $production_link . '">Production</a>';
echo '            </div><!--squareButtonPrimaryColor-->';
echo '        </div><!--end col-->';
echo '    </div><!--end row-->';
echo '</div><!--end row-->';
echo '  </div><!--end col-->';
echo '</div><!--end row for text thumb and content-->';

// hidden for to pass on to individual page for file system
echo '<form action="http://localhost:3000/nomadmystic/individual/" 
                            method="post" 
                            id="' . $lower_modified_title .'">';
echo '    <input type="hidden" value="' . $lower_modified_title . '" name="title_of_individual">';
echo '    <input type="hidden" value="' . $sliced_location_pathname . '" name="title_of_folder">';
echo '</form>';
echo '</div><!--end entry-content-->';