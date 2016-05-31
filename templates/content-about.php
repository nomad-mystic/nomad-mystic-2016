

<section id="aboutTheNomad">
    <div class="container">
        <article class="aboutTheNomadText">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <h1>About the Nomad</h1>
                    <?php the_content(); ?>
                </div>
            </div><!--end row-->
        </article>
        <article class="aboutTheNomadResume">
            <div class="row whiteCard">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                	<img src="http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/dist/images/resume.jpg"
                         class="img-responsive nomadResume"
                         title="Nomad Mystic Resume current as of 5-15-2016"
                         alt="Nomad Mystic Resume current as of 5-15-2016">
                    <div class="squareButtonPrimaryColor center-block">
                        <a href="http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/dist/images/resume.pdf" download><span class="fa fa-download"></span>Download Resume</a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </article>
    </div><!--end container-->
</section>

<?php
    wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']);
?>
