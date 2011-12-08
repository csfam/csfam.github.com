<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="entry-title"><?php the_title(); ?></h2>

					<div class="entry-meta">
						<?php lrdpz_posted_on(); ?>
					</div><!-- end entry-meta -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'lrdpz' ), 'after' => '</div>' ) ); ?>
					</div><!-- end entry-content -->

<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<div id="entry-author-info">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'lrdpz_author_bio_avatar_size', 60 ) ); ?>
							<h5><?php printf( esc_attr__( 'About %s', 'lrdpz' ), get_the_author() ); ?></h5>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'lrdpz' ), get_the_author() ); ?>
								</a>
							</div><!-- end author-link	-->
					</div><!-- end entry-author-info -->
<?php endif; ?>

					<div class="entry-utility">
						<?php lrdpz_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'lrdpz' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- entry-utility -->
				</div><!-- post -->

	<div class="post-nav">
		<div class="previous-post"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'lrdpz' ) . '</span> %title' ); ?></div>
		<div class="next-post"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'lrdpz' ) . '</span>' ); ?></div>
	</div><!-- post-nav -->

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>