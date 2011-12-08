<?php if ( ! have_posts() ) : ?>
		<h2 class="pagetitle"><?php _e( 'Not Found', 'lrdpz' ); ?></h2>
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'lrdpz' ); ?></p>
			<?php get_search_form(); ?>
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php /* How to display posts of the Gallery format. */ ?>

	<?php if ( ( function_exists( 'get_post_format' ) && 'gallery' == get_post_format( $post->ID ) ) || in_category( _x( 'gallery', 'gallery category slug', 'lrdpz' ) ) ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'lrdpz' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="entry-meta">
				<?php lrdpz_posted_on(); ?>
			</div><!-- entry-meta -->

			<div class="entry-content">
<?php if ( post_password_required() ) : ?>
				<?php the_content(); ?>
<?php else : ?>
				<?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>
						<div class="gallery-thumb">
							<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
						</div><!-- gallery-thumb -->
						<p><em><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>.', $total_images, 'lrdpz' ),
								'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'lrdpz' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
								number_format_i18n( $total_images )
							); ?></em></p>
				<?php endif; ?>
						<?php the_excerpt(); ?>
<?php endif; ?>
			</div><!-- entry-content -->

			<div class="entry-utility">
			<?php if ( function_exists( 'get_post_format' ) && 'gallery' == get_post_format( $post->ID ) ) : ?>
				<a href="<?php echo get_post_format_link( 'gallery' ); ?>" title="<?php esc_attr_e( 'View Galleries', 'lrdpz' ); ?>"><?php _e( 'More Galleries', 'lrdpz' ); ?></a>
				<span class="meta-sep">|</span>
			<?php elseif ( in_category( _x( 'gallery', 'gallery category slug', 'lrdpz' ) ) ) : ?>
				<a href="<?php echo get_term_link( _x( 'gallery', 'gallery category slug', 'lrdpz' ), 'category' ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', 'lrdpz' ); ?>"><?php _e( 'More Galleries', 'lrdpz' ); ?></a>
				<span class="meta-sep">|</span>
			<?php endif; ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'lrdpz' ), __( '1 Comment', 'lrdpz' ), __( '% Comments', 'lrdpz' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'lrdpz' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- entry-utility -->
		</div><!-- post- -->

<?php /* How to display all posts. */ ?>

	<?php else : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'lrdpz' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="entry-meta">
				<?php lrdpz_posted_on(); ?>
			</div><!-- end entry-meta -->

	<?php if ( is_archive() || is_search() ) : ?>		
		<?php if ( has_post_thumbnail()) { ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
        <?php the_post_thumbnail('thumbnail'); ?></a>	
        <?php } ?>
        		<?php the_excerpt(); ?>
	<?php else : ?>
    
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'lrdpz' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'lrdpz' ), 'after' => '</div>' ) ); ?>
	<?php endif; ?>

			<div class="entry-utility">
				<?php if ( count( get_the_category() ) ) : ?>
						<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'lrdpz' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
					<span class="meta-sep">|</span>
				<?php endif; ?>
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
						<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'lrdpz' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					<span class="meta-sep">|</span>
				<?php endif; ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'lrdpz' ), __( '1 Comment', 'lrdpz' ), __( '% Comments', 'lrdpz' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'lrdpz' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- end entry-utility -->
		</div><!-- end post- -->

		<?php comments_template( '', true ); ?>

	<?php endif; ?>

<?php endwhile; ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<div class="post-nav">
		<div class="previous-post"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'lrdpz' ) ); ?></div>
		<div class="next-post"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'lrdpz' ) ); ?></div>
	</div><!-- post-nav -->
<?php endif; ?>
