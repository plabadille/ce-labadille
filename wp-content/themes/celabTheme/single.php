<?php get_header(); ?> <!-- ouvrir header.php -->
<main id="main">
    <section id="content">
        <?php
            $parentUrl = null;
            $parentTitle = null;
            $exist = false;
            switch ($_GET["categorie"]) {
                case "artistes":
                    $exist = true;
                    $parentUrl = get_permalink( get_page_by_path( $_GET["categorie"] ) );
                    $parentTitle = get_the_title( get_page_by_path( $_GET["categorie"] ) );
                    break;
                case "chansons-humour":
                    $exist = true;
                    $parentUrl = get_permalink( get_post( '23' ) ); //on utilise l'id car le slug ne fonctionne pas pour un obscure raison pour cette page.
                    $parentTitle = get_the_title( get_post( '23' ) );
                    break;
                default:
                    echo "Le fil d'ariane n'est pas encore paramétré pour cette catégorie, merci de prévenir un administrateur.";
                    break;
            }

        if ($exist){
            ?>
            <aside id="ariane">
                <p><a href="<?php echo get_option('home'); ?>" alt="accueil">Home</a> » <a href="<?php echo $parentUrl ?>" alt="<?php echo $parentTitle ?>"><?php echo $parentTitle ?></a> <?php wp_title(); ?> </p>
            </aside>
        <?php } ?>
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