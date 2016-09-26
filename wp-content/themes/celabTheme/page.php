<?php get_header(); ?> <!-- ouvrir header.php -->
<main id="main">
	<section id="content">
        <?php
            $homeUrl = get_option('home');
            $currentPageTitle = wp_title('&raquo;', 0);
        $ariane = <<<EOT
        <aside id="ariane">
            <p><a href="{$homeUrl}" alt="accueil">Home</a> {$currentPageTitle} </p>
        </aside>
EOT;
       if (!is_front_page())
           echo $ariane;

	    //loop wordpress
	    if (have_posts()) {
	        while (have_posts()){
	            the_post();
	            ?><article class="post" id="introPage">
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