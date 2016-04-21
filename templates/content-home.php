<section class="container">
    <article class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="font-stack">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-institution fa-stack-1x fa-inverse"></i>
            </span>
            </div>
            <button class="squareButtonPrimaryColor">School</button>
        </div><!--end col-->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="font-stack">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-modx fa-stack-1x fa-inverse"></i>
            </span>
            </div>
            <button class="squareButtonPrimaryColor">Featured</button>
        </div><!--end col-->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="font-stack">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-globe fa-stack-1x fa-inverse"></i>
            </span>
            </div>
            <button class="squareButtonPrimaryColor">Websites</button>
        </div><!--end col-->
    </article><!--end row-->
</section>
<section class="services-section">
    <div class="container">
        <article class="row">
            <h2 class="text-center">Services</h2>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                <div class="font-stack">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-institution fa-stack-1x"></i>
            </span>
                </div>
                <button class="squareButtonPrimaryColor">School</button>
            </div><!--end col-->
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                <div class="font-stack">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-institution fa-stack-1x"></i>
            </span>
                </div>
                <button class="squareButtonPrimaryColor">Featured</button>
            </div><!--end col-->
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                <div class="font-stack">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-institution fa-stack-1x"></i>
            </span>
                </div>
                <button class="squareButtonPrimaryColor">Websites</button>
            </div><!--end col-->
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                <div class="font-stack">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-institution fa-stack-1x"></i>
            </span>
                </div>
                <button class="squareButtonPrimaryColor">Websites</button>
            </div><!--end col-->
        </article><!--end row-->
    </div><!--end container-->
</section>
<section class="container">
    <div class="row">
        <h2 class="text-center">About</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci at debitis dolore dolorum eius esse eum ipsum,
            libero maiores minus nam necessitatibus, pariatur quaerat quia sequi sint tempore tenetur, voluptas!</p>
    </div>
</section>






<?php the_content(); ?>
<?php
    wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']);
?>
