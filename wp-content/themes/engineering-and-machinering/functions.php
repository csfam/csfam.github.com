<?php

// Excerpt on pages
add_post_type_support('page', 'excerpt');

if ( ! isset( $content_width ) )
	$content_width = 640;

add_action( 'after_setup_theme', 'lrdpz_setup' );

function lrdpz_setup() {

	add_editor_style();
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );

	load_theme_textdomain( 'lrdpz', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'lrdpz' ),
	) );
	
	add_custom_background();

	if ( ! defined( 'HEADER_TEXTCOLOR' ) )
		define( 'HEADER_TEXTCOLOR', '' );

	if ( ! defined( 'HEADER_IMAGE' ) )
		define( 'HEADER_IMAGE', '%s/images/headers/theme-image.png' );

	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'lrdpz_header_image_width', 625 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'lrdpz_header_image_height', 205 ) );

	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	if ( ! defined( 'NO_HEADER_TEXT' ) )
		define( 'NO_HEADER_TEXT', true );

	add_custom_image_header( '', 'lrdpz_admin_header_style' );

	register_default_headers( array(
		'berries' => array(
			'url' => '%s/images/headers/theme-image.png',
			'thumbnail_url' => '%s/images/headers/theme-thumbnail.png',
			'description' => __( 'Main Image', 'lrdpz' )
		),
	) );
}

function lrdpz_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}

function lrdpz_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'lrdpz_page_menu_args' );

function lrdpz_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'lrdpz_excerpt_length' );

function lrdpz_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'lrdpz' ) . '</a>';
}

function lrdpz_auto_excerpt_more( $more ) {
	return ' &hellip;' . lrdpz_continue_reading_link();
}
add_filter( 'excerpt_more', 'lrdpz_auto_excerpt_more' );

function lrdpz_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= lrdpz_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'lrdpz_custom_excerpt_more' );

add_filter( 'use_default_gallery_style', '__return_false' );

function lrdpz_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
	add_filter( 'gallery_style', 'lrdpz_remove_gallery_css' );

function lrdpz_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'lrdpz' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'lrdpz' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				printf( __( '%1$s at %2$s', 'lrdpz' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'lrdpz' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- reply -->
	</div><!-- comment  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'lrdpz' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'lrdpz' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}

function lrdpz_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Top Menu', 'lrdpz' ),
		'id' => 'top-menu',
		'description' => __( 'This is an area on the header. Add here a custom text or a small menu', 'lrdpz' ),
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'lrdpz' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The sidebar widget area', 'lrdpz' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

add_action( 'widgets_init', 'lrdpz_widgets_init' );

function lrdpz_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'lrdpz_remove_recent_comments_style' );


function lrdpz_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'lrdpz' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'lrdpz' ), get_the_author() ),
			get_the_author()
		)
	);
}

function lrdpz_posted_in() {
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'lrdpz' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'lrdpz' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'lrdpz' );
	}

	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}