<?php /* TemplateName: Edition de l'inconnu */ ?>

<?php get_header(); ?> <!-- ouvrir header.php -->
<main id="main">
    <section id="content">
        <aside id="ariane">
            <?php
                $parentPageUrl = get_permalink( end( get_ancestors( get_the_ID(), 'page' ) ) );
                $parentPageTitle = get_the_title( end( get_ancestors( get_the_ID(), 'page' ) ) );
            ?>
            <p><a href="<?php echo get_option('home'); ?>" alt="accueil">Home</a> » <a href="<?php echo $parentPageUrl; ?>" alt="<?php echo $parentPageTitle; ?>"><?php echo $parentPageTitle; ?></a> » <?php wp_title(); ?> </p>
        </aside>
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
        echo do_shortcode('[product_category category="editiondelinconnu" orderby="title" per_page=-1]');
        ?>
    </section>
    <?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>
</div>
</body>
</html>