<?php

//var_dump($_POST['title_of_folder']);
//var_dump($_POST['title_of_individual']);
//var_dump($_POST['title_of_school_class_selected']);

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
        <!--testing tabs dynamic from main.js individual.init.closure.createFileContentTab-->
        <ul class="nav nav-tabs individualTabs" role="tablist"></ul>
        <section>
            <div class="container">
                <article>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="tabCodeContent">
                                <h1>Nomad Mystic Code Viewer</h1>
                                <p>Click on the tabs for viewing code for this project.</p>
                            </div><!-- end tabCodeContent-->
                        </div><!-- end col-->
                    </div><!-- end row-->
                </article>
            </div><!-- end container-->
        </section>
    </div><!-- end entry-summary-->
</article>


