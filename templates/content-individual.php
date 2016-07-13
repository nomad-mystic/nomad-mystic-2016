<?php

//var_dump($_POST['title_of_folder'] . ' title_of_folder');
//var_dump($_POST['title_of_individual'] . ' title_of_individual');
//var_dump($_POST['title_of_school_class_selected'] . ' title_of_school_class_selected');

$title_of_folder = $_POST['title_of_folder'];
$title_of_individual = $_POST['title_of_individual'];
$title_of_school_class_selected = $_POST['title_of_school_class_selected'];
?>
<div class="titleOfFolderHidden displayNone"><?php echo $title_of_folder; ?></div>
<div class="titleOfIndividualHidden displayNone"><?php echo $title_of_individual; ?></div>
<div class="titleOfSchoolClassSelectedHidden displayNone"><?php echo $title_of_school_class_selected; ?></div>

<article <?php post_class(); ?>>
    <div class="entry-summary">
        <?php the_content(); ?>
<!--        <section>-->
<!--            <div class="container">-->
<!--                -->
<!--            </div><!-- end container-->
<!--        </section>-->
        <!--testing tabs dynamic from main.js individual.init.closure.createFileContentTab-->
        <section>
            <div class="container whiteCard">
                <article>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1>Nomad Mystic Code Viewer</h1>
                            <p>The project you are viewing is: <span id="activeIndividualProjectInView" class="text-success"></span></p>
                            <p>The individual file you are viewing is: <span id="activeIndividualFileInView">None Selected</span></p>
                        </div><!-- end col-->
                    </div><!-- end row-->
                </article>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="nav nav-tabs individualTabs" role="tablist"></ul>
                        <div id="tabCodeContent"></div><!-- end tabCodeContent-->
                    </div>
                </div>
            </div>
        </section>
    </div><!-- end entry-summary-->
</article>


