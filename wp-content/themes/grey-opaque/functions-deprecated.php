<?php
/**
 * This file contains a list of deprecated functions which will be deleted in future versions.
 */

/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 *
 * @deprecated since WordPress 3.1
 * @return string The gallery style filter, with the styles themselves removed.
 * @since Grey Opaque 1.0.0
 */
if(!function_exists('greyopaque_remove_gallery_css')) {
	function greyopaque_remove_gallery_css($css) {
		return preg_replace("#<style type='text/css'>(.*?)</style>#s", '', $css);
	}

	// Backwards compatibility with WordPress 3.0.
	if(version_compare(WP_VERSION_RUNNING, '3.1', '<')) {
		add_filter('gallery_style', 'greyopaque_remove_gallery_css');
	}
}

/**
 * Infobox links neben den Beiträgen anzeigen.
 * Der Typ der Infobox kann über die Option definiert werden.
 * Zulässige Optionen:
 * tagcloud		=> Zeigt nur die Tagcloud an.
 *
 * @var string $var_sType
 * @deprecated since Grey Opaque 1.0.1
 * @see greyopaque_the_infobox($var_sType = '')
 * @since Grey Opaque 1.0.0
 */
if(!function_exists('greyopaque_entry_box')) {
	function greyopaque_entry_box($var_sType = '') {
		echo '<div class="entry-actions">';

		switch ($var_sType) {
			/**
			 * Nur die Tagcloud anzeigen.
			 * => Bei erfolgloser Suche.
			 * => Auf 404-Seite.
			 */
			case 'tagcloud':
				?>
				<div class="tagcloud">
					<?php
					if(function_exists('wp_tag_cloud')) {
						wp_tag_cloud(array(
							'number' => 20,
							'taxonomy' => 'post_tag'
						));
					}
					?>
				</div>
				<?php
				break;

			/**
			 * Die komplette Infobox anzeigen.
			 * Aufbau je nach Bedarf.
			 */
			default:
				?>
				<div class="timestamp">
					<p class="entry-timestamp">
						<?php greyopaque_posted_on_timestamp(); ?>
						<br />
						<?php _e('by: ', 'grey-opaque') . greyopaque_posted_on_auhtor(); ?>
						<br />
						<?php
						/**
						 * Attachment
						 */
						if(is_attachment()) {
							if(wp_attachment_is_image()) {
								$metadata = wp_get_attachment_metadata();
								printf(__('Size: %s px', 'grey-opaque'),
									sprintf('<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
										wp_get_attachment_url(),
										esc_attr(__('Link to full-size image', 'grey-opaque')),
										$metadata['width'],
										$metadata['height']
									)
								);
							}
						}
						?>
						<?php edit_post_link(__('Edit', 'grey-opaque'), '<span class="edit-link">', '</span>'); ?>
					</p>
				</div>
				<div class="actions">
					<ul>
						<?php if(comments_open()) : ?>
							<li>
								<a class="comment" href="<?php the_permalink(); ?>#comments"><?php echo number_format_i18n(get_comments_number()); ?> <?php _e('comment(s)', 'grey-opaque'); ?></a>
							</li>

							<?php if(greyopaque_get_ping_count()) :?>
								<li>
									<a class="comment" href="<?php the_permalink(); ?>#pings"><?php echo number_format_i18n(greyopaque_get_ping_count()); ?> <?php _e('pingback(s)', 'grey-opaque'); ?></a>
								</li>
							<?php endif; ?>
						<?php endif; ?>

						<?php if(is_singular()) : ?>
							<li>
								<div class="share">
									<span><?php _e('share this post', 'grey-opaque'); ?></span>
									<ul class="sharing">
										<li class="first">
											<a rel="nofollow" title="<?php _e('Share on BlinkList', 'grey-opaque'); ?>" id="share_blinklist" href="http://blinklist.com/index.php?Action=Blink/addblink.php&amp;Url=<?php the_permalink(); ?>&amp;Title=<?php rawurlencode(get_the_title()); ?>">BlinkList</a>
										</li>
										<li>
											<a rel="nofollow" title="<?php _e('Add to del.icio.us', 'grey-opaque'); ?>" id="share_delicious" href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;title=<?php rawurlencode(get_the_title()); ?>">del.icio.us</a>
										</li>
										<li>
											<a rel="nofollow" title="<?php _e('Digg This!', 'grey-opaque'); ?>" id="share_digg" href="http://digg.com/submit?url=<?php the_permalink(); ?>">Digg</a>
										</li>
										<li>
											<a rel="nofollow" title="<?php _e('Share on Facebook', 'grey-opaque'); ?>" id="share_facebook" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>">Facebook</a>
										</li>
										<li>
											<a rel="nofollow" title="<?php _e('Share on Reddit', 'grey-opaque'); ?>" id="share_reddit" href="http://reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php rawurlencode(get_the_title()); ?>">Reddit</a>
										</li>
										<li>
											<a rel="nofollow" title="<?php _e('Share on StumbleUpon', 'grey-opaque'); ?>" id="share_stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php rawurlencode(get_the_title()); ?>">StumbleUpon</a>
										</li>
										<li>
											<a rel="nofollow" title="<?php _e('Tweet this!', 'grey-opaque'); ?>" id="share_twitter" href="http://twitter.com/home?status=<?php echo rawurlencode(get_the_title()); ?>%20<?php the_permalink(); ?>">Twitter</a>
										</li>
										<li class="last">
											<a rel="nofollow" title="<?php _e('Favourite on Technorati', 'grey-opaque'); ?>" id="share_technorati" href="http://www.technorati.com/faves?add=<?php the_permalink(); ?>">Technorati</a>
										</li>
									</ul>
								</div>
							</li>
						<?php endif; ?>

						<?php if(comments_open()) : ?>
							<li>
								<a class="subscribe" href="<?php echo get_post_comments_feed_link(); ?>"><?php _e('comments RSS', 'grey-opaque'); ?></a>
							</li>
						<?php endif; ?>

						<li>
							<a rel="trackback" class="trackback" href="<?php echo get_trackback_url(); ?>"><?php _e('trackback', 'grey-opaque'); ?></a>
						</li>
						<li>
							<a class="permalink" href="<?php the_permalink(); ?>"><?php _e('permalink', 'grey-opaque'); ?></a>
						</li>
					</ul>
				</div>
				<?php
				break;
		}

		echo '</div>';
	}
}
?>