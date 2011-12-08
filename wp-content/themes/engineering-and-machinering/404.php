<?php get_header(); ?>

				<h2 class="pagetitle"><?php _e( 'Not Found', 'lrdpz' ); ?></h2>
					<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'lrdpz' ); ?></p>
					<?php get_search_form(); ?>

	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>
 <?php get_sidebar(); ?>
<?php get_footer(); ?>