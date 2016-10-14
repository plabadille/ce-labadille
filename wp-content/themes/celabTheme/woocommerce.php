<?php get_header(); ?> <!-- ouvrir header.php -->
<main id="main">
	<section id="content" class="woocommerce">
	    <?php
            if ($_GET['post_type'])
                if ($_GET['post_type'] == 'product')
                    header('Location: /?page_id=2');

            global $post;
            $terms = get_the_terms( $post->ID, 'product_cat' );
            $productSlug = $terms['0']->slug; /* on ne s'intéresse qu'au premier puisque les pages n'affiche qu'une catégorie de produit */

            $parentUrl = null;
            $parentTitle = null;
            $exist = false;

            switch ($productSlug){
                case "andco":
                    $exist = true;
                    $parentUrl = get_permalink( get_post( '17' ) );
                    $parentTitle = get_the_title( get_post( '17' ) );
                    break;
                case "labadille":
                    $exist = true;
                    $parentUrl = get_permalink( get_post( '15' ) );
                    $parentTitle = get_the_title( get_post( '15' ) );
                    break;
                case "editiondelinconnu":
                    $exist = true;
                    $parentUrl = get_permalink( get_post( '19' ) );
                    $parentTitle = get_the_title( get_post( '19' ) );
                    break;
                default:
                    echo "Le fil d'ariane n'est pas encore paramétré pour cette catégorie, merci de prévenir un administrateur.";
                    break;
            }
            if ($exist){
                $boutiqueUrl = get_permalink( get_post( '2' ) );
                $boutiqueTitle = get_the_title( get_post( '2' ) );
                ?>
                <aside id="ariane">
                    <p><a href="<?php echo get_option('home'); ?>" alt="accueil">Home</a> » <a href="<?php echo $boutiqueUrl ?>" alt="<?php echo $boutiqueTitle ?>"><?php echo $boutiqueTitle ?></a> » <a href="<?php echo $parentUrl ?>" alt="<?php echo $parentTitle ?>"><?php echo $parentTitle ?></a> » <?php wp_title(); ?> </p>
                </aside>
            <?php }

            woocommerce_content();
		?>
	</section>
	<?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>
</div>
</body>
</html>