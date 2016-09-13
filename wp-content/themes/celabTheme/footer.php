<footer id="footer">
    <p> Copyright &#169; <?php print(date(Y)); ?> <?php bloginfo('name'); ?> <br /> Blog propulsé par <a href="http://wordpress.org/">WordPress</a> et con&ccedil;u par <a href="http://www.pierrelabadille.com">Pierre Labadille</a> <br />  <?php echo get_num_queries(); ?> requêtes. <?php timer_stop(1); ?> secondes. </p>
</footer>
<?php wp_footer(); ?>