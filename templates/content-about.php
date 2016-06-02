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
        <!-- last updated 6-1-2015-->
        <article id="contactPageSocialIcons" class="text-ceneter">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <a href="https://github.com/nomad-mystic" target="_blank">
                                <span class="fa-stack">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </div><!--end col-->
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <a href="https://www.facebook.com/nomadmysticsspot/" target="_blank">
                                <span class="fa-stack">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook-official fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </div><!--end col-->
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <a href="https://www.linkedin.com/in/keith-murphy-34a7bb95" target="_blank">
                                <span class="fa-stack">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </div><!--end col-->
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <a href="https://plus.google.com/111224237647566900497/" target="_blank">
                                <span class="fa-stack">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </div><!--end col-->
                    </div><!--end footerSocialIcons-->
                </div>
            </div>
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
