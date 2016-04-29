<article <?php post_class(); ?>>
    <header>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-summary">

        <?php the_content(); ?>
    </div>
    <form action="http://localhost:8080/nomadmystic/wordpress/wp-content/themes/nomadmystic/extras/Inventory.php" id="currentWork" method="get">
        <input type="hidden" name="currentWork" value="work1">
    </form>
    <button type="submit" class="btn btn-default" id="work1">
        Show Work 1
    </button>
    <ul class="nav nav-tabs individual-tabs-ul" role="tablist">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                HTML<span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
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
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="html">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias aperiam, cumque, facere illum
                iusto laboriosam mollitia nemo nesciunt officiis perspiciatis quo ratione sapiente voluptates
                voluptatum. Adipisci aliquid odio saepe?</p>
        </div>
    </div>
    <?php


    ?>
<!--    --><?php //if (!empty($_GET)): ?>
<!--        Welcome, --><?php //echo htmlspecialchars($_GET["name"]); ?><!--!<br>-->
<!--        Your email is --><?php //echo htmlspecialchars($_GET["email"]); ?><!--.<br>-->
<!--    --><?php //else: ?>
<!--        <form action="" method="get" id="currentWork">-->
<!--            Name: <input type="text" name="name"><br>-->
<!--            Email: <input type="text" name="email"><br>-->
<!--            <button id="work1">Testing</button>-->
<!--        </form>-->
<!--    --><?php //endif; ?>

</article>
