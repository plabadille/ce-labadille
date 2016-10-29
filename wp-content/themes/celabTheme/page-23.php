<?php /* TemplateName: Chansons d'humour */ ?>

<?php get_header(); ?> <!-- ouvrir header.php -->
<main id="main">
    <section id="content">
        <aside id="ariane">
            <p><a href="<?php echo get_option('home'); ?>" alt="accueil">Home</a> » <?php wp_title(); ?> </p>
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
        wp_reset_query(); //2nd loop pour afficher la catégorie
        query_posts( 'category_name=chansonshumour&order=ASC&posts_per_page=-1' );
        if (have_posts()) {
            ?><h2 id="artDisp">Les articles disponibles:</h2><?php
            while (have_posts()){
                the_post();
                ?><article class="excerpt" id="post-<?php the_ID(); ?>">
                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?></a></h2>
                <div class="post_content">
                    <?php the_excerpt(); ?>
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