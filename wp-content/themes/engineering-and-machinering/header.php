<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<!-- Meta -->
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!-- Title -->
    <title><?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' );
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s', 'lrdpz' ), max( $paged, $page ) );
    ?></title>

<!-- Css -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />

<!-- Pingback -->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> 

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!--[if lt IE 7]>
<style type="text/css">#wrapper {background: none; float: left; width: 100%; padding: 25px 0;}</style>
<![endif]-->

<div id="wrapper">
	<div class="container">
    <div id="page-container">
 
    <div id="header">
		<h1 id="blog-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_template_directory_uri( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
	
		<div id="top-menu">
    	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Menu') ) : ?>
        <?php printf( __( '<span>Fill this area with a top menu or a text, use the Top Menu widget</span>'), 'lrdpz' ); ?>
		<?php endif; ?>
        
        <div id="search">
			<?php get_search_form() ?>
         </div><!-- end search -->
         </div><!-- end top-menu -->
    
    </div><!-- end header -->
			
            <div id="main-menu">
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>   
			</div><!-- end main-menu -->
 
 <div id="content">

				<?php
					if ( is_singular() && current_theme_supports( 'post-thumbnails' ) &&
							has_post_thumbnail( $post->ID ) &&
							( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :

						echo get_the_post_thumbnail( $post->ID );
					elseif ( get_header_image() ) : ?>
			<div id="themeimage">
				<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
             </div><!-- end themeimage -->
				<?php endif; ?>
 