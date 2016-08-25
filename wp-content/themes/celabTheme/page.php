<?php get_header(); ?> <!-- ouvrir header.php -->
<main id="main">
	<section id="content">
	    <?php //loop wordpress
	    if (have_posts()) {
	        while (have_posts()){
	            the_post();
	            ?><article class="post" id="post-<?php the_ID(); ?>">
	            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	            <div class="post_content">
	                <?php the_content(); ?>
	            </div>
	            </article><?php
	        }
	        edit_post_link('Modifier cette page', '<p>', '</p>');
	    }
	    ?>
	</section>
	<?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>
</div>
</body>
</html>

