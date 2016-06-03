<?php

// URI now: '/nomadmystic/project-category/'
$location_pathname = $_SERVER['REQUEST_URI'];
// this removes / and nomadmystic from the string
$sliced_location_pathname = substr($location_pathname, 13, -1);

$capitalize_sliced_location_pathname = ucfirst($sliced_location_pathname);

var_dump($location_pathname);
var_dump($sliced_location_pathname);


if ($sliced_location_pathname === 'credits') {
    echo 'Testing Credits Page';
    the_content();

} else {
echo '<section id="aboutTheNomad">';
    echo '<div class="container">';
        echo '<article class="aboutTheNomadText">';
            echo '<div class="row">';
                echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">';
                    echo '<h1>About the Nomad</h1>';
                    the_content();
echo '</div>';
echo '</div><!--end row-->';
echo '</article>';
echo '<!-- last updated 6-1-2015-->';
echo '<article id="contactPageSocialIcons" class="text-ceneter">';
    echo '<div class="row">';
        echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">';
            echo '<div class="row">';
                echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">';
                    echo '<a href="https://github.com/nomad-mystic" target="_blank">';
                                echo '<span class="fa-stack socialIconBox">';
                                    echo '<i class="fa fa-circle fa-stack-2x"></i>';
                                    echo '<i class="fa fa-github fa-stack-1x fa-inverse"></i>';
                                echo '</span>';
                    echo '</a>';
                echo '</div><!--end col-->';
                echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">';
                    echo '<a href="https://www.facebook.com/nomadmysticsspot/" target="_blank">';
                                echo '<span class="fa-stack socialIconBox">';
                                    echo '<i class="fa fa-circle fa-stack-2x"></i>';
                                    echo '<i class="fa fa-facebook-official fa-stack-1x fa-inverse"></i>';
                                echo '</span>';
                    echo '</a>';
                echo '</div><!--end col-->';
                echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">';
                    echo '<a href="https://www.linkedin.com/in/keith-murphy-34a7bb95" target="_blank">';
                                echo '<span class="fa-stack socialIconBox">';
                                    echo '<i class="fa fa-circle fa-stack-2x"></i>';
                                    echo '<i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>';
                                echo '</span>';
                    echo '</a>';
                echo '</div><!--end col-->';
                echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">';
                    echo '<a href="https://plus.google.com/111224237647566900497/" target="_blank">';
                                echo '<span class="fa-stack socialIconBox">';
                                    echo '<i class="fa fa-circle fa-stack-2x"></i>';
                                    echo '<i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>';
                                echo '</span>';
                    echo '</a>';
                echo '</div><!--end col-->';
            echo '</div><!--end footerSocialIcons-->';
        echo '</div>';
    echo '</div>';
echo '</article>';
echo '<article class="aboutTheNomadResume">';
    echo '<div class="row whiteCard">';
        echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
            echo '<img src="http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/dist/images/resume.jpg"
                 class="img-responsive nomadResume"
                 title="Nomad Mystic Resume current as of 5-15-2016"
                 alt="Nomad Mystic Resume current as of 5-15-2016">';
            echo '<div class="squareButtonPrimaryColor center-block">';
                echo '<a href="http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/dist/images/resume.pdf" download><span class="fa fa-download"></span>Download Resume</a>';
            echo '</div>';
        echo '</div><!--end col-->';
    echo '</div><!--end row-->';
echo '</article>';
echo '</div><!--end container-->';
echo '</section>';
}
?>

