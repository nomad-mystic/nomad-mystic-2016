<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 5/16/2016
 * Time: 1:51 AM
 */

global $wp_query;

// URI now: '/nomadmystic/school-projects/'
$location_pathname = $_SERVER['REQUEST_URI'];
// this removes / and nomadmystic from the string
$sliced_location_pathname = substr($location_pathname, 13, -1);

var_dump($sliced_location_pathname . ' pathname');
//$title_of_folder = $_POST['title_of_folder'];

$title_of_school_class_selected = $_POST['title_of_school_class'];
var_dump($title_of_school_class_selected . ' Title of class selected');

?>

<section>
    <?php
    // WP_Query arguments for querying slug by url name, ordering by ascending,
    $project_category = array(
        'category_name'          => "$title_of_school_class_selected",
        'order'                  => 'ASC',
        'orderby'                => 'title',
        'posts_per_page'         =>  '-1'
    );
    
    // The Query is a global object provided by WordPress
    $query = new WP_Query($project_category);
    
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            // get wp_query object method
            $query->the_post();

            // getting individual post tiles for hidden form
            $post = get_post();
            $title = $post->post_title;

            // uses a regular expression to remove all whitespaces
            // clean title
            $remove_space_in_title = preg_replace('/\s+/', '', $title);
            $lower_modified_title = strtolower($remove_space_in_title);

//            var_dump($lower_modified_title . ' Individual school project');
            $production_link = "http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/" . $sliced_location_pathname . "/production/" . $title_of_school_class_selected . "/" . $lower_modified_title . "";
    ?>
<!--            // build DOM for each individual post-->
    <div class="entry-content container whiteCard">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 postThumb">
                <figure>
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
                </figure>
            </div><!--end col-->
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 postContent">
            <!--            // getting the content of the post by category-->
                <h2><?php echo get_the_title() ; ?></h2>
            <!--            //     <share-button>Share</share-button>-->
                <?php the_content(); ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="squareButtonPrimaryColor center-block code_button">
                            <a href="http://localhost:3000/nomadmystic/individual/"
                                            title="<?php echo $title ; ?>"
                                            class="<?php echo $lower_modified_title ; ?>">Code</a>
                        </div><!--squareButtonPrimaryColor-->
                    </div><!--end col-->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="squareButtonPrimaryColor center-block production_button displayNone">
                            <a href="<?php echo $production_link ; ?>">Production</a>
                        </div><!--squareButtonPrimaryColor-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->
        </div><!--end row for text thumb and content-->

<!--// hidden for to pass on to individual page for file system-->
            <form action="http://localhost:3000/nomadmystic/individual/"
                            method="post" 
                            id="<?php echo $lower_modified_title; ?>"
                            class="school_projects">
                <input type="hidden" value="<?php echo $lower_modified_title ; ?>" name="title_of_individual">
                <input type="hidden" value="<?php echo $sliced_location_pathname ; ?>" name="title_of_folder">
                <input type="hidden"
                            value="<?php echo $title_of_school_class_selected; ?>"
                            name="title_of_school_class_selected"
                            class="title_of_school_class_selected">
            </form>
    </div><!--end entry-content whiteCard-->

    <?php
        } // end while for $query->the_post()
    } // end if

    ?>
</section>
