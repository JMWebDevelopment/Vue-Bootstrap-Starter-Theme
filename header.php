<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <title><?php wp_title(); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
	</head>

  <body <?php body_class(isset($class) ? $class : ''); ?>>

    <header class="header">

        <nav class="navbar navbar-light navbar-toggleable-sm top-nav hidden-md-down">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false" aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="navbar-header">
                    <?php
                    wp_nav_menu( array(
                            'menu'              => 'Testing Menu',
                            'theme_location'    => 'bootstrap4wp',
                            'depth'             => 2,
                            'container'         => '',
                            'container_class'   => '',
                            'container_id'      => '',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new Bootstrap_Walker_Nav_Menu())
                    );
                    ?>
                </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="masthead col-lg-12 col-md-12 col-sm-12 columns">
                    <?php if (get_header_image()) { ?>
                        <img src="<?php echo get_header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>'" alt="<?php echo get_bloginfo('name' ); ?> Header Image" /></a>'
                    <?php } else { ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(get_home_url()); ?>"><?php echo get_bloginfo('name'); ?></a></h1>
                        <h2 class="site-description"><a href="<?php echo esc_url(get_home_url()); ?>"><?php echo get_bloginfo('description'); ?></a></h2>
                    <?php } ?>
                </div>
            </div>
        </div>

        <nav class="navbar mobile-nav hidden-lg-up" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse">
           <?php wp_nav_menu( array('menu' => 'Main', 'menu_class' => 'nav navbar-nav navbar-right', 'depth'=> 3, 'container'=> false, 'walker'=> new Bootstrap_Walker_Nav_Menu)); ?>
          </div><!-- /.navbar-collapse -->
        </nav>

    </header>

    <div id="main-container" class="container">