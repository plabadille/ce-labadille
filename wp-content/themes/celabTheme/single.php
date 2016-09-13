<?php get_header(); ?> <!-- ouvrir header.php -->
<main id="main">
    <section id="content">
        <?php //loop wordpress
        if (have_posts()) {
            while (have_posts()){
                the_post();
                ?><article class="post" id="post-<?php the_ID(); ?>">
                <div class="post_content">
                    <?php the_content(); ?>
                </div>
                </article><?php
            }
        }
        ?>
    </section>
    <?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>
</div>
</body>
</html>