<!--<section id="aboutTheNomad">-->
<!--    <div class="container">-->
<!--        <article class="aboutTheNomadText">-->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">-->
<!--                    <h1>About the Nomad</h1>-->
<!--                    --><?php //the_content(); ?>
<!--                </div>-->
<!--            </div><!--end row-->
<!--        </article>-->
<!--        <!-- last updated 6-1-2015-->
<!--        <article id="contactPageSocialIcons" class="text-ceneter">-->
<!--            <div class="row">-->
<!--                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">-->
<!--                    <div class="row">-->
<!--                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">-->
<!--                            <a href="https://github.com/nomad-mystic" target="_blank">-->
<!--                                <span class="fa-stack socialIconBox">-->
<!--                                    <i class="fa fa-circle fa-stack-2x"></i>-->
<!--                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>-->
<!--                                </span>-->
<!--                            </a>-->
<!--                        </div><!--end col-->
<!--                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">-->
<!--                            <a href="https://www.facebook.com/nomadmysticsspot/" target="_blank">-->
<!--                                <span class="fa-stack socialIconBox">-->
<!--                                    <i class="fa fa-circle fa-stack-2x"></i>-->
<!--                                    <i class="fa fa-facebook-official fa-stack-1x fa-inverse"></i>-->
<!--                                </span>-->
<!--                            </a>-->
<!--                        </div><!--end col-->
<!--                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">-->
<!--                            <a href="https://www.linkedin.com/in/keith-murphy-34a7bb95" target="_blank">-->
<!--                                <span class="fa-stack socialIconBox">-->
<!--                                    <i class="fa fa-circle fa-stack-2x"></i>-->
<!--                                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>-->
<!--                                </span>-->
<!--                            </a>-->
<!--                        </div><!--end col-->
<!--                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">-->
<!--                            <a href="https://plus.google.com/111224237647566900497/" target="_blank">-->
<!--                                <span class="fa-stack socialIconBox">-->
<!--                                    <i class="fa fa-circle fa-stack-2x"></i>-->
<!--                                    <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>-->
<!--                                </span>-->
<!--                            </a>-->
<!--                        </div><!--end col-->
<!--                    </div><!--end footerSocialIcons-->
<!--                </div>-->
<!--            </div>-->
<!--        </article>-->
<!--        <article class="aboutTheNomadResume">-->
<!--            <div class="row whiteCard">-->
<!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
<!--                	<img src="http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/dist/images/resume.jpg"-->
<!--                         class="img-responsive nomadResume"-->
<!--                         title="Nomad Mystic Resume current as of 5-15-2016"-->
<!--                         alt="Nomad Mystic Resume current as of 5-15-2016">-->
<!--                    <div class="squareButtonPrimaryColor center-block">-->
<!--                        <a href="http://localhost:3000/nomadmystic/wordpress/wp-content/themes/nomadmystic/dist/images/resume.pdf" download><span class="fa fa-download"></span>Download Resume</a>-->
<!--                    </div>-->
<!--                </div><!--end col-->
<!--            </div><!--end row-->
<!--        </article>-->
<!--    </div><!--end container-->
<!--</section>-->

<div id="creditsPage" class="container">
    <div class="row whiteCard">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 creditsEntry">
            <img src="#" class="img-responsive" alt="Image">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <p>Author: <a href="https://www.flickr.com/photos/glenbledsoe/" target="_blank">PhotoAtelier</a></p>
            <p>Title/Link: <a href="https://www.flickr.com/photos/glenbledsoe/6270583855/in/photolist-ay7o7K-61sSjs-JVgTG-JVhXm-JVg3L-JVjFN-JVsiF-JVjWs-JVuP6-JVrUz-JVuxr-JVqQZ-JVjxh-JVqSZ-JVuLt-JVs2x-JVuex-JVi51-JVjRd-JVvpH-61oFJK-JVhG9-JViy5-JVvrn-JVtnR-JVt1t-JVfXd-61oFxg-JVsKK-JVukH-JVi7W-JVgQf-JVknu-JViah-JVsDB-61sSnQ-JViSd-JVips-JVuaZ-JVvjc-JVkr3-JVkhm-JVtgF-JVtHZ-JVuHZ-JVfw9-JVsAp-JVs5i-JVjJE-JViMA" target="_">Molalla forest No. 1</a></p>
            <p>This is licenced under <a href="http://creativecommons.org/licenses/by/2.0/" target="_blank">CC BY 2.0</a></p>
        </div>
    </div>
</div><!--creditsPage-->

<?php
    wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']);
?>
