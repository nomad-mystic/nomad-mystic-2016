<?php

var_dump($_POST['title_of_folder']);
var_dump($_POST['title_of_individual']);

$title_of_folder = $_POST['title_of_folder'];
$title_of_individual = $_POST['title_of_individual'];
?>
<div class="titleOfFolderHidden displayNone"><?php echo $title_of_folder; ?></div>
<div class="titleOfIndividualHidden displayNone"><?php echo $title_of_individual; ?></div>

<article <?php post_class(); ?>>
    <div class="entry-summary">
<!--        <button class="testingButton">Testing Get Calls</button>-->
        <?php the_content(); ?>
    </div>
    <form action="http://localhost:8080/nomadmystic/wordpress/wp-content/themes/nomadmystic/extras/Inventory.php" id="currentWork" method="get">
        <input type="hidden" name="currentWork" value="work1">
    </form>
    <ul class="nav nav-tabs" role="tablist">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                HTML<span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#html_0" role="tab" data-toggle="tab">HTML 0</a></li>
                <li><a href="#html_1" role="tab" data-toggle="tab">HTML 1</a></li>
                <li><a href="#html_1" role="tab" data-toggle="tab">HTML 2</a></li>
                <li><a href="#html_1" role="tab" data-toggle="tab">HTML 3</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                CSS<span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </li>
    </ul>
<!--    <div class="tab-content">-->
<!--        <div class="tab-pane active" role="tabpanel" id="html_0">-->
<!--            <div>-->
<!--                <pre class="prettyprint">-->
<!--                    <xmp >-->
<!--                        <div id="snippetOutputOne"></div>-->
<!--                        <script>-->
<!--                            $(function() {-->
<!--                                console.log(data);-->
<!--                                $('.testing').on('click', function() {-->
<!---->
<!--                                });-->
<!--                            };-->
<!--                        </script>-->
<!--                        <style>-->
<!--                            body {-->
<!--                                margin: 2%;-->
<!--                            }-->
<!--                        </style>-->
<!---->
<!--                    </xmp>-->
<!--                </pre>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="tab-pane" role="tabpanel" id="html_1">-->
<!--            <p>"""""""""""""""""""""""""Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias aperiam, cumque, facere illum-->
<!--                iusto laboriosam mollitia nemo nesciunt officiis perspiciatis quo ratione sapiente voluptates-->
<!--                voluptatum. Adipisci aliquid odio saepe?</p>-->
<!--        </div>-->
<!--        <div class="tab-pane" role="tabpanel" id="html_1">-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias aperiam, cumque, facere illum-->
<!--                iusto laboriosam mollitia nemo nesciunt officiis perspiciatis quo ratione sapiente voluptates-->
<!--                voluptatum. Adipisci aliquid odio saepe?</p>-->
<!--        </div>-->
<!--        <div class="tab-pane" role="tabpanel" id="html_1">-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias aperiam, cumque, facere illum-->
<!--                iusto laboriosam mollitia nemo nesciunt officiis perspiciatis quo ratione sapiente voluptates-->
<!--                voluptatum. Adipisci aliquid odio saepe?</p>-->
<!--        </div>-->
<!--    </div>-->
    <!--testing tabs dynamic-->
    <ul class="nav nav-tabs individualTabs" role="tablist">
        
    </ul>
</article>


