<?php /* TemplateName: And Co */ ?>

<?php get_header(); ?> <!-- ouvrir header.php -->
<main id="main">
    <section id="content">

        <?php //loop wordpress
        if (have_posts()) {
            while (have_posts()){
                the_post(); ?>
                <article class="post" id="introPage">
                    <div class="post_content">
                        <?php the_content(); ?>
                    </div>
                </article> <?php
            }
        }
        echo do_shortcode('[product_category category="andco" orderby="title"]');
        ?>
    </section>
    <?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>
</div>
</body>
</html>