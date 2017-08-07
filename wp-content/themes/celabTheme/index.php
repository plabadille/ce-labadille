            <?php get_header(); ?> <!-- ouvrir header.php -->
            <main id="main">
	            <section id="content">
	                <?php //loop wordpress
	                if (have_posts()) {
	                    while (have_posts()){
	                        the_post();
	                        ?><article class="post" id="post-<?php the_ID(); ?>">
	                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	                            <p class="postmetadata">   <?php the_time('j F Y') ?> par <?php the_author() ?> | Cat&eacute;gorie: <?php the_category(', ') ?> | <?php comments_popup_link('Pas de commentaires', '1 Commentaire', '% Commentaires'); ?> <?php edit_post_link('Editer', ' &#124; ', ''); ?>   </p>
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

