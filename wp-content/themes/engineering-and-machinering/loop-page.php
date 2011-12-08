<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h2 class="pagetitle"><?php the_title(); ?></h2>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'lrdpz' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'lrdpz' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- entry-content -->
				</div><!-- post -->

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>