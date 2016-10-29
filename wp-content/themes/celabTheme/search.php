<?php get_header(); ?> <!-- ouvrir header.php -->
<main id="main">
    <section id="content">
        <?php //loop wordpress
        if (have_posts()) {
            while (have_posts()){
                the_post();
                $categorySlug = get_the_category()[0]->slug;
                switch ($categorySlug) {
                    case 'partitionstabs':
                        $categoryLink = "<a href=\"//ce-labadille.com/partitions-tabs\" alt=\"".$categorySlug."\">" . $categorySlug . "</a>";
                        $spec = "?categorie=partitionstabs";
                        break;
                    case 'auteurs':
                        $categoryLink = "<a href=\"//ce-labadille.com/artistes\" alt=\"".$categorySlug."\">" . $categorySlug . "</a>";
                        $spec = "?categorie=artistes";
                        break;
                    case 'chansonshumour':
                        $categoryLink = "<a href=\"//ce-labadille.com/chansons-humour\" alt=\"".$categorySlug."\">" . $categorySlug . "</a>";
                        $spec = "?categorie=chansons-humour";
                        break;
                    case '':
                        $categoryLink = "<a href=\"//ce-labadille.com/sample-page\" alt=\"produits\">Produits</a>";
                        $spec = "";
                        break;
                }
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