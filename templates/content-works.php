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
