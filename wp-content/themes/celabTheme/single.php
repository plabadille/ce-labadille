<?php get_header(); ?> <!-- ouvrir header.php -->
<main id="main">
    <section id="content">
        <?php
        //loop wordpress
        if (have_posts()) {
            while (have_posts()){
                the_post();
                //ariane
                $categorySlug = get_the_category()[0]->slug;
                $categoryLink = get_proper_category_url($categorySlug);
                if ($categoryLink){
                    ?>
                    <aside id="ariane">
                        <p><a href="<?php echo get_option('home'); ?>" alt="accueil">Home</a> » <?php echo $categoryLink; ?>  » <?php wp_title(); ?> </p>
                    </aside>
                <?php } ?>

                <article class="post" id="post-<?php the_ID(); ?>">
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