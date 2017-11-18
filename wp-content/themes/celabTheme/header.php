<!doctype html>
<html lang="fr">
    <head profile="http://gmpg.org/xfn/11">
        <title><?php bloginfo('name') ?><?php if ( is_404() ) : ?> &raquo; <?php _e('Not Found') ?><?php elseif ( is_home() ) : ?> &raquo; <?php bloginfo('description') ?><?php else : ?><?php wp_title() ?><?php endif ?></title>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/animTheme.js"></script>
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
        <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
        <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>   <?php wp_get_archives('type=monthly&format=link'); ?> <?php //comments_popup_script(); <?php wp_head(); ?>
    </head>
    <body>
    <?php
    if (isset($_GET['page_id']) && $_GET['page_id'] == '212') #redirection automatique de la page mon compte
        header('Location: /');
    ?>
        <div id="page">
            <header id="header">
                <div id="sloganAlign">
                    <div id="slogan">
		                <h1><?php bloginfo('name'); ?></h1>
                        <p><?php bloginfo('description'); ?></p>
                    </div>
                    <div id="subName">
                        <h2>Trio larigot</h2>
                        <p>Chanson swing</p>
                    </div>
		    <div id="subSubName">
			<p>Charles-Erick Labadille</p>
			<p>Daniel Givone</p>
			<p>Jean-Claude Givone</p>
			<p>Odile Labadille</p>
	            </div>
		</div>
	        <div id="slide">
                    <?php
                        if (is_front_page()) {
                            echo do_shortcode("[metaslider id=11]");
                         } 
                    ?>
	        </div>
            </header>
            <nav id="nav" role="navigation">
                <div id="normalRez">
	                <?php wp_nav_menu(array('theme_location' => 'header')); ?>
                </div>
                <div id="mobileRez">
                    <?php echo do_shortcode('[responsive_menu]'); ?>
                </div>
            </nav>
