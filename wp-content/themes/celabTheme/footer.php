<footer id="footer">
    <div id="socialFooter">
        <?php echo do_shortcode('[aps-social id="1"]')?>
    </div>
    <p> Copyright &#169; <?php print(date(Y)); ?> <?php bloginfo('name'); ?> </p>
    <p> <a href="//ce-labadille.com/?page_id=535" alt="mentions légales">Mentions légales</a> - <a href="//ce-labadille.com/?page_id=533" alt="conditions de ventes">Conditions générales de ventes</a> </p>
    <p> Blog propulsé par <a href="http://wordpress.org/">WordPress</a> et con&ccedil;u par <a href="http://www.pierrelabadille.com">Pierre Labadille</a> </p>
    <p> <?php echo get_num_queries(); ?> requêtes. <?php timer_stop(1); ?> secondes. </p>
</footer>
<?php wp_footer(); ?>