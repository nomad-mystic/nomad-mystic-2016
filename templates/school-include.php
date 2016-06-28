<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 5/16/2016
 * Time: 1:13 AM
 */

// build DOM for each school post
?>
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
    <!--// getting the content of the post by category-->
            <h2><?php echo get_the_title(); ?></h2>
    <!--//                echo '    <share-button>Share</share-button>-->
            <?php echo the_content(); ?>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="squareButtonPrimaryColor center-block school_projects_button">
                        <a href="http://localhost:3000/nomadmystic/school-projects/"
                                                title="<?php echo $title; ?>"
                                                class="<?php echo $lower_modified_title; ?>">Projects</a>
                    </div><!--squareButtonPrimaryColor-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end col-->
    </div><!--end row for text thumb and content-->

    <!--// hidden for to pass on to individual page for file system-->
        <form action="http://localhost:3000/nomadmystic/school-projects/"
                                method="post"
                                id="<?php echo $lower_modified_title; ?>">
            <input type="hidden" value="<?php echo $lower_modified_title; ?>" name="title_of_school_class">
        </form>
</div><!--end entry-content-->

