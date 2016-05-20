<?php

global $wp_query;

// URI now: '/nomadmystic/project-category/'
$location_pathname = $_SERVER['REQUEST_URI'];
// this removes / and nomadmystic from the string
$sliced_location_pathname = substr($location_pathname, 13, -1);

$capitalize_sliced_location_pathname = ucfirst($sliced_location_pathname);
//    var_dump($location_pathname);
//    var_dump($sliced_location_pathname);
?>

<?php
    wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']);
?>

<section class="<?php echo $sliced_location_pathname;?>">
    <h1><?php echo $capitalize_sliced_location_pathname; ?></h1>
    <article <?php post_class(); ?>>
        <?php
        // WP_Query arguments for querying slug by url name, ordering by ascending,
        $project_category = array(
            'category_name'          => "$sliced_location_pathname",
            'order'                  => 'ASC',
            'orderby'                => 'title',
            'posts_per_page'         =>  '-1'
        );
        // The Query is a global object provided by WordPress
        $query = new WP_Query($project_category);

        // The Loop
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

//                var_dump($lower_modified_title);
                // production links
                $production_link = "http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/" . $sliced_location_pathname . "/production/" . $lower_modified_title . "";


                if ($sliced_location_pathname === 'featured') {
                    require('featured-include.php');

                } else if ($sliced_location_pathname === 'websites') {
                    require('websites-include.php');

                } else if ($sliced_location_pathname === 'school') {
                    require('school-include.php');
                }


            } // end while for $query->the_post()
        } // end if
        ?>
    </article>
</section>




