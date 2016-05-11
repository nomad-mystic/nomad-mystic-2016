<?php global $wp_query; ?>

<?php
    wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']);
?>

<section>
    <article <?php post_class(); ?>>
        <?php
        // URI now: '/nomadmystic/project-category/'
        $location_pathname = $_SERVER['REQUEST_URI'];
        $sliced_location_pathname = substr($location_pathname, 13, -1);
        //    var_dump($location_pathname);
        //    var_dump($sliced_location_pathname);
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

                var_dump($lower_modified_title);
                // production links
                $production_link = "http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/" . $sliced_location_pathname . "/production/" . $lower_modified_title . "";

                // build DOM for each individual post
                echo '<div class="entry-content container">';
                echo '    <h2 class="text-center">' . get_the_title() . '</h2>';
                echo '<div class="row">';
                echo '  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">';

                if (has_post_thumbnail()) {
                    // getting full size featured image and adding responsive class
                    the_post_thumbnail(
                        'full',
                        array(
                            'class' => 'img-responsive'
                        )
                    );
                } // end if
                echo '  </div><!--end col-->';
                echo '  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 postContent">';
                // getting the content of the post by category
                the_content();
                echo '    <div class="row">';
                echo '        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
                echo '            <div class="squareButtonPrimaryColor center-block code_button">';
                echo '                <a href="http://localhost:3000/nomadmystic/individual/" 
                                            title="' . $title . '" 
                                            class="' . $lower_modified_title . '">Code</a>';
                echo '            </div><!--squareButtonPrimaryColor-->';
                echo '        </div><!--end col-->';
                echo '        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
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
            } // end while for $query->the_post()
        } // end if
        ?>
    </article>
</section>



