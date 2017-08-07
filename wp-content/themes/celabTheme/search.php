<?php get_header(); ?> <!-- ouvrir header.php -->
<main id="main">
    <section id="content">
        <h2 id="artDisp">Résultats de recherche:</h2>
        <?php //loop wordpress
        if (have_posts()) {
            while (have_posts()){
                the_post();
                $categorySlug = get_the_category()[0]->slug;
                $categoryLink = get_proper_category_url($categorySlug);
                ?><article class="post" id="post-<?php the_ID(); ?>">
                <h2><a href="<?php the_permalink(); ?><?php echo $spec ;?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <p class="postmetadata">Cat&eacute;gorie: <?php echo $categoryLink; ?> </p>
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